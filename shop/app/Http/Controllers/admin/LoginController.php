<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\Admin;
use App\Models\Role;
use session;
class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $req)
    {
        $data = Admin::where('username',$req->username)->first();
       
        if($data)
        {
            // return Hash::make($req->password);
            if(Hash::check($req->password,$data->password))
            {
                $roles = $data->roles;
                foreach($roles as $v)
                {
                    $role = Role::where('id',$v->id)->get();
                    
                }
                foreach($role as $v)
                {
                    $pers = $v->permissions;
                }

                $_ret = [];
                foreach($pers as $v)
                {
                    // 判断是否有多个URL（包含,）
                    if(FALSE === strpos($v->url_path, ','))
                    {
                        // 如果没有，就直接拿过来
                        $_ret[] = $v->url_path;
                    }
                    else
                    {
                        // 如果有，就转成数组
                        $arr = explode(',', $v->url_path);
                        // 把转完之后的数组合并到一维数组中
                        $_ret = array_merge($_ret,$arr);
                    }
                }
                session([
                    'path'=>$_ret,
                    'admin_id'=> $data->id,
                    ]);
                return redirect()->route('admin');
            }
            else
            {
                return back();
            }
        }
        else
        {
            return back();
        }
    }
}
