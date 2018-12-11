<!DOCTYPE html>
<html class="loginHtml">
<head>
    <meta charset="utf-8">
    <title>登录--layui后台管理模板 2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin/layui/css/layui.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('admin/css/public.css?v=2018') }}" media="all" />
</head>
<body class="loginBody">
<form class="layui-form">
    <div class="login_face"><img src="{{ asset('admin/images/face.jpg') }}" class="userAvatar"></div>
    <div class="layui-form-item input-item">
        <label for="userName">用户名</label>
        <input type="text" placeholder="请输入用户名" autocomplete="off" id="userName" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item">
        <label for="password">密码</label>
        <input type="password" placeholder="请输入密码" autocomplete="off" id="password" class="layui-input" lay-verify="required">
    </div>
    <div class="">
        <div class="layui-form-item input-item layui-col-xs6" id="imgCode">
            <label for="code">验证码</label>
            <input type="text" placeholder="请输入验证码" autocomplete="off" id="code" class="layui-input">
        </div>
        <div class="layui-col-xs6" style="padding-left: 10px;">
            <img id="captcha-img" src="" class="admin-captcha-img">
            <input type="hidden" id="captcha-key" value="">
        </div>
    </div>
    <div class="layui-form-item">
        <button class="layui-btn layui-block" lay-filter="login" lay-submit>登录</button>
    </div>
    {{--<div class="layui-form-item layui-row">--}}
        {{--<a href="javascript:;" class="seraph icon-qq layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
        {{--<a href="javascript:;" class="seraph icon-wechat layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
        {{--<a href="javascript:;" class="seraph icon-sina layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
    {{--</div>--}}
</form>
<script type="text/javascript" src="{{ asset('admin/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/page/login.js?v=1') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/cache.js') }}"></script>
</body>
</html>