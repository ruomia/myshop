<?php

namespace App\Http\Controllers\admin;

use App\Models\Sku;
use App\Models\AttributeName;
use App\Models\Good;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sku::select('skus.*','goods.name as goods_name')
        ->leftJoin('goods','goods.id','=','skus.goods_id')
        ->get();
        return view('admin.sku.index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data = Good::find($req->id);
        $name = AttributeName::where('cat_id',$data->cat_id)
        ->get();
        foreach($name as $v)
        {
            $v->values;
        }
        return view('admin.sku.create',[
            'data' => $name,
            'id' => $req->id,
            'goods' => $data->name,
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
        $model = new Sku;
        $model->fill($request->all());
        $model->attribute = implode(',',array_filter($request->attribute));
        $model->save();
        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function show(Sku $sku)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function edit(Sku $sku)
    {
        $data = Good::find($sku->goods_id);
        $name = AttributeName::where('cat_id',$data->cat_id)
        ->get();
        foreach($name as $v)
        {
            $v->values;
        }
        return view('admin.sku.update',[
            'data' => $name,
            'sku' => $sku,
            'goods' => $data->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sku $sku)
    {
        // return array_filter($request->attribute);
        $sku->fill($request->except(['_token','_method']));
        $sku->attribute = implode(',',array_filter($request->attribute));
        $sku->save();
        return redirect()->route('sku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sku::destroy($id);
        return redirect()->route('sku.index');
    }
}
