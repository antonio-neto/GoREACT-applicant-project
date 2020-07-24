<?php

namespace App\Helpers;

class StringHelper
{
  public static function convertNotDefinedStringToEmpty(string $text){
    if ($text == null || $text == 'null' || $text == 'undefined'){
      return '';
    }

    return $text;
  }
}