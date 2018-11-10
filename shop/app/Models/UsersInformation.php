<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersInformation extends Model
{
    protected $fillable = ['nicheng','gender','birthday','province','city','district','position'];
    public $timestamps = false;
}
