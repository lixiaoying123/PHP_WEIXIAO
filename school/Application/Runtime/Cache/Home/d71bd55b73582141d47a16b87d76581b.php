<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
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
<section id="show_cases">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>Lost</strong>丢失物品</h2>
            <p>丢失了什么<br/>
                lost and found... </p>
        </div>
    </div>

        <div class="wrapper">
            <div id="overview">
                <div class="overview_bg"></div>

            </div>
            <article>

            <div style='text-align: left;font-size: 18px;'>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--隐藏域传递被修改的商品id信息-->
                    <input type="hidden" name="lost_id" value="<?php echo ($info["lost_id"]); ?>" />
                    <table>
                        <ul >

                            <li>
                                商品名称：<input name="lost_name" class="required" type="text" value="<?php echo ($info["lost_name"]); ?>"/>
                            </li>
                            </br></br>
                            <li>

                                商品种类：
                               <?php
 if($info[lost_type]=='study'){ echo '<input name="lost_type"  type="radio" value="study" checked/>学习'; echo '<input name="lost_type"  type="radio" value="dianzi" />电子'; echo '<input name="lost_type"  type="radio" value="life" />生活'; echo '<input name="lost_type"  type="radio" value="other" />其他'; }else if($info[lost_type]=='dianzi'){ echo '<input name="lost_type"  type="radio" value="study" />学习'; echo '<input name="lost_type"  type="radio" value="dianzi" checked/>电子'; echo '<input name="lost_type"  type="radio" value="life" />生活'; echo '<input name="lost_type"  type="radio" value="other" />其他'; }else if($info[lost_type]=='life'){ echo '<input name="lost_type"  type="radio" value="study" />学习'; echo '<input name="lost_type"  type="radio" value="dianzi" />电子'; echo '<input name="lost_type"  type="radio" value="life" checked/>生活'; echo '<input name="lost_type"  type="radio" value="other" />其他'; }else{ echo '<input name="lost_type"  type="radio" value="study" />学习'; echo '<input name="lost_type"  type="radio" value="dianzi" />电子'; echo '<input name="lost_type"  type="radio" value="life" />生活'; echo '<input name="lost_type"  type="radio" value="other" checked/>其他'; } ?>
                            </li>
                            </br></br>
                            <li>

                                QQ：<input name="lost_qq"  type="text" value="<?php echo ($info["lost_qq"]); ?>"/>


                            </li>
                            </br></br>
                            <li>

                                TEL：<input name="lost_tel"  type="text" value="<?php echo ($info["lost_tel"]); ?>"/>

                            </li>
                            </br></br>
                            <li>

                                商品图片：
                                <input name="lost_img"  type="file" /></br></br>
                                <img src="/school1/Public/<?php echo ($info["lost_img"]); ?>" tppabs=""  width="240" height="152" />
                                </br>
                                <input name="lost_img1"  type="file" /></br></br>
                                <img src="/school1/Public/<?php echo ($info["lost_img1"]); ?>" tppabs=""  width="240" height="152" />

                            </li>
                            </br></br>
                            <li>
                                商品详情：<textarea rows="3" cols="30" name="lost_detail"><?php echo ($info["lost_detail"]); ?></textarea>
                            </li>

                        </ul>
                        </br></br></br></br>
                        <button type="submit" class="us_Submit_reg" name="sub">提交</button>
                    </table>

                </form>
        </div>


    </article>
    <div id="case_footer">
        <div class="wrapper showother">
            <a class="backlist" href="index.htm" tppabs="http://mc18.eatdou.com/case/shangwu/">返回案例列表</a>

        </div>
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
    //<!--- 案例 ---->
    <!--案例详细-->
    //Cases Start
    if($.browser.msie&&$.browser.version==6.0&&!$.support.style){
        $("#overview").height($("#detailed").height());
    }
    $(window).scroll(function(){
        if($.browser.msie&&$.browser.version==6.0&&!$.support.style){
            return false;
        }
        if($(this).scrollTop()>110){
            $("article").css("background-position","center 80px");
        }else{
            $("article").css("background-position","center "+(190-$(this).scrollTop())+"px");
        }
    });
    $('#case_info h1').pngFix();
    $("#detailed img").lazyload({effect:"fadeIn",failurelimit:10});
    $("#case_footer>.showother>.previous,#case_footer>.showother>.next").hover(function(){
        $("span>img",this).stop(false,true).animate({"left":"-20px"},{duration:"fast", easing: "easeOutQuad"});
        $("#show_thumb>img").hide().eq($(this).index($("#case_footer>.showother>.previous,#case_footer>.showother>.next"))).show();
        $("#show_thumb").css({display:"block",left:$(this).css("left"),right:$(this).css("right"),bottom:"20px",opacity:"0"}).stop(false,true).animate({bottom:"25px",opacity:"1"},{duration:"fast", easing: "easeOutQuad"});
    },function(){
        $("span>img",this).stop(false,true).animate({"left":"0"},{duration:"fast", easing: "easeOutQuad"});
        $("#show_thumb").stop(false,true).animate({bottom:"20px",opacity:"0"},{duration:"fast", easing: "easeOutQuad"});
    })
    //Cases End
    //Cases End
    $("#gotop").click(function(){$('body,html').animate({scrollTop:0},500);})
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3fe5b2b119b5fc4931e9c73e7071b0c6' type='text/javascript'%3E%3C/script%3E"));
    var bds_config = {"bdTop":203};
    $("#bdshell_js").attr("src","http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours());
    //]]>
</script></body>
</html>