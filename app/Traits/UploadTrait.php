<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait {

  public function saveImage($photo, $folder){
    $file_extension = $photo -> getClientOriginalExtension();
    $file_name = uniqid() . time() . '.'. $file_extension;
    $path = $folder;
    $photo->move( $path, $file_name);

    return $file_name;
  }
}