<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{

    public function error()
    {
        return "404";
    }

    public function register_by_3_err()
    {
        return "第三方登录出错";
    }
}