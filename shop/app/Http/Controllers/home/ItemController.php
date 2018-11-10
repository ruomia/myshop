<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sku;
use App\Models\Good;
use App\Models\AttributeName;
class ItemController extends Controller
{
    public function index(Request $req)
    {
        if(isset($req->id))
        {
            $data = Sku::find($req->id);
        }
        else if(isset($req->sku))
        {
            $data = Sku::where('attribute',$req->sku)->first();
            
        }
        else
        {
            return back();
        }
        if(!$data)
        {
            return back();
        }
        // return $req->sku;
        // return $data->goods_id;
        $skus = Sku::where('goods_id',$data->goods_id)->get();
        $goods = Good::find($data->goods_id);
        // $goods->sku;
        // return $skus;
        $_arr = [];
        $_idext = [];
        foreach($skus as $k => $v)
        {
            $_i=0;
            foreach($v->values2 as $k1 => $v1)
            {
                if(!in_array($v->valuer[$_i],$_idext))//判断是否存在value_id
                {
                    $_idext[] = $v->valuer[$_i];
                    $_arr[$k1][] = [$v->valuer[$_i++], $v1];
                }
                
            }
        }
        // return $_arr;
        return view('home.item',[
            'goods' => $goods,
            'skus' => $skus,
            'data' => $data,
            'arr' => $_arr,
        ]);
    }

    public function ajaxItem(Request $req)
    { 
        // echo 'fasfasdf';
        $data = Sku::where('attribute',$req->sku)->first();
        echo $data;
       
    }
}
