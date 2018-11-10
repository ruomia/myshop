<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeName extends Model
{

    protected $fillable = ['cat_id','name','pid'];
    public $timestamps = false;
    //
    public function cat()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }
    public function values()
    {
        return $this->hasMany('App\Models\AttributeValue','name_id');
    }
}
