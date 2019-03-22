<?php

namespace App\Http\Controllers\Curl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class CurlController extends Controller
{
    public function curl(){
        echo '<pre>';print_r($_GET);echo '<pre>';
        echo '<pre>';print_r($_POST);echo '<pre>';

    }

    public function test(Request $request){

        $sign = $request -> input('sign');
        $t = $request -> input('t');
        $data = $request -> input('data');
        //echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $pubkey = file_get_contents('./key/pub.pem');

        $res = openssl_get_publickey($pubkey);
        ($res) or die('您使用的公钥格式错误，请检查RSA私钥配置');

        $result = openssl_verify($data, base64_decode($sign) , $res , OPENSSL_ALGO_SHA256);
        var_dump($result);
        if($result === 1){
            echo  '成功';
        }

    }
}