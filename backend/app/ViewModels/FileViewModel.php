<?php

namespace App\ViewModels;

use App\Models\File;
use App\ViewModels\UserViewModel;

class FileViewModel
{
    public $id;
    public $name;
    public $type;
    public $savedName;
    public $user;

    public function __construct(File $file){
      $this->id = $file->id;
      $this->name = $file->file_name;
      $this->type = $file->file_type;
      $this->savedName = $file->file_name_saved;
      $this->user = null;

      return $this;
    }
}