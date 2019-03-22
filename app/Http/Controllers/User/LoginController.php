<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Laravel\Lumen\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        echo $username;
        echo $password;
    }
}