<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <title>关于_我的网站</title>
    <meta name="keywords" content="这里填写关键词" />
    <meta name="description" content="这里填写描述" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css" type="text/css" media="all" />


    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js"></script><![endif]-->
</head>
<body >
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
<!-- 查找最顶级栏目  -->
<section id="single">
    <!-- 查找子栏目  -->
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>ABOUT</strong>关于我们</h2>
            <p>我们是谁？<br/>Who are we?</p>
        </div>
    </div>
    <div class="category">
        <div class="wrapper">
            <h1>关于</h1>

            <ul class="catbtn">

            </ul>
        </div>
    </div>
    <article class="serv_detailed">
        <div id="detailed">
            <p class="t4">[专业+专注]</p>
            <div class="t4Content">
                <ul>
                    <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
                    <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
                </ul>
            </div>
            <p class="t4">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            <div class="t4Content">
                <ul>
                    <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
                    <li>网址：<a href="javascript:if(confirm('http:...'))window.location='http://www.../'"  target="_blank">http://www.njro168.com/</a></li>
                </ul>
            </div>
        </div>
        <div id="case_footer"></div>
    </article>
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
<script type="text/javascript" src="/school1/Public/Home/js/jquery.1.8.2.min.js"></script>
<script type="text/javascript" src="/school1/Public/Home/js/jquery.plugin.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="/school1/Public/Home/js/killie6.js"></script>
<![endif]-->

</body>
</html>