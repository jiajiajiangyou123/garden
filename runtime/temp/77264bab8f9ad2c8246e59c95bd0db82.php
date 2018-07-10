<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"F:\www\php\Garden\public/../application/admin\view\article\add.html";i:1531192419;s:63:"F:\www\php\Garden\application\admin\view\common\admin_load.html";i:1531135603;}*/ ?>
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
<script type="text/javascript" charset="utf-8" src="/static/baidueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/baidueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/baidueditor/lang/zh-cn/zh-cn.js"></script>
<blockquote class="layui-elem-quote">
    添加文章
</blockquote>

<form class="layui-form layui-col-lg10" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" id="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-upload">
        <label class="layui-form-label">图片</label>
        <div class="layui-input-block">
            <button type="button" class="layui-btn" id="test1">上传</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img" id="demo1">
                <p id="demoText"></p>
            </div>
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
      <label class="layui-form-label">内容</label>
      <div class="layui-input-block">
          <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
      </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>


<script>
    var uploadImgUrl = '';
    layui.use(['form', 'layedit', 'laydate','jquery','upload'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate
            ,$ = layui.jquery
            ,upload = layui.upload;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            var content = UE.getEditor('editor').getPlainTxt();
            var title = $("#title").val();
            var logo = uploadImgUrl;
            if (content == '' || title == '' || logo == '') {
                layer.msg('请将提交内容填写完整');
                return false;
            }
            if (content.length > 10000) {
                layer.msg('文本内容过长');
                return false;
            }
            var ajaxOp = {};
            ajaxOp.url = '/admin/article/add';
            ajaxOp.type = 'POST';
            ajaxOp.dataType = 'JSON';
            ajaxOp.data = {
                title   :   title,
                logo    :   logo,
                content :   content
            };
            ajaxOp.success = function (res) {
                if (res.state == 1) {
                    layer.msg('添加成功');
                    setTimeout(function () {
                        window.location.href = '/admin/article';
                    },1500);
                } else {
                    layer.msg('添加失败');
                }
            }
            $.ajax(ajaxOp);
            return false;
        });


        //普通图片上传
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: '/admin/article/upload/'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.state  == 1){
                    uploadImgUrl = res.info;
                    return layer.msg('上传成功');
                }
                return layer.msg('上传失败')
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
    });

    $(function () {
        var ue = UE.getEditor('editor');
    });
</script>
