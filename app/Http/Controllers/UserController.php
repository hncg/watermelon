<?php
namespace App\Http\Controllers;
use Route;

class UserController extends Controller{

    public function profile()
    {
        var_dump(Route::Input('user_id'));
        return 'profile';
    }
}