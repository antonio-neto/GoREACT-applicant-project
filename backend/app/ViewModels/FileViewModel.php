<?php

namespace App\ViewModels;

use App\Models\File;

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
      $this->id = $file[File::FIELD_ID];
      $this->name = $file[File::FIELD_NAME];
      $this->type = $file[File::FIELD_TYPE];
      $this->savedName = $file[File::FIELD_NAME_SAVED];
      $this->title = $file[File::FIELD_TITLE];
      $this->description = $file[File::FIELD_DESCRIPTION];
      $this->tags = $file[File::FIELD_TAGS];
    }
}