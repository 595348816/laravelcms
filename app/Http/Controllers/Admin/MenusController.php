<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends BaseController
{
    public function index()
    {
        $menus=config('admin.menus');
        return response()->json($menus);
    }
}
