<?php

namespace App\models;

class Test
{
    public function bind($user_id)
    {
        if ($user_id != 1) {
            return [];
        }
        return ['user' => "cg"];
    }
}
