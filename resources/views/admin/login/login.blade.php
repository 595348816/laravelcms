<!DOCTYPE html>
<html class="loginHtml">
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('resource/admin/layui/css/layui.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('resource/admin/css/public.css?v=2018') }}" media="all" />
</head>
<body class="loginBody">
<form class="layui-form" method="post" action="{{ route('admin.login.store') }}">
    {{csrf_field()}}
    <div class="login_face"><img src="{{ asset('resource/admin/images/face.jpg') }}" class="userAvatar"></div>
    <div class="layui-form-item input-item">
        <label for="userName">用户名</label>
        <input type="text" name="name" placeholder="请输入用户名" autocomplete="off" id="userName" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item">
        <label for="password">密码</label>
        <input type="password" name="password" placeholder="请输入密码" autocomplete="off" id="password" class="layui-input" lay-verify="required">
    </div>
    <div class="">
        <div class="layui-form-item input-item layui-col-xs6" id="imgCode">
            <label for="code">验证码</label>
            <input type="text" name="captcha" placeholder="请输入验证码" autocomplete="off" id="code" class="layui-input">
        </div>
        <div class="layui-col-xs6" style="padding-left: 10px;">
            <img id="captcha-img" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" alt="验证码" class="admin-captcha-img">
            {{--<input type="hidden" name="key" id="captcha-key" value="">--}}
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
<script type="text/javascript" src="{{ asset('layuiadmin/layui/layui.js') }}"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
        ,version:true
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index','form','layer','jquery'],function(){
        let form = layui.form,
            setter = layui.setter,
            layer = parent.layer === undefined ? layui.layer : top.layer,
            $ = layui.jquery;
        //登录按钮
        // form.on("submit(login)",function(data){
        //     let self=this;
        //     $(self).text("登录中...").attr("disabled","disabled").addClass("layui-disabled");
        // });
        //正确提示
        //表单提示信息
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                layer.msg("{{$error}}",{icon:5});
                @break
            @endforeach
        @endif

        @if(session('success'))
        layer.msg("{{session('success')}}", {
            offset: '15px'
            ,icon: 1
            ,time: 1000
        });
        @endif
        //表单输入效果
        $(".loginBody .input-item").click(function(e){
            e.stopPropagation();
            $(this).addClass("layui-input-focus").find(".layui-input").focus();
        });
        $(".loginBody .layui-form-item .layui-input").focus(function(){
            $(this).parent().addClass("layui-input-focus");
        });
        $(".loginBody .layui-form-item .layui-input").blur(function(){
            $(this).parent().removeClass("layui-input-focus");
            if($(this).val() != ''){
                $(this).parent().addClass("layui-input-active");
            }else{
                $(this).parent().removeClass("layui-input-active");
            }
        })
    });
</script>
</body>
</html>