<?php

namespace App\Http\Requests\Admin;


class EditPassword extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password'=>'required|string|min:6',
            'password'=>'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'=>'请输入原始密码',
            'password.required'=>'请输入新密码',
            'password.confirmed'=>'两次密码不匹配',
        ];
    }
}
