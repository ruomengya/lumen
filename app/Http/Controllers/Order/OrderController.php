<?php

namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Laravel\Lumen\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $request_uri = $_SERVER['REQUEST_URI'];

        $request_ip = $_SERVER['REMOTE_ADDR'];

        $hash_uri = substr(md5($request_uri) , 0 , 10);

        $redis_key = 'str:'.$hash_uri.'-'.'ip:'.$request_ip;

        $num = Redis::incr($redis_key);  //请求次数

        echo $num;

        Redis::expire($redis_key , 60);  //设置REDIS存储时间

        if($num > 10){
            $response = [
                'error' => 40003,
                'msg'   => 'incalid feifa !!'
            ];
            $key = 'str:'.'feifa_ip';
            Redis::sAdd($key , $request_ip);
            Redis::expire($redis_key , 600);
        }else{
            $response = [
                'error' => 0,
                'msg'   => 'ok'
            ];
        }
        return $response;
    }
}