<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['number','user_id','method','real_payment','state','address_id'];

    public function skus()
    {
        return $this->hasMany('App\Models\OrdersSku','order_id');
    }
    public $appends =[
        'address',
    ];
    public function getAddressAttribute()
    {
        $id = $this->attributes['address_id'];
        $data = UsersAddress::find($id);
        // $str = '';
        $arr = [];
        // $str .= ;
        // $str .= ;
        // $str .= ;
        $arr[] = $data->province.$data->city.$data->district.'  '.$data->detailed_address;
        $arr[]=  $data->name;
        $arr[]=  $data->mobile;
        return $arr;
    }
}
