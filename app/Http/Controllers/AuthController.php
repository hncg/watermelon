<?php

namespace App\Http\Controllers;

use App\models\User;
use Validator;
use Input;
use Response;
use Session;

class AuthController extends Controller
{
    /*
        cookie()->queue('cg','1212',60,'/','cg.com',false);
        实在用不了laravelcookie是怎么弄的了，在配置文件中不管怎么修改domain和patch 都设置不了cookie
        之后在子域名中都读取不了
    */
    public function login()
    {
        $data = Input::json()->all();
        $rules = [
            'username' => 'required|max:32|min:4|string',
            'passwd' => 'required|max:32|min:4|string',
            // 'verify' => 'required|min:6',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
         return Response::json($validator->messages(), 422);
        }
        $user = User::login($data['username'], md5($data['passwd']));
        if(! empty($user)) {
            setcookie('user_id', urlencode($user->id), time() + 60 * 60 * 2, '/', 'cg.com');
            setcookie('sid', urlencode(Session::getId()), time() + 60 * 60 * 2, '/', 'cg.com');
            setcookie('niker', urlencode($user->niker), time() + 60 * 60 * 2, '/', 'cg.com');
            return Response::json(json_encode($user), 200);
        } else {
            return Response::json('', 403);
        }
    }
}
