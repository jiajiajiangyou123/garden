<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\www\php\Garden\public/../application/admin\view\login\index.html";i:1532081454;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0049)http://www.jq22.com/demo/jquerybaidu201806240121/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>后台登录</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            overflow: hidden;
        }
    </style>
    <link href="/static/system/files/font.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/system/files/style.css">
    <link rel="stylesheet" href="/static/system/files/style-search.css" media="screen" type="text/css">
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/system/css/global.css" />
    <!--<link rel="stylesheet" type="text/css" href="/static/system/css/animate.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="/static/system/css/font-awesome.min.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/system/css/login.css" />

    <script type="text/javascript" src="/static/system/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/layui/layui.all.js"></script>
    <script>
        function c(){
            location.href="http://www.baidu.com/s?wd="+$("#input").val();
        }
    </script>
</head>
<body style="">
<canvas id="canvas" width="1920" height="1080"> 您的浏览器不支持canvas标签，请您更换浏览器 </canvas>
<script src="/static/system/files/word.js"></script>

    <div id="login">
        <h1>
            <strong><span class="en-font"></span>后台管理系统</strong>
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

</span> </div>
<!--<script src="/static/system/files/index.js"></script>-->

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
</body></html>