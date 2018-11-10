<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Cart extends Model
{
    protected $fillable = ['goods_id','sku_id','user_id','price','count'];

    public $appends = [
        'skus',
        'goodsName'
    ];
    public function getSkusAttribute()
    {
        $id = $this->attributes['sku_id'];

        $result = Sku::find($id);

        // return $result;
        $arr = [];
        $arr[] = $result->name;
        $arr[] = $result->values;
        $arr[] = $result->price;
    
        // $arr = implode(',',$arr);
        return $arr;
    }
    public function getGoodsNameAttribute()
    {
        $id = $this->attributes['goods_id'];


        $result = Good::find($id);
   
        return $result->name;
    }
}
