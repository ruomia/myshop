<?php

namespace App\Http\Controllers\admin;

use App\Models\Advert;
use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = AdvertCategory::all();
        $data = Advert::all();
        return view('admin.advert.advert',[
            'cat' => $cat,
            'data' => $data,
        ]);
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
        $model = new Advert;
        $model->fill($request->all());
        if($request->has('logo') && $request->logo->isValid())
        {
            $model->logo = $request->logo->store('advert/'.date('Ymd'));
        }
        $model->save();
        return redirect()->route('advert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        $cate = AdvertCategory::all();
        return view('admin.advert.update',[
            'cate' => $cate,
            'data' => $advert, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        $advert->fill($request->except(['logo']));
        if($request->has('logo') && $request->logo->isValid())
        {
            $path = public_path('uploads/'.$advert->logo);
            @unlink($path);
            $advert->logo = $request->logo->store('advert/'.date('Ymd'));
            
            
        }
        $advert->save();
        return redirect()->route('advert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advert::destroy($id);
        return redirect()->route('advert.index');
    }
}
