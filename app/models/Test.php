<?php

namespace App\models;

class Test
{
    public $visible = array('cg' => "cgg");

    public function cg()
    {
        return "2";
    }
    public function bind($user_id){
        return ['author' => 'cg'];
    }
}
