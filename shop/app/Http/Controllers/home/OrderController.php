<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Models\UsersAddress;
use App\Models\Order;
use App\Models\OrdersSku;

class OrderController extends Controller
{
    public function create()
    {
        // $address = User::find(session('uid'))->address;//通过一对多，将用户的所有地址取出来
        // // return $address;
        // $skus = Cart::where([
        //     ['user_id','=',session('uid')],
        //     ['checked','=',1],
        // ])->get();
        // return $skus;
        // return view('home.getOrderInfo',[
        //     'address' => $address,
        //     'skus' => $skus,
        // ]);
        return view('home.getOrderInfo');
    }
    public function address(Request $req)
    {
        if($req->id)
        {
            UsersAddress::where('user_id',session('uid'))
                    ->update(['default' => 0]);
            UsersAddress::where('id',$req->id)->update(['default' => 1]);
        }
        $data = User::find(session('uid'))->address;
        return $data;
    }
    public function carts()
    {
        $skus = Cart::where([
                    ['user_id','=',session('uid')],
                    ['checked','=',1],
                ])->get();
        return $skus;
    }
    public function editAddress()
    {
        $data = User::find(session('uid'))->address;
        return $data;
    }

    public function store(Request $req)
    {
        $number = md5(time().rand(1,99999));//生成订单号
        // return $req;
        $model = new Order;
        $model->fill($req->except(['carts']));
        
        $model->number = $number;
        $model->user_id = session('uid');
        $model->state = 1;
        $model->save();
        $id = $model->id;
// return $id;
        // $sku = new OrdersSku;
        foreach($req->carts as $v)
        {
            OrdersSku::create([
                'order_id'=>$id,
                'sku_id'=>$v['sku_id'],
                'price'=>$v['price'],
                'count'=>$v['count'],
            ]);
            Cart::destroy($v['id']);
        }
        return [
            'number'=>$number,
        ];
    }
    public function destroy($id)
    {
        Order::destroy($id);
        OrdersSku::where('order_id',$id)->delete();
        return back();
    }
}
