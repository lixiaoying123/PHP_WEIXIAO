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




<section id="newslist">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>NEWS</strong>新闻</h2>
            <p>最近正在折腾...<br/>Recently is to do ...</p>

        </div>
    </div>

    <ul class="news wrapper">
        <?php foreach($list as $key => $value){ ?>

        <input type="hidden" name='id' value="<?php echo $_GET['id'];?>" />

        <li>
            <a href="/school1/index.php/Home/News/newsdetail/news_id/<?php echo ($value["news_id"]); ?>">
                <?php if($value[news_img]==null){ echo "<img src='/school1/Public/home/images/1.png'   width='90' height='90' alt=''/>"; }else{ echo "<img src='$value[news_img]'   width='90' height='90' alt=''/>";}?>
                <!--<img src="/school1/Public/<?php echo ($value["news_img"]); ?>" data-original="" alt="" />--></a>
            <div class="newslist">
                <a href="/school1/index.php/Home/News/newsdetail/news_id/<?php echo ($value["news_id"]); ?>"><?php echo ($value["news_title"]); ?></a>
                <span><?php echo (date('Y-m-d',$value["news_time"])); ?></span>
                <p><?php echo mb_substr("$value[news_content]",0,100,'utf-8')."...";?></p>
            </div>
        </li>
        <?php } ?>
    </ul>

    <div class="dede_pages">
    <ul class="pagelist">
        <span class="pageinfo"><strong><?php echo ($pagelist); ?></strong></span>
    </ul>
</div>


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