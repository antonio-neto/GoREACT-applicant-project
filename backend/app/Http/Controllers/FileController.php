<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\File;
use App\ViewModels\FileViewModel;

class FileController extends Controller
{
    private $objUsers;
    private $objFiles;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objFile = new File();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->objFile->all());
        // dd($this->objUser->all());

        $file = $this->objFile->all()->sortBy('file_name');
        return view('index', compact('file'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiles()
    {
        $files = $this->objFile->all()->sortBy('file_name');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      // dd($request->file('file'));
      if ($request->hasFile('file'))
      {
            $file      = $request->file('file');
            $mimeType = $file->getMimeType();
            if ($mimeType !== 'image/jpeg' && $mimeType !== 'video/mp4'){
              return response()->json(["message" => "File type not supported (only JPG/MP4)."]);
            }

            $filename  = $file->getClientOriginalName();
            $fileNameSaved = date('YmdHis').'-'.$filename;
            $file->move(public_path('content_files'), $fileNameSaved);
            $currentDateTime = date('Y-m-d H:i:s');
            $this->objFile->create([
              'file_name' => $filename,
              'file_type' => $mimeType,
              'file_name_saved' => $fileNameSaved,
              'title' => $request->title,
              'description' => $request->description,
              'tags' => $request->tags,
              'created_at' => $currentDateTime,
              'updated_at' => $currentDateTime]);
            return response()->json(["message" => "File Uploaded Succesfully"]);
      } 
      else
      {
        return response()->json(["message" => "Select a file first."]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $fileName
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id, string $fileName)
    {
      // dd(public_path('content_files' . DIRECTORY_SEPARATOR . $fileName));
      // echo(public_path('content_files\\' .$fileName));
      $deletionFileResult = unlink(public_path('content_files' . DIRECTORY_SEPARATOR . $fileName));

      if(!$deletionFileResult){
        return $this->createResponse($deletionFileResult, $fileName);
      }

      $deletionDBResult = $this->objFile->destroy($id);

      return $this->createResponse($deletionDBResult, $fileName);
  }

  private function createResponse(bool $success, string $fileName)
    {
      if ($success){
        $errorMessage = '';
        $httpCode = 200;
        $message = 'File Successfully deleted!';
      }
      else{
        $errorMessage = 'Not possibble to delete File ' . $fileName;
        $httpCode = 500;
        $message = $errorMessage;
      }

      return response()->json(['errors' => [ $errorMessage ], 'message' => $message, 'status' => $httpCode], $httpCode);
  }
}
