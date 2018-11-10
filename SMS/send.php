<?php
set_time_limit(0);
// 引入类包加载文件
require('./vendor/autoload.php');
// 引入短信类
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
// 引入redis类
use Predis\Client as Redis;
// 创建redis对象
$redis = new Redis([
    'scheme' => 'tcp',
    'host'   => 'localhost',
    'port'   => 6379,
    'read_write_timeout' => 0,  // 读、写超时时间（0：无限）
    'database' => 0,            // 数据库
    'password' => null,           // 密码
]);
// 创建发短信对象

$config = [
    'accessKeyId'    => 'LTAIltmfQ7pTtwtj',
    'accessKeySecret' => 'LrVamRoLChJyHLMFYf6Qm7UiVD9Px6',
];
$client  = new Client($config);
$sendSms = new SendSms;
// 签名名称
$sendSms->setSignName('胡亚鹏');
// 模板CODE
$sendSms->setTemplateCode('SMS_135430007');

ini_set("default_socket_timeout", -1);

echo "发短信队列启动成功。。\r\n";
/* 循环阻塞监听队列，当队列中传入数据时就取出数据并发短信*/
while(1)
{

    $data = $redis->brpop('sms_list',0);
    $data = explode('-', $data[1]);
    $sendSms->setPhoneNumbers($data[0]);
    $sendSms->setTemplateParam(['code' => $data[1]]);
    // 发送
    $client->execute($sendSms);
    echo "发送短信成功。。\r\n";
}
