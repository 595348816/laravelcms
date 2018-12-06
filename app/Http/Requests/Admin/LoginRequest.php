<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|string',
            'password'=>'required|string|min:6',
        ];
    }

    public function attributes()
    {
        return [
            'username'=>'用户名',
            'password'=>'登录密码',
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'请输入用户名',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能小于6位'
        ];
    }
}
