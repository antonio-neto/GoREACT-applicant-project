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
    public $title;
    public $description;
    public $tags;

    public function __construct(File $file){
      $this->id = $file->id;
      $this->name = $file->file_name;
      $this->type = $file->file_type;
      $this->savedName = $file->file_name_saved;
      $this->title = $file->title == 'undefined' ? null : $file->title;
      $this->description = $file->description == 'undefined' ? null : $file->description;
      $this->tags = $file->tags == 'undefined' ? null : $file->tags;
    }
}