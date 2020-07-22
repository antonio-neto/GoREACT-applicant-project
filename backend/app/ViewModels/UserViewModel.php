<?php

namespace App\ViewModels;

use App\User;

class UserViewModel
{
    private $id;
    public $name;

    public function __construct(User $user){
      $this->id = $user->id;
      $this->name = $user->name;
    }
}