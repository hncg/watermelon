<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Response;

class CommentController extends Controller{

    public function index()
    {
    	$result = [];
    	for ($i=4;$i>0;$i--) {
    		$tmp = (string) rand($i,$i+1000000);
            $result[] =["text" => "老实交代，12121海螺壳的教程121预设在哪里？" . $tmp, "author" => "评论者". $tmp, "id" => "评论者id:" . $tmp];
    	}
        return json_encode($result);
    }

    public function show($i)
    {
        $result[] =["text" => "text" . (string)$i, "author" => "author". (string)$i, "id" => $i];
        return json_encode($result);
    }

    public function store(){
        return Response::json('',201);
    }
}