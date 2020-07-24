<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function relUsers(){
      return $this->hasOne('App\User', $this::FIELD_ID, $this::FIELD_ID_USER);
    }

    public const TABLE_NAME = 'files';
    public const FIELD_ID = 'id';
    public const FIELD_NAME = 'file_name';
    public const FIELD_TYPE = 'file_type';
    public const FIELD_NAME_SAVED = 'file_name_saved';
    public const FIELD_TITLE = 'title';
    public const FIELD_DESCRIPTION = 'description';
    public const FIELD_TAGS = 'tags';
    public const FIELD_ID_USER = 'id_user';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    protected $fillable = ['file_name', 'file_type', 'file_name_saved', 'title', 'description', 'tags', 'id_user', 'created_at', 'updated_at'];
}
