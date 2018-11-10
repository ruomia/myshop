<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Sku;
class CartController extends Controller
{
    public function carts()
    {
        // vue  请求数据库获取数据
        $data = Cart::where('user_id',session('uid'))->get();
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 保存数据
        $model = new Cart;
        $model->fill($request->all());
        $model->user_id = session("uid");
        $model->save();
        
        // 加载  商品已成功加入购物车！页面
        $data = Sku::select('goods.name as goodsName','skus.*')
        ->leftJoin('goods','goods.id','=','skus.goods_id')
        ->where('skus.id',$request->sku_id)->first();
        $arr = [];
        $arr['goodsName'] = $data->goodsName;
        $arr['name'] = $data->name;
        $arr['value'] = $data->values;
        $arr['count'] = $request->count;
        $arr['sku_id'] = $request->sku_id;
        // return $arr;
        return view('home.success-cart')->with('data',$arr);
        // Cart::create($request->all());
        
        // return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $model = Cart::where('sku_id',$id)->first();
        // return $model;
        $model->fill($request->all());
        $model->checked = (int)$request->checked;
        // return $model;
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        Cart::destroy($id);
    }
}
