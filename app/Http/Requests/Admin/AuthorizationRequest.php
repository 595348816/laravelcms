<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationRequest extends FormRequest
{
    /**
     * 身份认证
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 参数验证规则
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|string',
            'password'=>'required|string|min:6',
        ];
    }

    /**
     * 验证提示信息
     * @return array
     */
    public function messages()
    {
        return [
            'username.required'=>'请输入用户名',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能小于6位'
        ];
    }
}
