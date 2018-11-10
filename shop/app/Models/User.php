<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username','password','mobile'];
    public function info()
    {
        return $this->hasOne('App\Models\UsersInformation','user_id');
    }
    public function address()
    {
        return $this->hasMany('App\Models\UsersAddress','user_id');
    }
}
