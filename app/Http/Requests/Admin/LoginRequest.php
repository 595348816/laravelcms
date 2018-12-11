<?php

namespace App\Http\Requests\Admin;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'username'=>'required|string',
            'password'=>'required|string|min:6',
            'captcha'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'请输入用户名',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能小于6位',
            'captcha.required'=>'请输入验证码',
        ];
    }
}
