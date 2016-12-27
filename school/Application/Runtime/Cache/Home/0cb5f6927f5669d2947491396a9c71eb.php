<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <title>企业网站已经悄悄的转变成了一种网络营销应用_我的网站</title>
    <meta name="keywords" content="企业网站,已经,悄悄,的,转变,成了,一种,当," />
    <meta name="description" content="当是你最后一次使用的电话簿找到的产品或服务？如果你有一台电脑，平板电脑或智能手机的技术和访问，甚至有基本的了解，这可能是很难记住，当你拖着那么大，笨重的大部头，并翻阅它，" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css" type="text/css" media="all" />
    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js" ></script><![endif]-->
</head>
<body >

<header style="background-color: black;">
    <div id="navbg"></div>

    <div class="wrapper" >
        <h1 class="logo">
            <a href="#"  title="微校">
                <img src="/school1/Public/Home/images/logo1.png" width="150" height="50" alt="" />
            </a>
        </h1>
        <nav>
            <ul>
                <li class="home"><a href="/school1/index.php/Home/index/index" >首页<span>网站首页！</span></a></li>
                <li class="cases"><a href="/school1/index.php/Home/news/newslist" title="网页制作">新闻<span>都有大事发生</span></a></li>
                <li class="service"><a href="/school1/index.php/Home/syllabus/login"  title="网站建设">课程表<span>都有什么课</span></a></li>
                <li class="client"><a href="/school1/index.php/Home/Grade/login"  title="解决方案">成绩<span>考了多少？</span></a></li>
                <li class="about"><a href="/school1/index.php/Home/goods/goodslist" title="二手交易">二手交易<span>都有哪些商品</span></a></li>
                <li class="loser"><a href="/school1/index.php/Home/lost/lostlist" title="失物招领">失物招领<span>都有哪些物品</span></a></li>
                <!--<li class="about"><a href="#"  title="关于学校">更多<span>更多功能</span></a>
                    <ul>
                        <li><a href="/school1/index.php/Home/goods/goodslist" title="二手交易">二手交易</a></li>
                        <li><a href="/school1/index.php/Home/lost/lostlist" title="失物招领">失物招领</a></li>
                    </ul>
                </li>-->
            </ul>
        </nav>


    </div>

    <div class="login" style="float:left;font-size: 16px;padding-left: 10px;color: lightgray ;position:fixed;">
        <?php
 if($_SESSION['username']!=null){ $self=U('user/self'); echo "欢迎您："."<a href='$self' style='text-decoration:underline;font-size: 15px;color:#FDF5E6;font-family: Helvetica;'>".$_SESSION['username']."</a>"; echo "&nbsp&nbsp"; $logout=U('user/logout'); $messageid = U("user/message"); $message = D('message'); $data = array('user_name'=>session('username'),'status'=>0); $count = $message->where($data)->count(); if($count>0){ echo "&nbsp;&nbsp;<a href='$logout' style='text-decoration:underline;font-size: 15px;color:#FDF5E6;font-family: Helvetica;'>注销</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$messageid'><img src='/school1/Public/home/images/5.jpg'/> </a>"; }else{ echo "&nbsp;&nbsp;<a href='$logout' style='text-decoration:underline;font-size: 15px;color:#FDF5E6;font-family: Helvetica;'>注销</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$messageid'><img src='/school1/Public/home/images/4.jpg'/> </a>";} }else { $login=U('user/login'); $register=U('user/register'); echo "&nbsp&nbsp<a href='$login' style='text-decoration:underline;font-size: 15px;color:#FDF5E6;font-family: Helvetica;'>亲，请登录</a>&nbsp&nbsp
        <a href='$register' style='text-decoration:underline;font-size: 15px;color:#FDF5E6;font-family: Helvetica;'>快速注册</a>" ; } ?>
    </div>

</header>




<!-- 查找最顶级栏目  -->
<section id="shownews">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>message</strong>消息</h2>
            <p>最新消息...<br/>message ...</p>
        </div>
    </div>
    <div class="category">
        <div class="wrapper">
            <h1>题目：<?php echo $info[0][msg_title];?></h1>
            <span>时间：<?php echo date('Y-m-d H:i:s',$info[0][msg_time]);?></span> </div>
    </div>

    <article>
        <div class="wrapper" id="detailed"> <br style="color: rgb(102, 102, 102); font-family: 'Microsoft YaHei', 'Segoe UI', Tahoma, Arial, Verdana, sans-serif; line-height: 25px; font-size:15px; text-align: justify;">
            主题：</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $info[0][msg_content];?></span><br style="color: rgb(102, 102, 102); font-family: 'Microsoft YaHei', 'Segoe UI', Tahoma, Arial, Verdana, sans-serif; line-height: 21px; text-align: justify;" />
        </div>


        <div id="case_footer">
            <div class="wrapper showother"> <a class="backlist" href="/school1/index.php/Home/user/message" tppabs="">返回案例列表</a> </div>
        </div>
    </article>
</section>
<footer>
    <div id="footerlink">
        <nav class="wrapper">
            <a id="gotop" href="javascript:void(0)">top</a>
        </nav>
    </div>
    <div id="footerinfo">
        <div class="wrapper1">
            <h2>联系我们<strong>Contact</strong></h2>
            <p style="font-size: 15px;">
                
                电子邮件：1536932302@qq.com<br/><br/>
                公司地址：河北省石家庄市南二环东路河北师范大学<br/><br/>
                备案编号：冀ICP备16023280号<br/><br/>
               
            </p>
            <img src="/school1/Public/Home/images/xy.png" id="homemap" width="258" height="190" alt="公司位置" />
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
    <!---- 详细页 ----->
    //Show News Start
    $("#case_footer>.showother>.previous,#case_footer>.showother>.next").hover(function(){
        $("span>img",this).stop(false,true).animate({"left":"-20px"},{duration:"fast", easing: "easeOutQuad"});
        $("#show_thumb>img").hide().eq($(this).index($("#case_footer>.showother>.previous,#case_footer>.showother>.next"))).show();
    },function(){
        $("span>img",this).stop(false,true).animate({"left":"0"},{duration:"fast", easing: "easeOutQuad"});
    });
    //Show News End
    $("#gotop").click(function(){$('body,html').animate({scrollTop:0},500);})
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3fe5b2b119b5fc4931e9c73e7071b0c6' type='text/javascript'%3E%3C/script%3E"));
    var bds_config = {"bdTop":203};
    $("#bdshell_js").attr("src","http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours());
    //]]>
</script>
</body>
</html>