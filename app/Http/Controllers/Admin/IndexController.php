<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(SystemUser $systemUser)
    {
        return view('admin.index.index',compact('systemUser'));
    }
}
