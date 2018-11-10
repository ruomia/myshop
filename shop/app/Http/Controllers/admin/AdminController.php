<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        foreach($data as $v)
        {
            $v->roles;
        }
        return view('admin.admin.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::all();
        return view('admin.admin.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Admin;
        $model->fill($request->except(['role_id']));
        $model->save();
        $id = $model->id;
        foreach($request->role_id as $v)
        {
            $model->roles()->attach($id,['role_id'=>$v]);
        }
        return redirect()->route('admin.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Admin::find($id);
        return view('admin.admin.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr = Admin::find($id);
        $ret = $arr->roles;
        $_ret = [];
        foreach($ret as $v)
        {
            $_ret[] = $v->id;
        }

        $data = Role::all();
        return view('admin.admin.update',[
            'data' => $data,
            'arr'=>$arr,
            'ret' => $_ret,
        ]);
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
        $model = Admin::find($id);
        $model->fill($request->except(['role_id']));
        $model->save();
        $model->roles()->sync($request->role_id);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Admin::find($id);
        $model->roles()->detach();
        $model->delete();
        return redirect()->route('admin.index');
    }
}
