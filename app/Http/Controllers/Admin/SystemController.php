<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function website()
    {
        return view('admin.system.website');
    }
}
