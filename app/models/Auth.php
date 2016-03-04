<?php

namespace App\models;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Session;
use Input;
use Validator;

class Auth extends Model
{
    public function bind($user_id)
    {
        $user = User::get($user_id);
        if (!$user) {
            throw new NotFoundHttpException;
        } else {
            return $user;
        }
        // $sid = Input::get('sid');
        // if (!$this->isValid($user_id, $sid)) {
        //     throw new NotFoundHttpException;
        // }
        // return User::get($user_id);
    }

    protected function isValid($sid)
    {
        return Session::getId() && Session::getId() == $sid;
    }

}
