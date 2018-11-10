<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Category;
use DB;
class AttributeController extends Controller
{
    public function index()
    {
        $data = AttributeName::select('attribute_names.*','b.name as category')
        ->leftJoin('categories as b','b.id','=','attribute_names.cat_id')
        ->paginate(6);
        foreach( $data as $v )
        {   
            $v->values;
        }
        // return $data;
        return view('admin.attribute.index',[
            'data' => $data,
        ]);
    }
    public function create()
    {
        $data = Category::all();
        return view('admin.attribute.create',[
            'data' => $data,
        ]);
    }

    public function insert(Request $req)
    {
        $model = new AttributeName;
        // 插入一条新纪录，并返回属性ID
        $id = DB::table('attribute_names')->insertGetId(
            ['name'=>$req->name,'cat_id'=>$req->cat_id]
        );
        $model = new AttributeValue;
        if($req->value)
        {
            foreach($req->value as $v)
            {
                $model->addAll(['value'=>$v,'name_id'=>$id]);
            }
        }
     
        return redirect()->route('attri');
    }
    public function edit($id)
    {
        $cate = Category::all();
        // $id = $_GET['id'];
        $data = AttributeName::find($id);
        $data->values;
        return view('admin.attribute.update',[
            'data' => $data,
            'cate' => $cate,
        ]);
    }
    public function update(Request $req)
    {   
       
        $data = AttributeName::find($req->id);
        if($data)
        {
            $data->name = $req->name;
            $data->pid = $req->pid;
            $data->save();
            foreach($data->values as $v)
            {
                AttributeValue::find($v->id)->delete();
            }
            $model = new AttributeValue;
            if($req->value)
            {
                foreach($req->value as $v)
                {
                    $model->addAll(['value'=>$v,'name_id'=>$req->id]);
                }
            }
     
            return redirect()->route('attri');
        }
        else
        {
            return back();
        }
    }

    public function destroy($id)
    {
        AttributeName::destroy($id);
        AttributeValue::where('name_id',$id)->delete();
        return redirect()->route('attri');
    }

    public function ajax_edit()
    {
        $id = $_GET['id'];
        $data = Category::find($id);
        echo json_encode($data);
    }
}
