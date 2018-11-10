<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersAddress extends Model
{
    public $table = 'users_address';
    protected $fillable = ['name','province','city','district','detailed_address','mobile','email','alias','default'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
