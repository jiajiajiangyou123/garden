<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\www\php\Garden\public/../application/index\view\index\index.html";i:1532511570;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>我的博客</title>
    <meta name="关键字" content="">
    <link href="/static/web/css/buju.css" rel="stylesheet">
    <link href="/static/web/css/index.css" rel="stylesheet">
    <script type="text/javascript" src="/static/web/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/web/js/sliders.js"></script>
    <style>
       
    </style>
</head>
<body>
<header>
    <div class="logo f_l">
        <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#">
            <img src="/static/web/img/logo.png">
        </a>
    </div>
    <div id="topnav" class="f_r">
        <ul>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank" id="topnav_current">首页</a>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">关于我</a>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">文章</a>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">心情</a>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">相册</a>
            <a href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">留言</a>
        </ul>
    </div>
</header>
<article>
    <div class="l_box f_l">
        <div class="banner">
            <div id="slide-holder">
                <div id="slide-runner">
                    <a href="http://www.17sucai.com/" target="_blank">
                        <img id="slide-img-1" src="/static/web/img/a1.jpg" alt="" style="left: -2000px;">
                    </a>
                    <a href="http://www.17sucai.com/" target="_blank">
                        <img id="slide-img-2" src="/static/web/img/a2.jpg" alt="" style="left: -1000px;">
                    </a>
                    <a href="http://www.17sucai.com/" target="_blank">
                        <img id="slide-img-3" src="/static/web/img/a3.jpg" alt="" style="left: 0px;">
                    </a>
                    <a href="http://www.17sucai.com/" target="_blank">
                        <img id="slide-img-4" src="/static/web/img/a4.jpg" alt="" style="left: 1000px;">
                    </a>
                    <div id="slide-controls" style="display:block;">
                        <p id="slide-client" class="text">
                            <strong></strong>
                            <span>醉牛逼</span>
                        </p>
                        <p id="slide-desc" class="text">醉牛逼是武魂醉牛逼的存在</p>
                        <p id="slide-nav"><a id="slide-link-0" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" onclick="slider.slide(0);return false;" onfocus="this.blur();" class="">1</a><a id="slide-link-1" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" onclick="slider.slide(1);return false;" onfocus="this.blur();" class="">2</a><a id="slide-link-2" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" onclick="slider.slide(2);return false;" onfocus="this.blur();" class="on">3</a><a id="slide-link-3" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" onclick="slider.slide(3);return false;" onfocus="this.blur();" class="">4</a></p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            if(!window.slider){
                var slider={};
            }
            slider.data=[
                {
                    "id":"slide-img-1", //与slide-runner中的img标签id对应
                    "client":"醉牛逼",
                    "desc":"醉牛逼是武魂醉牛逼的存在"     //这里描述图片内容
                },
                {
                    "id":"slide-img-2",
                    "client":"醉牛逼",
                    "desc":"醉牛逼是武魂醉牛逼的存在"
                },
                {
                    "id":"slide-img-3",
                    "client":"醉牛逼",
                    "desc":"醉牛逼是武魂醉牛逼的存在"
                },
                {
                    "id":"slide-img-4",
                    "client":"醉牛逼",
                    "desc":"醉牛逼是武魂醉牛逼的存在"
                }
            ];

            var width, height
            var step = 0;
            var canvas = document.createElement('canvas')
            var ctx = canvas.getContext('2d')
            var bg = [35,	36,	37]

            // mouse coordinates
            function Mouse () {
                this.x = window.innerWidth / 2
                this.y = window.innerHeight / 2
            }
            var mouse = new Mouse()
            document.onmousemove = function(e){ mouse.x = e.pageX; mouse.y = e.pageY}

            document.getElementsByTagName('body')[0].appendChild(canvas)

            window.addEventListener('resize', setup)




            setup()

            function setup() {
                canvas.width = width = window.innerWidth
                canvas.height = height = window.innerHeight

                fillCanvas(ctx, bg, 1)
            }

            window.requestAnimationFrame(animate);

            function animate() {
                fillCanvas(ctx, bg, 1)
                draw()
                step++
                window.requestAnimationFrame(function(){animate()})
            }


            function Flwr () {
                this.follow = null
                this.child = null
                this.x = mouse.x
                this.y = mouse.y
                this.dx = 0
                this.dy = 0
                this.a = 0.35
                this.b = 0.54
                this.n = 0
            }


            var flwr, flwrPrev, train = [], i, n = 50;
            for (i = 0; i < n; i++) {
                flwr = new Flwr()
                flwr.n = i
                if (flwrPrev) {
                    flwr.b = flwrPrev.b + (0.1/n)
                    flwr.follow = flwrPrev
                    flwrPrev.child = flwr
                } else {
                    flwr.follow = mouse
                }
                flwrPrev = flwr
                train.push(flwr)
            }

            function draw () {
                // update flwrs
                // console.log(train)

                for (i in train){
                    // update position
                    flwr = train[i]
                    var dx = flwr.follow.x - flwr.x
                    var dy = flwr.follow.y - flwr.y

                    flwr.dx = flwr.dx * flwr.a + dx * (1 - flwr.a)
                    flwr.dy = flwr.dy * flwr.a + dy * (1 - flwr.a)

                    flwr.x = flwr.dx * flwr.b + flwr.x
                    flwr.y = flwr.dy * flwr.b + flwr.y

                    // draw
                    // ctx.beginPath();
                    // drawCircle(ctx, flwr.x, flwr.y, 2)
                    // ctx.fillStyle = '#FFF547'
                    // ctx.fill()

                    if (flwr.follow !== mouse) {
                        ctx.beginPath();
                        ctx.strokeStyle = '#00fcff'
                        ctx.lineCap = 'round'
                        ctx.lineWidth = (n-flwr.n)/n * 8 + 2
                        ctx.moveTo(flwr.x,flwr.y);
                        ctx.lineTo(flwr.follow.x,flwr.follow.y);
                        ctx.stroke();
                    }
                }

            }

            function drawCircle (context, x, y, r) {
                context.arc(x ,y , r, 0, 2*Math.PI);
            }

            function fillCanvas (context, color, alpha) {
                context.rect(0, 0, this.width, this.height)
                context.fillStyle = `rgba(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})`
                context.fill()
            }

        </script>
        <div class="topnews">
            <h2>
	   <span>
	    <a href="http://www.17sucai.com/" target="_blank">武魂大罗</a>
		 <a href="http://www.17sucai.com/" target="_blank">装逼大神</a>
		 <a href="http://www.17sucai.com/" target="_blank">屌毛推荐</a>
	   </span>
                文章推荐
            </h2>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/01.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">住在手机里的朋友</a></h3>
                    <p>"通信时代，无论是初次相见还是老友重逢，交换联系方式，常常是彼此交换名片，然后郑重或是出于礼貌用手机记下对方的电话号码。在快节奏的生活里，我们不知不觉中就成为住在别人手机里的朋友。又因某些意外，变成了别人手机里匆忙的过客，这种快餐式的友谊 ..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/02.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">教你怎样用欠费手机拨打电话</a></h3>
                    <p>"初次相识的喜悦，让你觉得似乎找到了知音。于是，对于投缘的人，开始了较频繁的交往。渐渐地，初识的喜悦退尽，接下来就是仅仅保持着联系，平淡到偶尔在节假曰发短信互致问候..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/03.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">原来以为，一个人的勇敢是，删掉他的手机号码...</a></h3>
                    <p>"原来以为，一个人的勇敢是，删掉他的手机号码、QQ号码等等一切，努力和他保持距离。等着有一天，习惯不想念他，习惯他不在身边,习惯时间把他在我记忆里的身影磨蚀干净..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/04.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">手机的16个惊人小秘密，据说99.999%的人都不知</a></h3>
                    <p>"引导语：知道么，手机有备用电池，手机拨号码12593+电话号码=陷阱……手机具有很多你不知道的小秘密，说出来一定很惊奇！不信的话就来看看吧！..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/05.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">你面对的是生活而不是手机</a></h3>
                    <p>"每一次与别人吃饭，总会有人会拿出手机。以为他们在打电话或者有紧急的短信，但用余光瞟了一眼之后发现无非就两件事：1、看小说，2、上人人或者QQ..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/06.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></h3>
                    <p>"现在跨界联姻，时尚、汽车以及运动品牌联合手机制造商联合发布手机产品在行业里已经不再新鲜，上周我们给大家报道过著名手表制造商瑞士泰格·豪雅（Tag Heuer） 联合法国的手机制造商Modelabs发布的一款奢华手机的部分谍照，而近日该手机终于被正式发布了..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
            <div class="blogs">
                <figure>
                    <img src="/static/web/img/04.jpg">
                </figure>
                <ul>
                    <h3><a href="http://www.17sucai.com/">手机的16个惊人小秘密，据说99.999%的人都不知</a></h3>
                    <p>"引导语：知道么，手机有备用电池，手机拨号码12593+电话号码=陷阱……手机具有很多你不知道的小秘密，说出来一定很惊奇！不信的话就来看看吧！..."</p>
                    <p class="autor">
				    <span class="lm f_l">
					    <a href="http://www.17sucai.com/">个人博客</a>
					 </span>
                        <span class="dtime f_l">2016-02-16</span>
                        <span class="viewnum f_r">
					    浏览（<a href="http://www.17sucai.com/">666</a>）</span>
                        <span class="pingl f_r">
					    评论（<a href="http://www.17sucai.com/">60</a>）</span>
                    </p>
                </ul>
            </div>
        </div>
    </div>
    <div class="r_box f_r">
        <div class="tit01">
            <h3>关注我</h3>
            <div class="gzwm">
                <ul>
                    <li><a class="xlwb" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">新浪微博</a></li>
                    <li><a class="txwb" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">腾讯微博</a></li>
                    <li><a class="rss" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">RSS</a></li>
                    <li><a class="wx" href="http://www.17sucai.com/preview/486567/2016-02-16/myblog/index.html#" target="_blank">邮箱</a></li>
                </ul>
            </div>
        </div>
        <div class="ad300x100">
            <img src="/static/web/img/wh.jpg">
        </div>
        <div class="tab" id="lp_right_select">
            <script>
                window.onload=function()
                {
                    var oLi=document.getElementById("tb").getElementsByTagName("li");
                    var oUl=document.getElementById("tb-main").getElementsByTagName("div");
                    for(var i=0;i<oLi.length;i++)
                    {
                        oLi[i].index=i;
                        oLi[i].onmouseover=function()
                        {
                            for(var n=0;n<oLi.length;n++)
                                oLi[n].className="";
                            this.className="cur";
                            for(var n=0;n<oUl.length;n++)
                                oUl[n].style.display="none";
                            oUl[this.index].style.display="block";
                        }
                    }
                }
            </script>
            <div class="tab-top">
                <ul class="hd" id="tb">
                    <li class=""><a href="http://www.17sucai.com/">点击排行</a></li>
                    <li class="cur"><a href="http://www.17sucai.com/">最新文章</a></li>
                    <li class=""><a href="http://www.17sucai.com/">站长推荐</a></li>
                </ul>
            </div>
            <div class="tab-main" id="tb-main">
                <div class="bd bd-news" style="display: none;"><ul>
                    <li><a href="http://www.17sucai.com/" target="_blank">住在手机里的朋友</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">你面对的是生活而不是手机</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
                </ul></div>
                <div class="bd bd-news" style="display: block;"><ul>
                    <li><a href="http://www.17sucai.com/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">住在手机里的朋友</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">你面对的是生活而不是手机</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
                </ul></div>
                <div class="bd bd-news" style="display: none;"><ul>
                    <li><a href="http://www.17sucai.com/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">你面对的是生活而不是手机</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">住在手机里的朋友</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">你面对的是生活而不是手机</a></li>
                    <li><a href="http://www.17sucai.com/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
                </ul></div>
            </div>
        </div>
        <div class="cloud">
            <h3>标签云</h3>
            <ul>
                <li><a href="http://www.17sucai.com/">个人博客</a></li>
                <li><a href="http://www.17sucai.com/">web开发</a></li>
                <li><a href="http://www.17sucai.com/">前端设计</a></li>
                <li><a href="http://www.17sucai.com/">Html</a></li>
                <li><a href="http://www.17sucai.com/">CSS3</a></li>
                <li><a href="http://www.17sucai.com/">CSS3+HTML5</a></li>
                <li><a href="http://www.17sucai.com/">百度</a></li>
                <li><a href="http://www.17sucai.com/">JavaScript</a></li>
                <li><a href="http://www.17sucai.com/">C/C++</a></li>
                <li><a href="http://www.17sucai.com/">ASP.NET</a></li>
                <li><a href="http://www.17sucai.com/">IOS开发</a></li>
                <li><a href="http://www.17sucai.com/">Android开发</a></li>
                <li><a href="http://www.17sucai.com/">PHP</a></li>
                <li><a href="http://www.17sucai.com/">VS</a></li>
            </ul>
        </div>
        <div class="tuwen">
            <h3>图文推荐</h3>
            <ul>
                <li><a href="http://www.17sucai.com/"><img src="/static/web//img/01.jpg"><b>住在手机里的朋友</b></a>
                    <p>
                        <span class="tulanum"><a href="http://www.17sucai.com/">手机配件</a></span>
                        <span class="tutime">2016-02-16</span>
                    </p>
                </li>
                <li><a href="http://www.17sucai.com/"><img src="/static/web//img/02.jpg"><b>教你怎样用欠费手机拨打电话</b></a>
                    <p>
                        <span class="tulanum"><a href="http://www.17sucai.com/">手机配件</a></span>
                        <span class="tutime">2016-02-16</span>
                    </p></li>
                <li><a href="http://www.17sucai.com/"><img src="/static/web//img/03.jpg"><b>手机的16个惊人小秘密，据说99.999%的人都不知</b></a>
                    <p>
                        <span class="tulanum"><a href="http://www.17sucai.com/">手机配件</a></span>
                        <span class="tutime">2016-02-16</span>
                    </p></li>
                <li><a href="http://www.17sucai.com/"><img src="/static/web//img/06.jpg"><b>原来以为，一个人的勇敢是，删掉他的手机号码...</b></a>
                    <p>
                        <span class="tulanum"><a href="http://www.17sucai.com/">手机配件</a></span>
                        <span class="tutime">2016-02-16</span>
                    </p></li>
                <li><a href="http://www.17sucai.com/"><img src="/static/web//img/04.jpg"><b>豪雅手机正式发布! 在法国全手工打造的奢侈品</b></a>
                    <p>
                        <span class="tulanum"><a href="http://www.17sucai.com/">手机配件</a></span>
                        <span class="tutime">2016-02-16</span>
                    </p></li>
            </ul>
        </div>
        <div class="ad"><img src="/static/web/img/03.jpg"></div>
        <div class="links">
            <h3><span><a href="http://www.17sucai.com/">申请友情链接</a></span>友情链接</h3>
            <ul>
                <li><a href="http://www.17sucai.com/">醉牛逼的武魂生涯</a></li>
                <li><a href="http://www.17sucai.com/">观察者网</a></li>
                <li><a href="http://www.17sucai.com/">中国投资</a></li>
                <li><a href="http://www.17sucai.com/">强国论坛</a></li>
                <li><a href="http://www.17sucai.com/">车讯网</a></li>
                <li><a href="http://www.17sucai.com/">360导航</a></li>
                <li><a href="http://www.17sucai.com/">一带一路门户网</a></li>
            </ul>
        </div>
    </div>
</article>

</body></html>