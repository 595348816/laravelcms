<?php

namespace App\Http\Requests\Admin;


class CaptchaRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'type'=>'required|in:login'
        ];
    }

    public function messages()
    {
        return [
            'type.required'=>'验证码请求类型缺失',
            'type.in'=>'验证码请求类型不对',
        ];
    }

}
