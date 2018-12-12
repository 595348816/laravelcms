/** layuiAdmin.std-v1.1.0 LPPL License By http://www.layui.com/admin/ */
;layui.extend({
    setter: "config",
    admin: "lib/admin",
    view: "lib/view"
}).define(["setter", "admin"], function (exports) {
    var setter = layui.setter,
        local_storage=layui.data(setter.tableName),
        element = layui.element,//i
        admin = layui.admin,//n
        tabsPage = admin.tabsPage,//t
        view = layui.view,
        l = function (a, d) {
        var l, b = r("#LAY_app_tabsheader>li"),
            y = a.replace(/(^http(s*):)|(\?[\s\S]*$)/g, "");
        if (b.each(function (e) {
            var i = r(this), n = i.attr("lay-id");
            n === a && (l = !0, tabsPage.index = e)
        }), d = d || "新标签页", setter.pageTabs) l || (r(s).append(['<div class="layadmin-tabsbody-item layui-show">', '<iframe src="' + a + '" frameborder="0" class="layadmin-iframe"></iframe>', "</div>"].join("")), tabsPage.index = b.length, element.tabAdd(o, {
            title: "<span>" + d + "</span>",
            id: a,
            attr: y
        })); else {
            var u = n.tabsBody(n.tabsPage.index).find(".layadmin-iframe");
            u[0].contentWindow.location.href = a
        }
        element.tabChange(o, a),
            admin.tabsBodyChange(tabsPage.index, {url: a, text: d})
    },
        s = "#LAY_app_body",
        o = "layadmin-layout-tabs",
        $ = layui.$;
    if(local_storage.token ==undefined){
        if($('#none_token',window.parent.document).length==0 && window.location.pathname!='/admin/login') {
            layer.msg('请登录', {
                id: 'none_token',
                offset: '15px'
                , icon: 1
                , time: 1000
            }, function () {
                location.href ='/admin/login';
            });
        }
    }else{
        if(window.location.pathname=='/admin/login'){
            layer.msg('您已登录', {
                offset: '15px'
                , icon: 1
                , time: 1000
            }, function () {
                location.href ='/admin/index';
            });
        }
    }
    $(window);
    admin.screen() < 2 && admin.sideFlexible(), layui.config({
        base: setter.base + "modules/"
    }), layui.each(setter.extend, function (a, i) {
        var n = {};
        n[i] = "{/}" + setter.base + "lib/extend/" + i, layui.extend(n)
    }),
        view().autoRender(),
        layui.use("common"),
        exports("index", {
            openTabsPage: l
        })
});