<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\UsersInformation;
use App\Models\UsersAddress;
class UserController extends Controller
{
    // public function __construct()
    // {
    //     if(!session('id') || !session(''))
    // }
    public function index()
    {
        $data = Order::where('user_id',session('uid'))->get();
        foreach($data as $v)
        {
            $v->skus;
        }
        // return $data;
        return view('home.user.home-index')->with('data',$data);
       
    
    }
    public function information()
    {
        $data = User::find(session('uid'))->info;
        // return $data;
        return view('home.user.home-info')->with('data',$data);
    }
    public function address()
    {
        $data = User::find(session('uid'))->address;
        // return $data;
        return view('home.user.home-address')->with('data',$data);
    }
    public function address_store(Request $req)
    {
        $model = new UsersAddress;
        $model->fill($req->all());
        $model->user_id = session('uid');
        $model->save();
        return back();
    }
    // 默认使用地址，因为只有一个，所以在设置默认地址时，该用户的其他地址的默认字段为0
    public function default($id)
    {
        UsersAddress::where('user_id',session('uid'))
                    ->update(['default' => 0]);
        UsersAddress::where('id',$id)->update(['default' => 1]);
        return redirect()->route('user.address');
    }

    public function orderDetail($id)
    {
        $data = Order::find($id);
        $data->skus;
        // foreach($data as $v)
        // {
        //     $v->skus;
        // }
        // return $data;
        return view('home.user.home-orderDetail')->with('data',$data);
    }
}
