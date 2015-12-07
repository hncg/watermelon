<?php

namespace App\Http\Controllers;
use Input;

class PingController extends Controller{

    public function ping()
    {
        return 'hello cg';
    }
}