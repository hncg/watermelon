<?php

namespace App\models;

class User extends Model
{

    public static function get($id)
    {
        return (new Factory('bps'))->with(['id' => $id])->call('get_user')->get();
    }

    public static function get_by_openid($openid)
    {
        return (new Factory('bps'))->with(['openid' => $openid])->call('get_user_by_openid')->get();
    }

    public static function register($user)
    {
        if((empty($user['username']) || empty($passwd)) && empty($user['openid']) ) {
            return null;
        }
        return (new Factory('bps'))->with([new \bps\User($user)])->call('register_user')->get();

    }

    public static function login($username, $passwd)
    {
        return (new Factory('bps'))->with(['username' => $username, 'passwd' => $passwd])->call('login_user')->get();
    }
}
