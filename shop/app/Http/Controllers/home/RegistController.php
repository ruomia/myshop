<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
// use Hash;
use App\Models\User;
// use Flc\Dysms\Client;
// use Flc\Dysms\Request\SendSms;
class RegistController extends Controller
{
    public function regist()
    {
        return view('home.register');
    }
    public function doRegist(Request $req)
    {
        //拼出缓存的名字
        $name = 'code-'.$req->mobile;
        //在根据名字取出验证码
        $code = Cache::get($name);
        if(!$code || $code != $req->mobile_code)
        {
            return back()->withErrors(['mobile_code'=>'验证码错误！']);
        }

        $password = bcrypt($req->password);
        $user = new User;
        // dd($user);
        $user->mobile = $req->mobile;
        $user->password =  $password;
        $user->username = $req->username;
        // if($req->has('face')&&$req->face->isValid())
        // {
        //     $date = date('Ymd');
        //     $face = $req->face->store('face/'.$date);
        //     $user->face = $face;
        // }
        // else{
        //     return back()->withErrors(['face'=>'头像上传失败，请重试！']);
        // }
        $user->save();

        return redirect()->route('login');
    }

    public function sendCode(Request $req){
        $client = new \Predis\Client();
        //生成6位随机数
        $code = rand(100000,999999);
        //缓存时的名字
        $name = 'code-'.$req->mobile;
        //把随机数缓存起来（1分钟）;
        Cache::put($name, $code, 2);
        //向消息队列中发消息
        $client->lpush('sms_list',$req->mobile.'-'.$code);
    }
}
