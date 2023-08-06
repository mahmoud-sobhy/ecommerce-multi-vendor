<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerCount extends Model
{
    use HasFactory;

    protected $table = "viewers_count";
    protected $fillable = ['name', 'viewers'];
    public $timestamps = false;
}
