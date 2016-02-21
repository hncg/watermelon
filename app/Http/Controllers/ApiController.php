<?php

namespace App\Http\Controllers;

class ApiController extends Controller{

    public function comment()
    {
    	$result = [];
    	for ($i=10;$i>0;$i--) {
    		$result[] =["name" => $i];
    	}
        return json_encode($result);
    }
}