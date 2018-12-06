<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\ApiController;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class PublicController extends ApiController
{
    public function login(LoginRequest $request)
    {
        $name=$request->username;
        $password=$request->password;
        if(!$token=Auth::guard('admin')->attempt(compact('name','password'))){
            return $this->response->errorUnauthorized('用户名或密码错误');
        }
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('admin')->factory()->getTTL()*60,
        ])->setStatusCode(404);
    }
}
