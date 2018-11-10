<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    protected $fillable = ['name','group','key','state'];
    public $timestamps = false;
}
