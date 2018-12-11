<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','layuiAdmin std - 通用后台管理模板系统（iframe标准版）')</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @yield('meta')
    <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{asset('layuiadmin/style/admin.css')}}" media="all">
    @yield('css')
</head>
<body class="layui-layout-body">
    @yield('content')
</body>
<script src="{{ asset('layuiadmin/layui/layui.js') }}"></script>
<script>
    layui.config({
        base: '../layuiadmin/' //静态资源所在路径
        ,version:true
    }).extend({
        index: 'lib/index' //主入口模块
    });
</script>
@yield('js')
</html>