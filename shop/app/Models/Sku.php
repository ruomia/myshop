<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Sku extends Model
{

    protected $fillable = ['goods_id','attribute','name','stock','price'];
    public function getAll()
    {
        $sql = "select a.id,a.stock,a.price,GROUP_CONCAT(c.value) as attribute,b.name as name
        from skus a 
            LEFT JOIN goods b ON a.goods_id= b.id
            LEFT JOIN attribute_values c ON FIND_IN_SET(c.id,a.attribute)
        GROUP BY a.id";
        $data = DB::select($sql);
        return $data;
    }

    public $appends = [
        'values',
        'valuer',
        'values2',
    ];
    public function getValuesAttribute()
    {
        $attr = $this->attributes['attribute'];
        $sql = "select CONCAT_WS(': ',b.name,a.value) as value from attribute_values a 
     left join attribute_names b on a.name_id = b.id
     where a.id in ($attr);";

        $result = DB::select($sql);
        // return implode(',',$result);
        $arr = [];
        foreach($result as $v)
        {
            $arr[] = $v->value;
        }
        $arr = implode(',',$arr);
        return $arr;
    }
    public function getValues2Attribute()
    {
        $attr = $this->attributes['attribute'];
        // 根据属性名的id进行排序，避免因为新加的属性值导致顺序错误
        $sql = "select b.name,a.value as value 
                    from attribute_values a 
                    left join attribute_names b on a.name_id = b.id
                    where a.id in ($attr) 
                    order by b.id asc";

        $result = DB::select($sql);
        // return $result;
        // return implode(',',$result);
        $arr = [];
        foreach($result as $v)
        {
            $arr[$v->name] = $v->value;

        }
        return $arr;
    }
    // 属性数组
    public function getValuerAttribute()
    {
        return explode(',', $this->attributes['attribute']);
    }
    // public function getAttributeAttribute($value)
    // {
    //     $sql = "select CONCAT_WS(': ',b.name,a.value) as value from attribute_values a 
    //     left join attribute_names b on a.name_id = b.id
    //     where a.id in ($value);";
   
    //        $result = DB::select($sql);
    //        // return implode(',',$result);
    //        $arr = [];
    //        foreach($result as $v)
    //        {
    //            $arr[] = $v->value;
    //        }
    //        $arr = implode(',',$arr);
    //        return $this->getCurrentCurrency($this->toal_fee);
    // }
}
