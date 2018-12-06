<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Admin\AuthorizationRequest;
use Illuminate\Support\Facades\Auth;

class AuthorizationsController extends ApiController
{
    /**
     * @param AuthorizationRequest $request
     */
    public function store(AuthorizationRequest $request)
    {
        $name=$request->username;
        $password=$request->password;
        if(!$token=Auth::guard('admin')->attempt(compact('name','password'))){
            return $this->response->errorUnauthorized('用户名或密码错误');
        }
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    public function update()
    {
        $token=Auth::guard('admin')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return $this->response->noContent();
    }

    private function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('admin')->factory()->getTTL()*60,
        ]);
    }
}
