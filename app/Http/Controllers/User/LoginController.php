<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $data = [
            'username' => $username,
            'password' => $password
        ];

        $url = 'http://whwpp.anjingdehua.cn/phon/login';

        $ch = curl_init($url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $res = curl_exec($ch);
        curl_close($ch);

        $reponse = json_decode($res , true);
        return $reponse;
    }
}