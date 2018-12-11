<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Cache;

class LoginController extends BaseController
{
    public function index()
    {
        return view('admin.login');
    }

    public function store(LoginRequest $request)
    {
        $key=$request->key;
        $captcha=$request->captcha;
        if(!Cache::tags('admin_captcha')->has($key)){
            return response()->json([
                'code'=>422,
                'msg'=>'验证码已过期,请重新刷新'
            ]);
        }
        if(!captcha_api_check($captcha,Cache::tags('admin_captcha')->get($key))){
            return response()->json([
                'code'=>422,
                'msg'=>'验证码不正确'
            ]);
        }
        Cache::tags('admin_captcha')->forget($key);//清楚验证码缓存
    }
}
