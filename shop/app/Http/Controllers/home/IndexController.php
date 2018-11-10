<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
class IndexController extends Controller
{
    public function index()
    {
        $category = Category::with('allChildrenCategorys')->where('pid','0')->get();
        return view('home.index',[
            'category' => $category,
        ]);
    }
    // public function category()
    // {
        
    //     $data = Category::with('allChildrenCategorys')->where('pid','0')->get();
    //     return $data;
    //     // dd($data[3]);
    //     return view('test.index',['data'=>$data]);
    // }

    public function search(Request $req)
    {
        // $data = Category::with('allChildrenCategorys')->where('name',$req->keyword)->get();
        // $category = Category::with('allChildrenCategorys')->where('name',$req->keyword)->get();
        $data = Category::where('name',$req->keyword)->first();
        $data->names;
        foreach($data->names as $v)
        {
            $v->values;
        }
        $goods = Good::where('cat_id',$data->id)->get();
        foreach($goods as $v)
        {
            $v->sku;
        }
        return view('home.search',[
            'data' => $data,
            'goods'  => $goods,
        ]);
    }
}
