<?php

namespace App\Http\Controllers\Api;

use App\Models\VisaUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class TestController extends Controller
{
    public function index()
    {
        dump(generate_appid());
    }
}
