@extends('admin.layouts.app')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">网站设置</div>
                    <div class="layui-card-body" pad15>

                        <div class="layui-form" wid100 lay-filter="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="sitename" value="layuiAdmin" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站域名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="domain" lay-verify="url" value="http://www.layui.com" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">缓存时间</label>
                                <div class="layui-input-inline" style="width: 80px;">
                                    <input type="text" name="cache" lay-verify="number" value="0" class="layui-input">
                                </div>
                                <div class="layui-input-inline layui-input-company">分钟</div>
                                <div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">最大文件上传</label>
                                <div class="layui-input-inline" style="width: 80px;">
                                    <input type="text" name="cache" lay-verify="number" value="2048" class="layui-input">
                                </div>
                                <div class="layui-input-inline layui-input-company">KB</div>
                                <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">上传文件类型</label>
                                <div class="layui-input-block">
                                    <input type="text" name="cache" value="png|gif|jpg|jpeg|zip|rar" class="layui-input">
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">首页标题</label>
                                <div class="layui-input-block">
                                    <textarea name="title" class="layui-textarea">layuiAdmin 通用后台管理模板系统</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">META关键词</label>
                                <div class="layui-input-block">
                                    <textarea name="keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">META描述</label>
                                <div class="layui-input-block">
                                    <textarea name="descript" class="layui-textarea">layuiAdmin 是 layui 官方出品的通用型后台模板解决方案，提供了单页版和 iframe 版两种开发模式。layuiAdmin 是目前非常流行的后台模板框架，广泛用于各类管理平台。</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">版权信息</label>
                                <div class="layui-input-block">
                                    <textarea name="copyright" class="layui-textarea">© 2018 layui.com MIT license</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="set_website">确认保存</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        layui.use(['index', 'set'])
    </script>
@stop