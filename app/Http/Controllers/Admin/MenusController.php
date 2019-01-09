<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends BaseController
{
    public function index()
    {
        $menus=[
            [
                'name'=>"Dashboard",
                'url'=>'javascript:;',
                'icon'=>'layui-icon layui-icon-home',
                'subMenus'=>[
                    ['name'=>'控制台','url'=>'#/console/console1'],
                    ['name'=>'分析页','url'=>'#/console/console2'],
                    ['name'=>'欢迎页','url'=>'#/console/welcome'],
                ]
            ],
            [
                'name'=>"系统管理",
                'url'=>'javascript:;',
                'icon'=>'layui-icon layui-icon-set',
                'subMenus'=>[
                    ['name'=>'用户管理','url'=>'#/system/user'],
                    ['name'=>'角色管理','url'=>'#/system/role'],
                    ['name'=>'权限管理','url'=>'#/system/authorities'],
                    ['name'=>'登录日志','url'=>'#/system/loginRecord'],
                ]
            ],
            [
                'name'=>"模板页面",
                'url'=>'javascript:;',
                'icon'=>'layui-icon layui-icon-template',
                'subMenus'=>[
                    [
                        'name'=>'表单页',
                        'url'=>'javascript:;',
                        'subMenus'=>[
                            ['name'=>'基础表单','url'=>'#/template/form/form-basic'],
                            ['name'=>'复杂表单','url'=>'#/template/form/form-advance'],
                            ['name'=>'分步表单','url'=>'#/template/form/form-step'],
                        ]
                    ],
                    [
                        'name'=>'表格页',
                        'url'=>'javascript:;',
                        'subMenus'=>[
                            ['name'=>'数据表格','url'=>'#/template/table/table-basic'],
                            ['name'=>'复杂查询','url'=>'#/template/table/table-advance'],
                            ['name'=>'树形表格','url'=>'#/template/table/table-tree'],
                            ['name'=>'左树右表','url'=>'#/template/table/table-ltrt'],
                            ['name'=>'表格缩略图','url'=>'#/template/table/table-img'],
                        ]
                    ],
                    [
                        'name'=>'错误页',
                        'url'=>'javascript:;',
                        'subMenus'=>[
                            ['name'=>'500','url'=>'#/template/error/error-500'],
                            ['name'=>'404','url'=>'#/template/error/error-404'],
                            ['name'=>'403','url'=>'#/template/error/error-403'],
                        ]
                    ],
                    [
                        'name'=>'个人中心',
                        'url'=>'#/template/user-info'
                    ],
                    [
                        'name'=>'空白页',
                        'url'=>'#/other/empty'
                    ],
                    [
                        'name'=>'路由传参',
                        'url'=>'#/other/routerDemo'
                    ],
                ]
            ],
        ];
        return response()->json($menus);
    }
}
