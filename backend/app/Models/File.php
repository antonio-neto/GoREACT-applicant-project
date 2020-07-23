<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function relUsers(){
      return $this->hasOne('App\User', 'id', 'id_user');
    }

    protected $fillable = ['file_name', 'file_type', 'file_name_saved', 'title', 'description', 'tags', 'id_user', 'created_at', 'updated_at'];
}
