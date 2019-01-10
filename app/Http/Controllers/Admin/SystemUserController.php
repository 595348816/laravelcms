<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EditPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SystemUserController extends BaseController
{
    public function show()
    {
        return $this->success(['user'=>Auth::user()]);
    }

    public function editPassword(EditPassword $request)
    {
        if(!Hash::check($request->old_password,Auth::user()->getAuthPassword())){
            return $this->failed('原始密码不正确');
        }
        $request->user()->fill([
            'password'=>Hash::make($request->password),
        ])->save();

        return $this->message('密码修改成功');
    }
}
