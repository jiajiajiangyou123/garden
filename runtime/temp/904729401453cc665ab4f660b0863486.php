<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\www\php\Garden\public/../application/admin\view\login\index.html";i:1530234600;}*/ ?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">

    <!--<link rel="stylesheet" href="/static/system/css/login.css">-->

    <link rel="stylesheet" type="text/css" href="/static/system/css/simple.css" />
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/system/css/global.css" />
    <!--<link rel="stylesheet" type="text/css" href="/static/system/css/animate.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="/static/system/css/font-awesome.min.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/system/css/login.css" />

    <script type="text/javascript" src="/static/system/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/layui/layui.all.js"></script>
    <!--<script type="text/javascript" src="/static/system/js/global.js"></script>-->

</head>

<body>

<div id="canvas">
    <div id="Banner" class="layui-carousel">
        <div carousel-item>
            <div><a class="coverBg"
                    style="background-image: url(/static/system/img/f9fa4d5b4fc10ba2209f2489bd0e7e15.jpg);"></a></div>
            <div><a class="coverBg"
                    style="background-image: url(/static/system/img/44661ede2d8c7e19be8ff811841f24be.jpg);"></a></div>

        </div>
    </div>
    <div id="login">
        <h1>
            <strong><span class="en-font">客户</span>管理系统后台</strong>
            <em class="en-font">Manager System</em>
        </h1>
        <form id="UserForm">
            <input type="hidden" name="__token__" value="0bdfa70fd4894b47e136ae023e2db7c2"/>
            <div class="user info">
                <label>U</label>
                <input type="text" name="data[User][username]" value="" id="username" class="en-font" placeholder="账号"
                       autocomplete="off">
            </div>
            <div class="pwd info">
                <label>P</label>
                <input type="password" name="data[User][password]" value="" id="password" class="en-font"
                       placeholder="密码" autocomplete="off">
            </div>
            <div class="code info">
                <label>V</label>
                <input type="text" name="captcha" value="" id="code" class="en-font" autocomplete="off" placeholder="验证码">
                <span class="vimg">
                    <img src="<?php echo captcha_src(); ?>"  onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()"/>
			    </span>
            </div>
            <div class="sub">
                <input type="button" id="LoginU" value="立即登录"/>
            </div>
        </form>
        <div class="copy"></div>
    </div>

    <div class="snow-container">
        <div class="snow foreground"></div>
        <div class="snow foreground layered"></div>
        <div class="snow middleground"></div>
        <div class="snow middleground layered"></div>
        <div class="snow background"></div>
        <div class="snow background layered"></div>
    </div>
</div>

<script src='/static/system/js/TweenMax.min.js'></script>
<script src='/static/system/js/jquery.min.js'></script>
<!--<script  src="/static/system/js/login.js"></script>-->

    <script type="text/javascript">
        layui.use(['layer', 'carousel'], function () {
            'use strict';
            var layer = layui.layer;

            var carousel = layui.carousel;
            //建造实例
            carousel.render({
                elem: '#Banner'
                , width: '100%' //设置容器宽度
                , height: '100%'
                , arrow: 'none' //始终显示箭头
                , anim: 'fade' //切换动画方式
                ,interval:2000
            });
        });

        $(window).resize(function () {
            var wh = $(window).height();
            $('#canvas').height(wh);
        }).trigger('resize')

        $(function () {
            $("#LoginU").on('click', function () {
                var setData = [];
                var username = $.trim($("#username").val());
                var password = $.trim($("#password").val());
                var code = $.trim($("#code").val());

                if (!username || !password || !code) {
                    layer.msg("请将登录信息填写完整");
                    return false;
                }
                setData.push({name: "username", value: username});
                setData.push({name: "password", value: password});
                setData.push({name: "captcha", value: code});

                var ajaxOption = {};
                ajaxOption.url = "/admin/login/checkLogin";
                ajaxOption.type = "POST";
                ajaxOption.dataType = "JSON";
                ajaxOption.data = setData;
                ajaxOption.success = function (res) {
                    if (res.state == 1) {
                        layer.msg(res.info);
                        setTimeout(function () {
                            window.location.href = res.url;
                        },1000)
                    } else {
                        layer.msg(res.info);
                    }
                };
                ajaxOption.error = function () {
                };
                $.ajax(ajaxOption);
            });
        });


    </script>
</body>

</html>
