<?php

namespace App\Http\Controllers;

use APP\models\Article;

class ArticleController extends Controller{

    public function index()
    {
        return (new Article())->query();
    }

    public function show($i)
    {
        $result[] =["text" => "text" . (string)$i, "author" => "author". (string)$i, "id" => $i];
        return json_encode($result);
    }

    public function store(){
        return response::json('',204);
    }
}