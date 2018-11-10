<?php

namespace App\Http\Controllers\admin;

use App\Models\Good;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodsAttribute;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Good::paginate(7);
        return view('admin.goods.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cate = Category::where('pid',0)->get();
        $model = new Category;
    
        $cate = $model->getCate();

        $brand = Brand::all();
        return view('admin.goods.create',[
            'cate' => $cate,
            'brand' => $brand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $model = new Good;
        $model->fill($request->all());
        // $model->seller_id = 1;
        if($request->has('logo') && $request->logo->isValid())
        {
            $model->logo = $request->logo->store('goods/'.date('Ymd'));
            $model->save();
      
        }
        else
        {
            return back();
        }

        $id = $model->id;
        foreach($request->attributeName as $k => $v)
        {
            GoodsAttribute::create([
                'goods_id'=>$id,
                'name'=>$v,
                'value'=>$request->attributeValue[$k]
            ]);
        }
        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = Good::find($id);
        $goods->attribute;
        $model = new Category;
        $cate = $model->getCate();

        $brand = Brand::all();
        return view('admin.goods.update',[
            'goods' => $goods,
            'cate' => $cate,
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $good = Good::find($id);
        $good->fill($request->except(['logo','attribute']));
        if($request->has('logo') && $request->logo->isValid())
        {
            $path = public_path('uploads/'.$good->logo);
            @unlink($path);
            $good->logo = $request->logo->store('goods/'.date('Ymd'));

        }
        $good->save();
        GoodsAttribute::where('goods_id',$id)->delete();
        foreach($request->attributeName as $k => $v)
        {
            GoodsAttribute::create([
                'goods_id'=>$id,
                'name'=>$v,
                'value'=>$request->attributeValue[$k]
            ]);
        }
        return redirect()->route('goods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Good::destroy($id);
        return redirect()->route('goods.index');
    }

    public function getCat($id)
    {
        return Category::where('pid',$id)->get();
    }
}
