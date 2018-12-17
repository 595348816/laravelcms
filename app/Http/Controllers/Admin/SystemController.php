<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends BaseController
{
    public function website()
    {
        $groups=config('system_config.group');
        $configs=DB::table('system_configs')
            ->orderBy('group', 'asc')
            ->orderBy('sort', 'asc')
            ->get();
        foreach ($configs as $value){
            array_push($groups[$value->group]['value'],$value);
        }
        return view('admin.system.website',compact('groups','configs'));
    }

    public function store(Request $request)
    {
        dd($request->post());
    }
}
