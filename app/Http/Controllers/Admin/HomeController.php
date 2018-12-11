<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function console()
    {
        return view('admin.home.console');
    }
}
