<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class AttributeValue extends Model
{
    protected $fillable = ['value','name_id'];
    public $timestamps = false;
    public function names()
    {
        return $this->belongsTo('App\Models\AttributeName','name_id');
    }
    public function addAll(Array $data)
    {
        $rs = DB::table($this->getTable())->insert($data);
        return $rs;
    }
}
