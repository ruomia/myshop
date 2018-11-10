<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
class LoginController extends Controller
{
    public function index()
    {
        return view('home.login');
    }
    public function login(Request $request)
    {
        // return $request;
        $data = User::where('username',$request->username)->first();
       
        if($data)
        {
            // return Hash::make($req->password);
            if(Hash::check($request->password,$data->password))
            {
                

                session([
                    'uid'=> $data->id,
                    'username' => $data->username
                ]);
                return redirect()->route('index');
            }
            else
            {
                return back()->withErrors(['password'=>'密码错误！'])->withInput();
            }
        }
        else
        {
            //账号不存在
            //返回上一个页面，并把错误信息保存到SESSION中，返回，在下一个页面中就可以使用$errors 获取这个错误信息

            return back()->withErrors(['username'=>'用户名不存在！'])->withInput();
        }
    }
    
}
