<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="{{ route('admin.home.console') }}">
            <span>layuiAdmin</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;" lay-href="{{ route('admin.home.console') }}" lay-tips="控制台" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>控制台</cite>
                </a>
            </li>
            <li data-name="set" class="layui-nav-item">
                <a href="javascript:;" lay-tips="设置" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="layui-nav-itemed">
                        <a href="javascript:;">系统设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="{{ route('admin.system.website') }}">网站设置</a></dd>
                            <dd><a lay-href="set/system/email.html">邮件服务</a></dd>
                        </dl>
                    </dd>
                    <dd class="layui-nav-itemed">
                        <a href="javascript:;">我的设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                            <dd><a lay-href="set/user/password.html">修改密码</a></dd>
                        </dl>
                    </dd>
                </dl>
            </li>
            <li data-name="set" class="layui-nav-item">
                <a href="javascript:;" lay-tips="访问权限" lay-direction="2">
                    <i class="layui-icon layui-icon-group"></i>
                    <cite>访问权限</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="layui-nav-itemed">
                        <a href="javascript:;" lay-href="{{ route('admin.systemUser.index') }}">用户管理</a>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
</div>