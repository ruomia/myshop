<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['name','cat_id','brand_id','logo','description','after_service','subtitle'];
    public function sku()
    {
        return $this->hasMany('App\Models\Sku','goods_id');
    }
    public function attribute()
    {
        return $this->hasMany('App\Models\GoodsAttribute','goods_id');
    }
}
