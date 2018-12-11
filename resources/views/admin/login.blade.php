@extends('admin.layouts.app')
@section('title','登录')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('layuiadmin/style/login.css') }}" media="all">
    @endsection
@section('content')
<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>后台管理</h2>
            {{--<p>layui 官方出品的单页面后台管理模板系统</p>--}}
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" id="LAY-user-login-username" lay-verify="required|nickname" placeholder="用户名" value="admin" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input  type="password" name="password" id="LAY-user-login-password" lay-verify="required|pass" placeholder="密码" value="123456" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                        <input type="text" name="captcha" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5">
                        <div style="margin-left: 10px;">
                            <input type="hidden" name="key" value="" id="LAY-user-logic-key">
                            <img class="layadmin-user-login-codeimg" id="LAY-user-get-captcha">
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
            </div>
            {{--<div class="layui-trans layui-form-item layadmin-user-login-other">--}}
                {{--<label>社交账号登入</label>--}}
                {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>--}}
                {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>--}}
                {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>--}}
            {{--</div>--}}
        </div>
    </div>

    {{--<div class="layui-trans layadmin-user-login-footer">--}}

        {{--<p>© 2018 <a href="http://www.layui.com/" target="_blank">layui.com</a></p>--}}
        {{--<p>--}}
            {{--<span><a href="http://www.layui.com/admin/#get" target="_blank">获取授权</a></span>--}}
            {{--<span><a href="http://www.layui.com/admin/pro/" target="_blank">在线演示</a></span>--}}
            {{--<span><a href="http://www.layui.com/admin/" target="_blank">前往官网</a></span>--}}
        {{--</p>--}}
    {{--</div>--}}

{{--<div class="ladmin-user-login-theme">--}}
      {{--<script type="text/html" template>--}}
        {{--<ul>--}}
          {{--<li data-theme=""><img src="{{ asset('images/layui/login-bg.jpg') }}"></li>--}}
          {{--<li data-theme="#03152A" style="background-color: #03152A;"></li>--}}
          {{--<li data-theme="#2E241B" style="background-color: #2E241B;"></li>--}}
          {{--<li data-theme="#50314F" style="background-color: #50314F;"></li>--}}
          {{--<li data-theme="#344058" style="background-color: #344058;"></li>--}}
          {{--<li data-theme="#20222A" style="background-color: #20222A;"></li>--}}
        {{--</ul>--}}
      {{--</script>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection

@section('js')
        <script>
            layui.use(['index', 'user'], function(){
                var $ = layui.$
                    ,setter = layui.setter
                    ,admin = layui.admin
                    ,form = layui.form
                    ,router = layui.router();
                //获取验证码
                var getcaptcha=function(){
                    $.get({
                        url:"/admin/captcha/flat"
                    },function (data) {
                        $('#LAY-user-get-captcha').attr('src',data.img);
                        $('#LAY-user-logic-key').val(data.key);
                    });
                };
                getcaptcha();

                $('body').on("click", "#LAY-user-get-captcha", function () {
                    getcaptcha();
                });
                form.render();
                //提交
                form.on('submit(LAY-user-login-submit)', function(obj){
                    //请求登入接口
                    admin.req({
                        url: "{{ route('admin.login.store') }}" //实际使用请改成服务端真实接口
                        ,type:"POST"
                        ,data: obj.field
                        ,done: function(res){
                            //请求成功后，写入 access_token
                            layui.data(setter.tableName, {
                                key: 'token'
                                ,value: res.data.token
                            });
                            //登入成功的提示与跳转
                            layer.msg('登入成功', {
                                offset: '15px'
                                ,icon: 1
                                ,time: 1000
                            }, function(){
                                location.href = '/admin/index'; //后台主页
                            });
                        }
                    });
                });
            });
        </script>
    @stop