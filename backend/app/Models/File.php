<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function relUsers(){
      return $this->hasOne('App\User', 'id', 'id_user');
    }
}
