<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.index.index');
        }
        return view('admin.login.login');
    }

    public function store(LoginRequest $request)
    {
        if(Auth::guard('admin')->attempt(['name'=>$request->name,'password'=>$request->password])){
            session()->flash('success', '欢迎回来！');
            return redirect()->route('admin.index.index');
        }else{
            session()->flash('danger', '用户名或密码不正确');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        session()->flash('success', '您已成功退出！');
        return redirect('admin/login');
    }
}
