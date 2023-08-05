<?php

namespace App\Traits;

Trait UserTrait
{

    public function getData($model){
      return $model::all();
    }



}
