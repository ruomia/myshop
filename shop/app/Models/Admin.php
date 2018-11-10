<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['username','password'];
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','admin_role');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function login()
    {
        return $this->hasManyThrough('App\Models\Role','App\Models\Permission');
    }
}
