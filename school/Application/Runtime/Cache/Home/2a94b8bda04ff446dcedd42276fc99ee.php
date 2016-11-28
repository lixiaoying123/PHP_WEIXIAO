<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="baidu-site-verification" content="3ztG4oI0ku" />
    <title>html5高档大气的企业网站模版-777模板www.777moban.com</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css"  type="text/css" media="all" />t
    <style type="text/css">
        #one{
            margin-left:230px;
        }
        #one a{
            padding-left:70px;
            padding-right: 200px;
            text-decoration: none;
            color:black;
            font-size:20px;
            border: 1px solid black;
        }
        /*#one div{
            width:1000px;
            height: 100px;
            display: inline;
            border:1px solid black;
        }*/
        #login{
            color:#d8d9d8;
        }


        #banner_ctr li{ float:left;list-style: none;}
        #banner_ctr li a{
            text-decoration: none;
            color:#d8d9d8;
            display:block;
            text-align:center;
            font-weight:normal;
        }
        #banner_ctr li a:hover{
            color:#999;
        }
    </style>
    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js"></script><![endif]-->
</head>
<body id="ruifoxHome">

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
<section id="banner">
    <ul id="banner_img">
        <li style="background-image:url(/school1/Public/Home/images/banner_bg4.jpg);display:block">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>二手交易</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg2.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>失物招领</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg1.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>新闻</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg3.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>活动</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg8.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>课程表</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg6.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>成绩</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg7.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>校历</h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_bg5.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2>地图</h2>
                    <p></p>
                </div>

            </div>
        </li>
    </ul>
    <div id="banner_ctr">
        <div id="drag_ctr"></div>
        <ul>
            <li><a href="/school1/index.php/Home/Goods/goodslist">二手交易</a></li>
            <li><a href="/school1/index.php/Home/Lost/lostlist">失物招领</a></li>
            <li><a href="/school1/index.php/Home/News/newslist">新闻</a></li>
            <li><a href="/school1/index.php/Home/Activity/activitylist">活动</a></li>
            <li><a href="/school1/index.php/Home/Syllabus/syllabus">课程表</a></li>
            <li><a href="/school1/index.php/Home/Grade/grade">成绩</a></li>
            <li><a href="#">校历</a></li>
            <li><a href="#">地图</a></li>
        </ul>
        <div id="drag_arrow"></div>
    </div>
</section>

<section id="cases">
    <div class="cat_title wrapper">
        <h2>商品<strong>CASES</strong></h2>
        <p>我们的商品，他们的故事<br/>
            Our cases, their stories </p>
        <a href="/school1/index.php/Home/Goods/goodslist"  class="more">MORE+</a> </div>

    <ul>
        <?php foreach($list as $value){ ?>

        <li><img src="/school1/Public/<?php echo ($value["goods_img"]); ?>"   width="240" height="152" alt="商品"/>
            <p> <strong><?php echo ($value["goods_name"]); ?> </strong><?php echo ($value["goods_detail"]); ?><br/>
                <a href="/school1/index.php/Home/Goods/goodsdetail?id=<?php echo ($value["goods_id"]); ?>"  class="btn_blue">查看商品详情</a>
                <!--<a href="javascript:if(confirm('http://www.777moban.com/'))window.location='http://www.777moban.com/'" target="_blank" class="openurl">访问品牌网站</a>
            --></p>
        </li>
        <?php }?>
    </ul>
</section>

<section id="news">
    <div class="cat_title wrapper">
        <h2>新闻<strong>News</strong></h2>
        <p>关注我们、关注前沿<br/>
            Recently is to do ...</p>
        <a href="/school1/index.php/Home/News/newslist"  class="more">MORE+</a> </div>
    <div class="newsdata">
        <div class="newsad"> <img src="/school1/Public/Home/images/news.png"  alt="html5" width="320" height="485" /> </div>
        <ul>

            <li> <a href="../News/newsdetail"><img src="uploads/131102/1-131102210K4H1.jpg"   width="90" height="90" alt="网络营销最重要的一步，你做到了吗？"/></a>
                <div class="newslist"> <a href="../News/newsdetail" title="网络营销最重要的一步，你做到了吗？">网络营销最重要的一步，你做到了吗？</a> <span>UPTATED:2013/11/02</span>
                    <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你....</p>
                </div>
            </li>
            <li> <a href="../News/newsdetail"><img src="uploads/131102/1-131102210K4H1.jpg"   width="90" height="90" alt="网络营销最重要的一步，你做到了吗？"/></a>
                <div class="newslist"> <a href="../News/newsdetail" title="网络营销最重要的一步，你做到了吗？">网络营销最重要的一步，你做到了吗？</a> <span>UPTATED:2013/11/02</span>
                    <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你....</p>
                </div>
            </li>
            <li> <a href="../News/newsdetail"><img src="uploads/131102/1-131102210K4H1.jpg"   width="90" height="90" alt="网络营销最重要的一步，你做到了吗？"/></a>
                <div class="newslist"> <a href="../News/newsdetail" title="网络营销最重要的一步，你做到了吗？">网络营销最重要的一步，你做到了吗？</a> <span>UPTATED:2013/11/02</span>
                    <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你....</p>
                </div>
            </li>
            <li> <a href="../News/newsdetail"><img src="uploads/131102/1-131102210K4H1.jpg"   width="90" height="90" alt="网络营销最重要的一步，你做到了吗？"/></a>
                <div class="newslist"> <a href="../News/newsdetail" title="网络营销最重要的一步，你做到了吗？">网络营销最重要的一步，你做到了吗？</a> <span>UPTATED:2013/11/02</span>
                    <p>很多人总是会问，为什么我的网站转化率总是居高不下？也许你的网站很美观大气，功能很完善，入口非常便捷丰富，但是就是转化不好！原因只在于，你....</p>
                </div>
            </li>

        </ul>
    </div>
</section>
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
<script type="text/javascript" src="/school1/Public/Home/js/jquery.plugin.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="/school1/Public/Home/js/killie6.js"></script>
<![endif]-->
<script type="text/javascript">
    //<![CDATA[
    //Nav Start
    $("header>div>nav>ul>li>a").hover(function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"6px",opacity:"0.7"},{duration:"normal", easing: "easeOutElastic"});
    },function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"10px",opacity:"1"},{duration:"normal", easing: "easeOutElastic"});
    });
    //<!--- 首页 ---->
    $('.ad_img,#banner_ctr,#client').pngFix();
    $(window).scroll(function(){
        $(this).scrollTop()>80?$("#navbg").stop(false,true).animate({opacity:"1"},"normal"):$("#navbg").stop(false,true).animate({opacity:"0.8"},"normal");
    });
    //Banner Start
    var curIndex=0;
    var time=800;
    var slideTime=5000;
    var adTxt=$("#banner_img>li>div>.ad_txt");
    var adImg=$("#banner_img>li>div>.ad_img");
    var int=setInterval("autoSlide()",slideTime);

    $("#banner_ctr>ul>li[class!='first-item'][class!='last-item']").click(function(){
        show($(this).index("#banner_ctr>ul>li[class!='first-item'][class!='last-item']"));
        window.clearInterval(int);
        int=setInterval("autoSlide()",slideTime);
    });

    function autoSlide(){
        curIndex+1>=$("#banner_img>li").size()?curIndex=-1:false;
        show(curIndex+1);
    }
    function show(index){
        $.easing.def="easeOutQuad";
        $("#drag_ctr,#drag_arrow").stop(false,true).animate({left:index*115+20},300);
        $("#banner_img>li").eq(curIndex).stop(false,true).fadeOut(time);
        adTxt.eq(curIndex).stop(false,true).animate({top:"340px"},time);
        adImg.eq(curIndex).stop(false,true).animate({right:"120px"},time);
        setTimeout(function(){
            $("#banner_img>li").eq(index).stop(false,true).fadeIn(time);
            adTxt.eq(index).children("p").css({paddingTop:"50px",paddingBottom:"50px"}).stop(false,true).animate({paddingTop:"0",paddingBottom:"0"},time);
            adTxt.eq(index).css({top:"0",opacity:"0"}).stop(false,true).animate({top:"170px",opacity:"1"},time);
            adImg.eq(index).css({right:"-50px",opacity:"0"}).stop(false,true).animate({right:"10px",opacity:"1"},time);
        },200)
        curIndex=index;
    }
    //Banner End
    //Cases Start
    if($.support.transition){
        $("#cases>ul>li").hover(function(){
            $("img",this).stop(false,true).transition({
                perspective: '300px',
                rotateY: '180deg',
                opacity: '0'
            });
            $("p",this).css({display:'block',opacity:'0',rotateY: '-180deg'}).stop(false,true).transition({
                perspective: '300px',
                rotateY: '0deg',
                opacity: '1'
            });
        },function(){
            $("img",this).show().stop(false,true).transition({
                perspective: '300px',
                rotateY: '0deg',
                opacity: '1'
            });
            $("p",this).stop(false,true).transition({
                perspective: '300px',
                rotateY: '180deg',
                opacity: '0'
            });
        });
    }else{
        $("#cases>ul>li").hover(function(){
            $("img",this).stop(false,true).slideUp("fast");
            $("p",this).stop(false,true).slideDown("fast");
        },function(){
            $("img",this).stop(false,true).slideDown("fast");
            $("p",this).stop(false,true).slideUp("fast");
        });
    }
    $("#cases>ul>li>img").lazyload({effect:"fadeIn",failurelimit:10});
    $("#gotop").click(function(){$('body,html').animate({scrollTop:0},500);})

    //]]>
</script>
</body>
</html>