<?php

namespace App\Services;

use App\Requests\CreateFileRequest;
use App\User;
use App\Models\File;
use App\Helpers\StringHelper;
use App\ViewModels\FileViewModel;

class FileService
{
  private $objUsers;
  private $objFiles;

  const DIRECTORY_TO_SAVE_FILES = 'content_files';
  const FILE_TYPE_VIDEO = 'video/mp4';
  const FILE_TYPE_JPG = 'image/jpeg';
  const DATE_FORMAT_DB = 'Y-m-d H:i:s';
  const DATE_FORMAT_FILE = 'YmdHis';
  const SQL_LIKE = 'LIKE';
  const SQL_ANY = '%';

  public function __construct()
  {
      $this->objUser = new User();
      $this->objFile = new File();
  }

  public function get(string $search = null)
  {
    $searchTerm = $search;
    if($searchTerm == 'undefined' || $searchTerm == null) {
      $files = $this->objFile->all()->sortBy(File::FIELD_CREATED_AT);
    }
    else{
      $files = $this->objFile->where(File::FIELD_TITLE, $this::SQL_LIKE, $this::SQL_ANY . $searchTerm . $this::SQL_ANY)
      ->orWhere(File::FIELD_DESCRIPTION, $this::SQL_LIKE, $this::SQL_ANY . $searchTerm. $this::SQL_ANY)
      ->orWhere(File::FIELD_TAGS, $this::SQL_LIKE, $this::SQL_ANY . $searchTerm. $this::SQL_ANY)
      ->get()->sortBy(File::FIELD_CREATED_AT);
    }
    
    $filesCount = $files->count();
    if ($filesCount == 0){
      return [];
    }

    $filesResult = array($filesCount);
    for($auxFile = 0; $auxFile < $filesCount; $auxFile++){
      $filesResult[$auxFile] = new FileViewModel($files[$auxFile]);
    }

    return $filesResult;
  }
  
  public function add(CreateFileRequest $request){
    $mimeType = $request->file->getMimeType();
    if ($mimeType !== $this::FILE_TYPE_JPG && $mimeType !== $this::FILE_TYPE_VIDEO){
      return 'File type not supported (only JPG/MP4).';
    }

    $filename = $request->file->getClientOriginalName();
    $fileNameSaved = date($this::DATE_FORMAT_FILE) . '-' . $filename;
    $request->file->move(public_path($this::DIRECTORY_TO_SAVE_FILES), $fileNameSaved);
    $currentDateTime = date($this::DATE_FORMAT_DB);

    $this->objFile->create([
      File::FIELD_NAME => $filename,
      File::FIELD_TYPE => $mimeType,
      File::FIELD_NAME_SAVED => $fileNameSaved,
      File::FIELD_TITLE => StringHelper::convertNotDefinedStringToEmpty($request->title),
      File::FIELD_DESCRIPTION => StringHelper::ConvertNotDefinedStringToEmpty($request->description),
      File::FIELD_TAGS => StringHelper::ConvertNotDefinedStringToEmpty($request->tags),
      File::FIELD_CREATED_AT => $currentDateTime,
      File::FIELD_UPDATED_AT => $currentDateTime]);
    
    return '';
  }
  
  public function delete(int $id){
    $currentFile = $this->objFile->find($id);

    if ($currentFile == null){
      return false;
    }

    $fileName = public_path($this::DIRECTORY_TO_SAVE_FILES . DIRECTORY_SEPARATOR . $currentFile[File::FIELD_NAME_SAVED]);
    if (file_exists($fileName)) {
      $deletionFileResult = unlink($fileName);

      if(!$deletionFileResult){
        return false;
      }
    }
    
    return $currentFile->destroy($id);
  }
}