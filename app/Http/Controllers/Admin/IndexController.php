<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user=Auth::guard('admin')->user();
        return view('admin.index.index',compact('user'));
    }
}
