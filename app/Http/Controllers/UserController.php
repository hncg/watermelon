<?php

namespace App\Http\Controllers;

use Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller{

    public function profile($cg)
    {
        return 'profile';
    }
}