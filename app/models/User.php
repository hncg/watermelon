<?php

namespace App\models;


class User extends Model
{

    public static function get($id) {
        return (new Factory('bps'))->with(['id' => $id])->call('get_user')->get();
    }

    public static function login($username, $passwd) {
        return (new Factory('bps'))->with(['username' => $username, 'passwd' => $passwd])->call('login_user')->get();
    }
}
