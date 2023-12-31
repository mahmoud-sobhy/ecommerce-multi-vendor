<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";
    protected $fillable = ['name_ar', 'name_en', 'price', 'details_ar', 'details_en', 'photo', 'created_at', 'updated_at'];
    // protected $hidden = [];         for hidden some rows about return api~s for mobil developers
    // public $timestamps = false;     for stopping the created_at and updated_at
}
