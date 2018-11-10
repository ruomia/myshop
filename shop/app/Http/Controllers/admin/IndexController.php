<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Good;
use DB;
class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        $goods_count = DB::table('goods')->count();
        $article_count = DB::table('articles')->count();
        $advert_count = DB::table('adverts')->count();
        $order_count = DB::table('orders')->count();
        return view('admin.widgets',[
            'goods_count' => $goods_count,
            'article_count' => $article_count,
            'advert_count' => $advert_count,
            'order_count' => $order_count,
        ]);
    }

}
