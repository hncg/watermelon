<?php

namespace App\Http\Controllers;

use Input;
use App\models\Comment;
use Validator;
use Response;

class CommentController extends Controller
{

    public function store($user)
    {
        $data = Input::json()->all();
        $rules = [
            'content' => 'required|max:1024|string',
            'parent_id' => 'required|integer',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
         return Response::json($validator->messages(), 422);
        }
        return (new Comment())->story($user->id, $data['parent_id'], $data['content'], time(), $user->niker);
    }
}