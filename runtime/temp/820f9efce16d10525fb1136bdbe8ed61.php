<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\www\php\Garden\public/../application/admin\view\index\index.html";i:1531122951;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    <link rel="stylesheet" href="/static/system/css/common.css"  media="all">
    <link href="/static/fontawesome/css/font-awesome.css" rel="stylesheet">
    <script src="/static/system/js/jquery.min.js"></script>
    <script src="/static/layui/layui.js"></script>



</head>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left" id="menu-nav">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="javascript:;" id="refresh"><i class="fa fa-refresh"></i>刷新</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    SoySauce
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/admin/login/loginOut">退出</a></li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <?php if(is_array($menuList[0]) || $menuList[0] instanceof \think\Collection || $menuList[0] instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="layui-nav-item <?php if($controller == $vo['controller']): ?>layui-nav-itemed<?php endif; ?>">
                </i><a href="javascript:;" id="<?php echo $vo['url']; ?>"><i class="fa fa-<?php echo $vo['icon']; ?>"></i>&nbsp;&nbsp;<?php echo $vo['name']; ?></a>
                <?php if(isset($menuList[$vo['id']])): ?>
                <dl class="layui-nav-child">
                    <?php if(is_array($menuList[$vo['id']]) || $menuList[$vo['id']] instanceof \think\Collection || $menuList[$vo['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList[$vo['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cv): $mod = ($i % 2 );++$i;?>
                    <dd><a href="javascript:;" id="<?php echo $cv['url']; ?>"><i class="fa fa-<?php echo $vo['icon']; ?> "></i>&nbsp;&nbsp;<?php echo $cv['name']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
                <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <div class="layui-tab" lay-filter="demo"  lay-allowClose="true">
            <ul class="layui-tab-title">
            </ul>
            <div class="layui-tab-content">
            </div>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © www.garden.cn - 佳博园
    </div>
</div>

<script src="/static/system/js/common.js"></script>
<script>
    //JavaScript代码区域
    layui.config({
        dir: '/static/layui/' //layui.js 所在路径（注意，如果是script单独引入layui.js，无需设定该参数。），一般情况下可以无视
        ,version: false //一般用于更新模块缓存，默认不开启。设为true即让浏览器不缓存。也可以设为一个固定的值，如：201610
        ,debug: false //用于开启调试模式，默认false，如果设为true，则JS模块的节点会保留在页面
        ,base: '' //设定扩展的Layui模块的所在目录，一般用于外部模块扩展
    });

    layui.use(['element','jquery'], function(){
        var element = layui.element,
            $ = layui.jquery;
        element.on('nav(test)', function(elem){
            if (this.id == "#") {
                return false;
            }
            var obj = this.parentNode;
            if (!$(obj).hasClass('parent_nav')) {
                element.tabDelete('demo',this.id);
                element.tabAdd('demo', {
                    title: this.innerHTML
                    ,content: '<iframe src="'+ this.id +'"  width="100%" height="100%"  class="iframe-area fcon" id="'+ this.id +'" frameborder="0"></iframe>' //支持传入html
                    ,id: this.id
                });
            }

            element.tabChange('demo', this.id);
        });
        $(function () {
            var index = '<i class="chil-icon fa fa-home"></i>首页'
            element.tabAdd('demo', {
                title: index
                ,content: '<iframe src="/admin/index/body" id="/admin/index/body"  width="100%" height="100%"  class="iframe-area fcon" frameborder="0"></iframe>' //支持传入html
                ,id: '/admin/index/body'
            });
            element.tabChange('demo', '/admin/index/body');
            $(".layui-nav li:has(dl)").addClass("parent_nav");


        });
    });

    $(function () {

    });
</script>
</body>
</html>