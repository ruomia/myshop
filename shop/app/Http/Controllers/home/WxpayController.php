<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;

class WxpayController extends Controller
{
    protected $config = [
        'app_id' => 'wx4cbc0a5a5e78d748', // 公众号 APPID
        'mch_id' => '1511187271',
        'key' => '08839714a18fb0130a35ca9073810d2b',
        // 通知的地址
        'notify_url' => 'http://shop.huyp.xin/wxpay/notify',
    ];

    public function pay(Request $request)
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
        ];

        $pay = Pay::wechat($this->config)->wap($order);

        echo $pay->return_code , '<hr>';
        echo $pay->return_msg , '<hr>';
        echo $pay->appid , '<hr>';
        echo $pay->result_code , '<hr>';
        echo $pay->code_url , '<hr>';

    }
    public function notify()
    {
        $pay = Pay::wechat($this->config);
        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            if($data->result_code == 'SUCCESS' && $data->return_code == 'SUCCESS')
            {
                echo '共支付了：'.$data->total_fee.'分';
                echo '订单ID：'.$data->out_trade_no;
            }

        } catch (Exception $e) {
            var_dump( $e->getMessage() );
        }
        
        $pay->success()->send();
    }
}
