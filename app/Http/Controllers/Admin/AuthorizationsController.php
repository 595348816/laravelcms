<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthorizationsController extends BaseController
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'name';
    }

    public function store(LoginRequest $request)
    {
        $credentials=$request->only('name','password');
        $captchaData = \Cache::get($request->captcha_key);
        if (!$captchaData) {
            return $this->failed('图片验证码已失效');
        }
        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 验证错误就清除缓存
            \Cache::forget($request->captcha_key);
            return $this->failed('验证码错误');
        }
        \Cache::forget($request->captcha_key);
        if(!$token=Auth::guard('admin')->attempt($credentials)){
            return $this->failed('用户名或密码错误',401);
        }
        return $this->setStatusCode(201)->success([
            'access_token'=>$token,
        ]);
    }
}
