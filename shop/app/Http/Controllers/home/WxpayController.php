<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;

class WxpayController extends Controller
{
    protected $config = [
        'app_id' => 'wx426b3015555a46be', // 公众号 APPID
        'mch_id' => '1900009851',
        'key' => '8934e7d15453e97507ef794cf7b0519d',
        'notify_url' => 'http://requestbin.fullcontact.com/r6s2a1r6',
    ];

    public function pay(Request $request)
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
            'openid' => 'onkVf1FjWS5SBIixxxxxx1',
        ];

        $pay = Pay::wechat($this->config)->scan($order);

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
