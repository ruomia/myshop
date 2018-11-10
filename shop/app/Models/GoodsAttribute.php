<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsAttribute extends Model
{
    protected $fillable = ['goods_id','name','value'];
    public $timestamps = false;
    public function goods()
    {
        return $this->belongsTo('App\Models\Good','goods_id');
    }
}
