<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <title>新闻_我的网站</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css" type="text/css" media="all" />
    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js" ></script><![endif]-->
</head>
<body>
<header style="background-color: black;">
    <div id="navbg"></div>

    <div class="wrapper" >
        <h1 class="logo">
            <a href="index.html"  title="微校">
                <img src="/school1/Public/Home/images/logo1.png" width="150" height="50" alt="" />
            </a>
        </h1>
        <nav>
            <ul>
                <li class="home"><a href="/school1/index.php/Home/index/index" >首页<span>网站首页！</span></a></li>
                <li class="cases"><a href="/school1/index.php/Home/Goods/goodslist" title="网页制作">商品<span>都有哪些商品</span></a></li>
                <li class="service"><a href="/school1/index.php/Home/syllabus/login"  title="网站建设">课程表<span>都有什么课</span></a></li>
                <li class="client"><a href="/school1/index.php/Home/Grade/login"  title="解决方案">成绩<span>考了多少？</span></a></li>
                <li class="about"><a href="/school1/index.php/Home/about/about"  title="关于学校">关于<span>项目如何</span></a></li>
            </ul>
        </nav>


    </div>

    <div class="login" style="float:left;font-size: 16px;padding-left: 10px;color: lightgray ;position:fixed;">
        <?php
 if($_SESSION['username']!=null){ $self=U('user/self'); echo "欢迎您："."<a href='$self'>".$_SESSION['username']."</a>"; echo "&nbsp&nbsp"; $logout=U('user/logout'); echo "<a href='$logout'>&nbsp;&nbsp;&nbsp;注销</a> "; } else { $login=U('user/login'); $register=U('user/register'); echo "<a href='$login'>登录</a>
        <a href='$register'>注册</a>" ; } ?>
    </div>

</header>
<section id="newslist">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>ACTIVITY</strong>活动</h2>
            <p>将要折腾什么...<br/>
                Recently is to do ...</p>
        </div>
    </div>
    <div class="category">
        <div class="wrapper">
            <ul>

                <li><a href="../Activity/activitylist" tppabs="http://mc18.eatdou.com/news/gsnews/">学院活动</a></li>

                <li><a href="../Activity/activitylist" tppabs="http://mc18.eatdou.com/news/hynews/">社团活动</a></li>


            </ul>
        </div>
    </div>
    <ul class="news wrapper">
        <li>
            <a href="../Activity/activitydetail"><img src="../uploads/131102/1-131102210K4H1.jpg" tppabs="http://mc18.eatdou.com/uploads/131102/1-131102210K4H1.jpg" data-original="" alt="网络营销最重要的一步，你做到了吗？" /></a>
            <div class="newslist">
                <a href="../Activity/activitydetail">网络营销最重要的一步，你做到了吗？</a>
                <span>UPTATED:2013/11/02</span>
                <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你忽略了网络营销最重要的一步，所以你....</p>
            </div>
        </li>
        <li>
            <a href="../Activity/activitydetail"><img src="../uploads/131102/1-131102210K4H1.jpg" tppabs="http://mc18.eatdou.com/uploads/131102/1-131102210K4H1.jpg" data-original="" alt="网络营销最重要的一步，你做到了吗？" /></a>
            <div class="newslist">
                <a href="../Activity/activitydetail">网络营销最重要的一步，你做到了吗？</a>
                <span>UPTATED:2013/11/02</span>
                <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你忽略了网络营销最重要的一步，所以你....</p>
            </div>
        </li>
        <li>
            <a href="../Activity/activitydetail"><img src="../uploads/131102/1-131102210K4H1.jpg" tppabs="http://mc18.eatdou.com/uploads/131102/1-131102210K4H1.jpg" data-original="" alt="网络营销最重要的一步，你做到了吗？" /></a>
            <div class="newslist">
                <a href="../Activity/activitydetail">网络营销最重要的一步，你做到了吗？</a>
                <span>UPTATED:2013/11/02</span>
                <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你忽略了网络营销最重要的一步，所以你....</p>
            </div>
        </li>
        <li>
            <a href="../Activity/activitydetail"><img src="../uploads/131102/1-131102210K4H1.jpg" tppabs="http://mc18.eatdou.com/uploads/131102/1-131102210K4H1.jpg" data-original="" alt="网络营销最重要的一步，你做到了吗？" /></a>
            <div class="newslist">
                <a href="../Activity/activitydetail">网络营销最重要的一步，你做到了吗？</a>
                <span>UPTATED:2013/11/02</span>
                <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你忽略了网络营销最重要的一步，所以你....</p>
            </div>
        </li>
    </ul>
    <div class="dede_pages">
        <ul class="pagelist">
            <li><span class="pageinfo">共 <strong>1</strong>页<strong>4</strong>条记录</span></li>

        </ul>
    </div><!-- /pages -->



</section>
<footer>
    <div id="footerlink">
        <nav class="wrapper">
            <a href="/school1/index.php/Home/Goods/goodslist" >二手交易</a>
            <a href="/school1/index.php/Home/Lost/lostlist">失物招领</a>
            <a href="/school1/index.php/Home/News/newslist">新闻</a>
            <a href="/school1/index.php/Home/Activity/activitylist">活动</a>
            <a href="/school1/index.php/Home/Syllabus/login">课程表</a>
            <a href="/school1/index.php/Home/Grade/login">成绩</a>
            <a href="#">校历</a>
            <a href="#">地图</a>
            <a id="gotop" href="javascript:void(0)">top</a>
        </nav>
    </div>
    <div id="footerinfo">
        <div class="wrapper1">
            <h2>联系我们<strong>Contact</strong></h2>
            <p>
                电话：xxxxxxxx<br/>
                传真：xxxxxxxxx<br/>
                电子邮件：xxxxxxxxx<br/>
                公司地址：xxxxxxxxxxx<br/>
                备案编号：xxxxxxxx<br/>
                xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </p>
            <img src="/school1/Public/Home/images/map.png" id="homemap" width="258" height="190" alt="公司位置" />
        </div>
    </div>
</footer>
<script type="text/javascript" src="/school1/Public/Home/js/jquery.1.8.2.min.js" ></script>
<script type="text/javascript" src="/school1/Public/Home/js/jquery.plugin.min.js" ></script>
<!--[if IE 6]>
<script type="text/javascript" src="/school1/Public/Home/js/killie6.js" ></script>
<![endif]-->

<script type="text/javascript">
    //<![CDATA[
    //Nav Start
    $("header>div>nav>ul>li>a").hover(function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"6px",opacity:"0.7"},{duration:"normal", easing: "easeOutElastic"});
    },function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"10px",opacity:"1"},{duration:"normal", easing: "easeOutElastic"});
    });
    //<!----新闻---->
    <!---- 新闻首页 ----->
    //Nav End
    $("#gotop").click(function(){$('body,html').animate({scrollTop:0},500);})
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3fe5b2b119b5fc4931e9c73e7071b0c6' type='text/javascript'%3E%3C/script%3E"));
    var bds_config = {"bdTop":203};
    $("#bdshell_js").attr("src","http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours());
    //]]>
</script></body>
</html>