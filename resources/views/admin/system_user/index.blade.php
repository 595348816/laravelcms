@extends('admin.layouts.app')
@section('content')
    <!-- 正文开始 -->
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-body">

                <div class="layui-form toolbar">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <select id="sltKey">
                                <option value="">搜索条件</option>
                                <option value="user_id">ID</option>
                                <option value="username">账号</option>
                                <option value="nick_name">用户名</option>
                                <option value="phone">手机号</option>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <input id="edtSearch" class="layui-input" type="text" placeholder="输入关键字"/>
                        </div>
                        <div class="layui-inline">
                            <button id="btnSearch" class="layui-btn icon-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
                            <button id="btnAdd" class="layui-btn icon-btn"><i class="layui-icon">&#xe654;</i>添加</button>
                            <button id="btnExp" class="layui-btn icon-btn"><i class="layui-icon">&#xe67d;</i>导出</button>
                        </div>
                    </div>
                </div>

                <table class="layui-table" id="userTable" lay-filter="userTable"></table>

            </div>
        </div>

    </div>

@stop

@section('js')
    <script>
        layui.use(['index', 'table'],function () {
            var $ = layui.$
                ,form = layui.form
                ,table = layui.table;
            //渲染表格
            table.render({
                elem: "#userTable",
                url:"{{ route('admin.systemUser.index') }}",
                cols: [[
                    {type: "checkbox", fixed: "left"},
                    {field: "id", width: 100, title: "ID", sort: !0},
                    {field: "name", title: "用户名", minWidth: 100},
                    {field: "email", title: "邮箱"},
                    {field: "created_at", title: "加入时间", sort: !0},
                    {title: "操作", width: 150, align: "center", fixed: "right", toolbar: "#table-useradmin-webuser"
                }]],
                page: !0,
                limit: 30,
                text: "对不起，加载出现异常！"
            });
            //监听搜索
            form.on('submit(LAY-user-back-search)', function(data){
                var field = data.field;
                //执行重载
                table.reload('LAY-user-back-manage', {
                    where: field
                });
            });
            //事件
            var active = {
                batchdel: function(){
                    var checkStatus = table.checkStatus('LAY-user-back-manage')
                        ,checkData = checkStatus.data; //得到选中的数据

                    if(checkData.length === 0){
                        return layer.msg('请选择数据');
                    }

                    layer.prompt({
                        formType: 1
                        ,title: '敏感操作，请验证口令'
                    }, function(value, index){
                        layer.close(index);

                        layer.confirm('确定删除吗？', function(index) {

                            //执行 Ajax 后重载
                            /*
                            admin.req({
                              url: 'xxx'
                              //,……
                            });
                            */
                            table.reload('LAY-user-back-manage');
                            layer.msg('已删除');
                        });
                    });
                }
                ,add: function(){
                    layer.open({
                        type: 2
                        ,title: '添加管理员'
                        ,content: 'adminform.html'
                        ,area: ['420px', '420px']
                        ,btn: ['确定', '取消']
                        ,yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index]
                                ,submitID = 'LAY-user-back-submit'
                                ,submit = layero.find('iframe').contents().find('#'+ submitID);

                            //监听提交
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段

                                //提交 Ajax 成功后，静态更新表格中的数据
                                //$.ajax({});
                                table.reload('LAY-user-front-submit'); //数据刷新
                                layer.close(index); //关闭弹层
                            });

                            submit.trigger('click');
                        }
                    });
                }
            }
            $('.layui-btn.layuiadmin-btn-admin').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        });
    </script>
@stop