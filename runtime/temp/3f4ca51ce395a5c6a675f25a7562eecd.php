<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"F:\www\php\Garden\public/../application/admin\view\article\index.html";i:1531136144;s:63:"F:\www\php\Garden\application\admin\view\common\admin_load.html";i:1531135603;}*/ ?>
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
<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.css">
<blockquote class="layui-elem-quote">
    文章列表
    <a href="/admin/article/add" class="insert col-lg-offset-10"><span class="glyphicon glyphicon-plus"></span></a>
</blockquote>


<table class="layui-hide" id="test"></table>

<script type="text/html" id="switchTpl">
    <!-- 这里的 checked 的状态只是演示 -->
    <input type="checkbox" name="sex" value="{{d.status}}" lay-skin="switch" lay-text="正常|锁定" lay-filter="statusDemo" {{ d.status == 1 ? 'checked' : '' }}>
</script>

<script type="text/html" id="checkboxTpl">
    <!-- 这里的 checked 的状态只是演示 -->
    <input type="checkbox" name="lock" value="{{d.status}}" title="锁定" lay-filter="lockDemo" {{ d.status == 1 ? 'checked' : '' }}>
</script>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>

    <!-- 这里同样支持 laytpl 语法，如： -->
    {{#  if(d.auth > 2){ }}
    <a class="layui-btn layui-btn-xs" lay-event="check">审核</a>
    {{#  } }}
</script>

<script>
    layui.use('table', function(){
        var table = layui.table
            ,form = layui.form,
            $ = layui.jquery;

        table.render({
            elem: '#test'
            ,url:'/admin/article/articleList'
            ,cellMinWidth: 80
            ,cols: [[
                {type:'numbers'}
                ,{type: 'checkbox'}
                ,{field:'id', title:'ID', unresize: true, sort: true}
                ,{field:'title', title:'标题', templet: '#usernameTpl'}
                ,{field:'logo', title:'图片'}
                ,{field:'author', title: '作者'}
                ,{field:'content', title: '内容'}
                ,{field:'status', title:'状态', templet: '#switchTpl', unresize: true}
                ,{field:'create_time', title:'创建时间'}
                ,{field:'update_time', title:'更新时间'}
                ,{fixed: 'right', width:150, align:'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
            ]]
            ,page: true
        });


        form.on('switch(statusDemo)', function(obj){
            var status = 0;
            if (obj.elem.checked) {
                status = 1;
            }
            var ajaxOp = {};
            ajaxOp.url = '/admin/article/edit';
            ajaxOp.dataType = 'JSON';
            ajaxOp.type = 'GET';
            ajaxOp.data = {
                status  :   status
            }
            ajaxOp.success = function (res) {}
            $.ajax(ajaxOp);
        });

        //监听锁定操作
        form.on('checkbox(lockDemo)', function(obj){
            layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });
    });
</script>