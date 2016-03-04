<?php

namespace App\Http\Controllers;

use App\models\Article;
use Response;
use Input;
use Route;

class ArticleController extends Controller
{

    public function index()
    {
        return (new Article())->query(Route::input('user_id'), Input::get('limit'), Input::get('offset'));
    }

    public function show($i)
    {
        $result[] =["text" => "text" . (string)$i, "author" => "author". (string)$i, "id" => $i];
        return json_encode($result);
    }

    public function store(){
        return(new Article())->story(Route::input('user_id'), Input::json()->all());
    }
}