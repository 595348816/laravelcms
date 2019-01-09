<?php

namespace App\Http\Requests\Admin;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name'=>'required|string',
            'password'=>'required|string|min:6',
            'captcha_code' => 'required|string',
            'captcha_key' => 'required|string',
        ];
    }

//    public function attributes()
//    {
//        return [
//            'captcha_key' => '图片验证码 key',
//            'captcha_code' => '图片验证码',
//        ];
//    }

    public function messages()
    {
        return [
            'name.required'=>'请输入用户名',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能小于6位',
            'captcha_key.required' => '图片验证码 key 缺失',
            'captcha_code.required' => '输入图片验证码',
        ];
    }
}
