<?php

namespace App\Http\Controllers;
use Session;
header("Content-type:text/html;charset=utf-8");

class PingController extends Controller
{

    public function ping()
    {
        return "ping is ok";
    }
}