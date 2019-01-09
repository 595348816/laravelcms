<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    public function show(Request $request)
    {
        $sre='{
  "code": 200,
  "user": {
    "userId": "admin",
    "username": "admin",
    "nickName": "管理员",
    "avatar": "",
    "sex": "女",
    "phone": "13125062807",
    "email": "whvcse@foxmail.com",
    "emailVerified": null,
    "createTime": "2017-08-14T06:12:36.000+0000",
    "updateTime": "2018-07-03T00:18:58.000+0000",
    "authorities": [
      {
        "authority": "get:/role"
      },
      {
        "authority": "put:/role"
      },
      {
        "authority": "post:/authorities/sync"
      },
      {
        "authority": "post:/user/query"
      },
      {
        "authority": "put:/user/psw"
      },
      {
        "authority": "put:/user"
      },
      {
        "authority": "get:/loginRecord"
      },
      {
        "authority": "get:/authorities"
      },
      {
        "authority": "delete:/authorities/role"
      },
      {
        "authority": "delete:/role/{id}"
      },
      {
        "authority": "post:/user"
      },
      {
        "authority": "put:/user/state"
      },
      {
        "authority": "get:/userInfo"
      },
      {
        "authority": "put:/user/psw/{id}"
      },
      {
        "authority": "post:/authorities/role"
      },
      {
        "authority": "post:/role"
      }
    ]
  }
}';

        $data=json_decode($sre,true);
        return response()->json($data);
    }
}
