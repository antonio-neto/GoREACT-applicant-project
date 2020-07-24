<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\File;
use App\Requests\CreateFileRequest;
use App\Services\FileService;

class FileController extends Controller
{
  private $objUsers;
  private $objFiles;
  private $fileService;

  public function __construct()
  {
      $this->objUser = new User();
      $this->objFile = new File();
      $this->fileService = new FileService();
  }
    
  public function index()
  {
      $file = $this->objFile->all()->sortBy(File::FIELD_CREATED_AT);
      return view('index', compact('file'));
  }
    
  public function getFiles(Request $request)
  {
      $searchTerm = $request->input('search');
      return $this->fileService->get($searchTerm);
  }

  public function create(Request $request)
  {
    if ($request->hasFile('file'))
    {
      $file = $request->file('file');

      $createFileRequest = new CreateFileRequest;
      $createFileRequest->file = $file;
      $createFileRequest->title = $request->title;
      $createFileRequest->description = $request->description;
      $createFileRequest->tags = $request->tags;

      $response = $this->fileService->add($createFileRequest);
      $result = $response === '';

      return $this->createResponse($result, $result ? 'File Uploaded Succesfully' : $response);
    } 
    else
    {
      return $this->createResponse(false, 'Select a file first.');
    }
  }

  public function delete(int $id)
  {
      $response = $this->fileService->delete($id);

      return $this->createResponse($response, 'File Successfully deleted!', 'File does not exists.');
  }

  private function createResponse(bool $success, string $message, string $errorMessage = null)
  {
    if ($success){
      $errorMessage = '';
      $httpCode = 200;
    }
    else{
      $httpCode = 500;
      $message = '';
    }

    $errors = $errorMessage !== '' || $errorMessage != null ? [ $errorMessage ] : [];
    
    return response()->json(['errors' => $errors, 'message' => $message, 'status' => $httpCode], $httpCode);
  }
}
