<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $model = new Category;
        $data = $model->getCate();
        // return $data;
        return view('admin.category.index',[
            'data' => $data,
        ]);
    }
    public function create()
    {
        $model = new Category;
        $data = $model->getCate();
        return view('admin.category.create',[
            'data' => $data,
        ]);
    }

    public function insert(Request $req)
    {
        Category::create($req->all());
        return redirect()->route('category');
    }
    public function edit($id)
    {
        $model = new Category;
        $data = $model->getCate();
        $cate = Category::find($id);
        return view('admin.category.update',[
            'data' => $data,
            'cate' => $cate,
        ]);
    }
    public function update(Request $req)
    {   
        $data = Category::find($req->id);
        if($data)
        {
            $data->name = $req->name;
            $data->pid = $req->pid;
            $data->save();
            return redirect()->route('category');
        }
        else
        {
            return back();
        }
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return back();
    }

}
