<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersSku extends Model
{
    protected $fillable = ['order_id','sku_id','price','count'];
    public $timestamps = false;

    public $appends = [
        'sku',
    ];
    public function getSkuAttribute()
    {
        $id = $this->attributes['sku_id'];
        $data  = Sku::select('goods.name as goodsName','skus.*')
        ->leftJoin('goods','goods.id','=','skus.goods_id')
        ->where('skus.id',$id)
        ->first($id);
        // return $data;
        $arr = [];
        $arr[] = $data->goodsName;
        $arr[] = $data->name;
        $arr[] = $data->values;
        return $arr;
    }
}
