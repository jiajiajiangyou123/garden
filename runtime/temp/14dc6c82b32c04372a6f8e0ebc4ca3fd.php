<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"F:\www\php\Garden\public/../application/admin\view\menu\add.html";i:1531117154;s:63:"F:\www\php\Garden\application\admin\view\common\admin_load.html";i:1531135603;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>System</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    <link rel="stylesheet" href="/static/system/css/common.css"  media="all">
    <link href="/static/fontawesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/layui/css/modules/layer/default/layer.css?v=3.1.1">
    <script src="/static/system/js/jquery.min.js"></script>
    <script src="/static/layui/layui.js"></script>

</head>
<link rel="stylesheet" href="/static/layui/css/modules/layer/default/layer.css?v=3.1.1">
<link rel="stylesheet" href="/static/system/css/menu.css">
    <!-- 内容主体区域 -->
<div style="padding: 15px;">
    <fieldset class="layui-elem-field layui-field-title mt15">
        <legend>菜单添加/编辑</legend>
    </fieldset>

    <a href="/admin/menu"  class="layui-btn layui-btn-normal" >菜单列表</a>
    <button class="layui-btn layui-btn-success refresh">刷新</button>
    <button class="layui-btn layui-btn-primary top-btn-right">返回</button>
    <hr class="layui-bg-orange">
</div>
<div class="add-form layui-col-md6" style="margin-left: 20px;height: 672px;overflow: scroll">
    <div class="layui-layer-title" style="cursor: move;text-align: center">菜单管理</div>
    <div class="tree">
        <ul>
            <li id="li_0">
                <span><i class="fa fa-folder-open"></i>后台</span>
                <ul id="tree">

                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="add-form layui-col-md5 ml15">
    <div class="layui-layer-title menu-title-name">添加菜单</div>
    <form class="layui-form mt15" action="post" lay-filter="menu-form">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-inline">
                    <input type="tel" name="name" lay-verify="required" id="name" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">模块</label>
                <div class="layui-input-inline">
                    <input type="text" name="module" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">控制器</label>
                <div class="layui-input-inline">
                    <input type="text" name="controller" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">路径</label>
                <div class="layui-input-inline">
                    <input type="text" name="url" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">父级</label>
                <div class="layui-input-inline">
                    <select name="pid" lay-verify="required" id="pid-select" lay-search="">
                        <option value="0">无父级</option>
                        <?php if(is_array($modules) || $modules instanceof \think\Collection || $modules instanceof \think\Paginator): $i = 0; $__LIST__ = $modules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">图标</label>
                <div class="layui-input-inline">
                    <input type="text" name="icon" lay-verify="required"  id="icon_choose" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                    <input type="text" name="sort" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">是否导航</label>
                <div class="layui-input-inline">
                    <input type="checkbox" checked="" name="is_menu" id="is_menu" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                </div>
            </div>

        </div>

        <div class="layui-form-item" style="margin-left: 20%">
            <div class="layui-input-block">
                <button class="layui-btn menu-title-btn" lay-submit="" lay-filter="demo1">确认添加</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script>
    var index = 1;
    var menuHtml = "",
        menu_add_url = "/admin/menu/add",
        menu_info_list = [];
    layui.use(['layer','form', 'jquery'], function () {
        var form = layui.form
            , layer = layui.layer
            , $ = layui.jquery;


        form.on('submit(demo1)', function(data){
            var insertData = data.field;
            if (!insertData.is_menu) {
                insertData.is_menu = 0;
            }

            var ajaxOp = {};
            ajaxOp.url = menu_add_url;
            ajaxOp.type = "POST";
            ajaxOp.dateType = "JSON";
            ajaxOp.data = insertData;
            ajaxOp.success = function (res) {
                res = JSON.parse(res);

                if (res.state == 1) {
                    layer.msg(res.info);
                    setTimeout(function () {
//                        layer.close(index);
                        window.location.reload();
                    },1500)
                } else {
                    layer.msg(res.info);
                    return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
                }
            }
            $.ajax(ajaxOp);
            return false;
        });

        $(document).on('click','#icon_choose',function () {
            layer.open({
                type: 2,
                title: '选择图标',
                maxmin: true,
                area: ['80%', '80%'],
                content: '/admin/icon?window='+ index +'&icon='+$(this).val()
            });
        });

        $(document).on('click','.refresh',function () {
            window.location.reload();
        });

        $(function () {
            menuList();
            $('.tree li:has(ul)').addClass('parent_li');
            $(document).on('click','.tree li.parent_li > span', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).find(' > i').addClass('fa-folder').removeClass('fa-folder-open');
                } else {
                    children.show('fast');
                    $(this).find(' > i').addClass('fa-folder-open').removeClass('fa-folder');
                }
            });
        });

        function menuList() {
            var ajaxOp = {};
            ajaxOp.url = "/admin/menu/menuList";
            ajaxOp.type = "GET";
            ajaxOp.dataType = "JSON";
            ajaxOp.success = function (res) {
                var sorts = makeSortsData(res.info)
                makeMenuHtml(sorts);
            }
            ajaxOp.error = function () {}
            $.ajax(ajaxOp);
        }

        function makeSortsData(data) {
            var sort = [];
            menu_info_list = data;
            if (data != '操作失败') {
                for ( key in data ) {
                    var obj = data[key];
                    var pid = obj.pid;
                    var list = sort[pid] ? sort[pid] : [];
                    list.push(obj)
                    sort[pid] = list;
                }
            }
            return sort;
        }

        function makeMenuHtml(data) {
            data[0] = data[0] ? data[0] : [];

            if (data[0].length > 0) {
                var childData = data[0];
                for (key in childData) {
                    var className = "";
                    var obj = childData[key];
                    if (data[obj.id]) {
                        className = "parent_li";
                    }
                    menuHtml += '<li class="'+ className +'" id="li_'+ obj.id +'"><span><i class="fa fa-folder-open"></i>'+ obj.name +'</span>' +
                        '<a href="javascript:;" class="edit '+ obj.id +'d" id="'+ obj.id +'">编辑</a>' +
                        '<a href="javascript:;" class="del" id="'+ obj.id +'">删除</a>';
                    if (data[obj.id]) {
                        drawsort(data[obj.id],data);
                    }
                    menuHtml += '</li>'
                }
            }
            $("#tree").html(menuHtml);
        }

        function drawsort(array,list) {
            menuHtml += '<ul>';
            for (key in array) {
                var obj = array[key];
                if (list[obj.id]) {
                    menuHtml += '<li id="li_'+ obj.id +'">' +
                        '<span><i class="fa fa-folder-open"></i>'+ obj.name +'</span>' +
                        '<a href="javascript:;" class="edit '+ obj.id +'d" id="'+ obj.id +'">编辑</a>' +
                        '<a href="javascript:;" class="del" id="'+ obj.id +'">删除</a>';
                } else {
                    menuHtml += '<li id="li_'+ obj.id +'">' +
                        '<span><i class="fa fa-file"></i>'+ obj.name +'</span>' +
                        '<a href="javascript:;" class="edit '+ obj.id +'d" id="'+ obj.id +'">编辑</a>' +
                        '<a href="javascript:;" class="del" id="'+ obj.id +'">删除</a>';
                }
                if (list[obj.id]) {
                    drawsort(list[obj.id],list);
                }
                menuHtml += '</li>';
            }
            menuHtml += '</ul>';
        }

        $(document).on('click','.edit',function () {
            var id = parseInt(this.id);
            menu_add_url = "/admin/menu/edit?id=" + id;
            $('.menu-title-name').text("编辑菜单");
            $('.menu-title-btn').text("确认修改");
            var obj = {};
            for (key in menu_info_list) {
                var info = menu_info_list[key];
                if (info.id == id) {
                    obj = info;
                    break;
                }
            }

            var is_name_open = obj.is_menu ? true : false;
            form.val('menu-form',{
                name    :   obj.name,
                url     :   obj.url,
                controller  :   obj.controller,
                module      :   obj.module,
                sort        :   obj.sort,
                icon        :   obj.icon,
                is_menu     :   is_name_open,
                pid         :   obj.pid
            });
        });

        $(document).on('click','.del',function () {
            var id = parseInt(this.id);
            var ajaxOp = {};
            ajaxOp.type = "GET";
            ajaxOp.dataType = "JSON";
            ajaxOp.url = "/admin/menu/del?id=" + id;
            ajaxOp.success = function (res) {
                if (res.state == 1) {
                    layer.msg(res.info);
                    window.location.reload();
                } else {
                    layer.msg(res.info);
                }
            }
            ajaxOp.error = function () {}
            $.ajax(ajaxOp);
        });

    });


</script>