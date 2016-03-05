<?php

namespace App\Http\Controllers;

use App\models\User;
use Validator;
use Input;
use Response;
use Session;
use Request;
use App\openapi\qq\QC;

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
            return $this->set_cookie_by_user($user);
        } else {
            return Response::json('', 403);
        }
    }

    public function login_by_3()
    {
        $qc = new QC();
        $qc->qq_login();
    }

    public function login_by_3_callback()
    {
        $qc = new QC();
        $qc->qq_callback();
        $openid = $qc->get_openid();
        unset($qc);
        if (empty($openid)) {
            return redirect('v1/register_by_3_err');
        }
        $user = User::get_by_openid($openid);
        if (empty($user)) {
            return $this->register_by_openid($openid);
        } else {
            $this->set_cookie_by_user($user);
            return redirect('http://blog.' . env('DOMAIN'));
        }
    }

    private function register_by_openid($openid) {
        $qc = new QC();
        $arr = $qc->get_user_info();
        $gender = $arr["gender"];
        $niker = $arr["nickname"];
        $user = [
            'openid' => $openid,
            'sid' => Session::getId(),
            'last_ip' => Request::ip(),
            'niker' => '2',
            'last_time' => time(),
            'device' => Request::header('User-Agent'),
            'gender' => '男',
        ];
        $user_id = User::register($user);
        if (empty($user_id)) {
            return redirect('v1/register_by_3_err');
        }
        $user['id'] = $user_id;
        $this->set_cookie_by_user(new \bps\User($user));
        return redirect('http://blog.' . env('DOMAIN'));
    }

    private function set_cookie_by_user($user, $code = 200)
    {
        setcookie('user_id', urlencode($user->id), time() + 60 * 60 * 2, '/', env('DOMAIN'));
        setcookie('sid', urlencode(Session::getId()), time() + 60 * 60 * 2, '/', env('DOMAIN'));
        setcookie('niker', urlencode($user->niker), time() + 60 * 60 * 2, '/', env('DOMAIN'));
        return Response::json(json_encode($user), $code);
    }
}
