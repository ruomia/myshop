<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Role;
use App\Models\Permission;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        foreach($data as $v)
        {
            $v->permissions;
        }
        // return $data;
        return view('admin.roles.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Permission;
        $data = $model->getTop();
        return view('admin.roles.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $id = $role->id;
        foreach($request->permission_id as $v)
        {
            $role->permissions()->attach($id,['permission_id'=>$v]);
        }
        return redirect()->route('roles.index');
        
        
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
        $arr = Role::find($id);
        $perIds = $arr->permissions;
        $ret = [];
        foreach($perIds as $v)
        {
            $ret[] = $v->id;
        }
        $model = new Permission;
        $data = $model->getTop();
        return view('admin.roles.update',[
            'data' => $data,
            'arr'=>$arr,
            'ret' => $ret,
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
        $model = Role::find($id);
        $model->name = $request->name;
        $model->save();
        $model->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Role::destroy($id);
        $model = Role::find($id);
        $model->permissions()->detach();
        $model->delete();
        return redirect()->route('roles.index');

    }
}
