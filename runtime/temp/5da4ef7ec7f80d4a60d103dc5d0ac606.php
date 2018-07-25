<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"F:\www\php\Garden\public/../application/admin\view\icon\index.html";i:1530504065;}*/ ?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>System</title>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.css">
    <link href="/static/fontawesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/system/css/icon.css">

    <script language="javascript" src="/static/system/js/jquery.min.js"></script>
    <script language="javascript" src="/static/bootstrap/js/bootstrap.js"></script>
    <script src="/static/layui/layui.js"></script>
    <!--<script src="/plugin/Validform/Validform.js"></script>-->
</head>
<body>
<div class="icon_list">
    <?php if(is_array($data['list']) || $data['list'] instanceof \think\Collection || $data['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <span <?php echo $data['icon']==$vo['classname']?'class="cur"':""; ?>>
    <i class="fa fa-<?php echo $vo['classname']; ?>"></i>
    <em><?php echo $vo['classname']; ?></em>
    </span>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script src="/static"></script>
<script language="javascript">

    layui.use('form',function () {
        var form = layui.form;

        $(document).on('click', '.icon_list span', function () {
            $(this).addClass("cur");
            $(this).siblings().removeClass("cur");

            $(parent.document).contents().find("#icon_choose").val($(this).children("em").html());

            parent.layer.closeAll();
        });
    })

</script>
</body>
</html>
