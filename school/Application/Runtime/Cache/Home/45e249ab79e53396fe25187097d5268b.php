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
<header>
    <div id="navbg"></div>
    <div class="wrapper">
        <h1 class="logo">
            <a href="index.htm"  title="微校">
                <img src="/school1/Public/Home/images/logo.png" width="213" height="36" alt="" />
            </a>
        </h1>
        <nav>
            <ul>
                <li class="home"><a href="/school1/index.php/Home/index/index" >首页<span>网站首页！</span></a></li>
                <li class="cases"><a href="/school1/index.php/Home/Goods/goodslist" title="网页制作">商品<span>都有哪些商品</span></a></li>
                <li class="service"><a href="/school1/index.php/Home/syllabus/syllabus"  title="网站建设">课程表<span>都有什么课</span></a></li>
                <li class="client"><a href="/school1/index.php/Home/Grade/grade"  title="解决方案">成绩<span>考了多少？</span></a></li>
                <li class="about"><a href="/school1/index.php/Home/about/about"  title="关于学校">关于<span>项目如何</span></a></li>
            </ul>
        </nav>
        <?php
 if($_SESSION['username']!=null){ $self=U('user/self'); echo "欢迎您,"."<a href='$self'>".$_SESSION['username']."</a>"; echo "&nbsp&nbsp"; $logout=U('user/logout'); echo "<a href='$logout'>注销</a> "; } else { $login=U('user/login'); $register=U('user/register'); echo "<a href='$login'>登录</a>
        <a href='$register'>注册</a>" ; } ?>
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
    <article>
        <div class="wrapper">
            <div id="overview">
                <div class="overview_bg"></div>

            </div>
            <div style='text-align: left;font-size: 18px;'>
                <form action="/school1/index.php/Home/Lost/add" method="post" enctype="multipart/form-data">
                    <table>
                        <ul >

                            <li>
                                物品名称：<input name="lost_name" class="required" type="text" />
                            </li>
                            </br></br>
                            <li>

                                物品种类：<input name="lost_type"  type="radio" value="1"  />学习
                                <input name="lost_type"  type="radio" value="2" />电子
                                <input name="lost_type"  type="radio" value="3" />生活
                                <input name="lost_type"  type="radio" value="4" />其他

                            </li>
                            </br></br>
                            <li>

                                QQ：<input name="lost_qq"  type="text" />


                            </li>
                            </br></br>
                            <li>
                                TEL：<input name="lost_tel"  type="text" />
                            </li>
                            </br></br>
                            <li>

                                物品图片：<input name="lost_img"  type="file" />

                            </li>
                            </br></br>
                            <li>
                                物品详情：<textarea rows="3" cols="30" name="lost_detail"></textarea>
                            </li>

                            <input type="hidden" name='user_id' value='<?php echo ($data); ?>' />
                        </ul>
                        <?php
 $goods_time = date('Y-m-d,H:i:s',time()); ?>
                        <input type="hidden" name='lost_time' value=<?php echo ($lost_time); ?> />
                        </br></br></br></br>
                        <button type="submit" class="us_Submit_reg" >提交</button>
            </div>
        </div>
        </table>
        </form>
    </article>
    <div id="case_footer">
        <div class="wrapper showother">
            <a class="backlist" href="index.htm" tppabs="http://mc18.eatdou.com/case/shangwu/">返回案例列表</a>

        </div>
    </div>
</section>
</form>
<footer>
    <div id="footerlink">
        <nav class="wrapper">
            <a href="/school1/index.php/Home/Goods/goodslist" >二手交易</a>
            <a href="/school1/index.php/Home/Lost/lostlist">失物招领</a>
            <a href="/school1/index.php/Home/News/newslist">新闻</a>
            <a href="/school1/index.php/Home/Activity/activitylist">活动</a>
            <a href="/school1/index.php/Home/Syllabus/syllabus">课程表</a>
            <a href="/school1/index.php/Home/Grade/grade">成绩</a>
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
            <img src="/school1/Public/Home/images/map.gif" id="homemap" width="258" height="190" alt="公司位置" />
        </div>
        <div class="links">
            <h2>友情链接<strong>Links</strong></h2>
            <p>
            <ul>
                <li>
                    <a href="#" target='_blank'>微校</a>
                </li>
                <li>
                    <a href="#" target='_blank'>微校</a>
                </li>
                <li>
                    <a href="#" target='_blank'>微校</a>
                </li>
                <li>
                    <a href="#" target='_blank'>微校</a>
                </li>
            </ul>
            </p>
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