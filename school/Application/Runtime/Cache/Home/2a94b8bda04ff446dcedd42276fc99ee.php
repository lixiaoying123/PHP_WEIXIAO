<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<block>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="baidu-site-verification" content="3ztG4oI0ku" />
    <title>微校</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css"  type="text/css" media="all" />

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
        .login a{
            text-decoration:none;
        }
        .login a:hover{
            text-decoration:none;
            color:#999;
        }
    </style>
    <link rel="stylesheet" href="../../../../Public/Home/css/style.css">
    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js"></script><![endif]-->
    </block>
</head>
<body id="ruifoxHome">


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
<section id="banner">
    <ul id="banner_img">
        <li style="background-image:url(/school1/Public/Home/images/banner_04.jpg);display:block">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2></h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_02.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2></h2>
                    <p></p>
                </div>

            </div>
        </li>
        <li style="background-image:url(/school1/Public/Home/images/banner_01.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2></h2>
                    <p></p>
                </div>

            </div>
        </li>

        <li style="background-image:url(/school1/Public/Home/images/banner_03.jpg);">
            <div class="wrapper">
                <div class="ad_txt">
                    <h2></h2>
                    <p></p>
                </div>

            </div>
        </li>

    </ul>
</section>

<section id="cases">
    <div class="cat_title wrapper">
        <h2>商品<strong>GOODS</strong></h2>
        <p>我们的商品，他们的故事<br/>
            Our goods, their stories </p>
        <a href="/school1/index.php/Home/Goods/goodslist"  class="more">MORE+</a> </div>

    <ul>
        <?php foreach($list as $key=>$value){ ?>

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
            Focus on us, focus on the frontier</p>
        <a href="/school1/index.php/Home/News/newslist"  class="more">MORE+</a> </div>
    <div class="newsdata">
        <div class="newsad"> <img src="/school1/Public/Home/images/timg.png"  alt="html5" width="320" height="485" /> </div>
        <ul>
            <?php foreach($info as $key => $value){?>
            <input type="hidden" name='id' value="{:$_GET['id']}" />

            <li> <a href="/school1/index.php/Home/News/newsdetail/news_id/<?php echo ($value["news_id"]); ?>">
                <?php if($value[news_img]==null){ echo "<img src='/school1/Public/home/images/1.png'   width='90' height='90' alt=''/>"; }else{ echo "<img src='$value[news_img]'   width='90' height='90' alt=''/>";}?>
                <!--<img src="<?php echo ($value["news_img"]); ?>"   width="90" height="90" alt=""/>--></a>
                <div class="newslist"> <a href="../News/newsdetail/news_id/<?php echo ($value["news_id"]); ?>" title=""><?php echo mb_substr("$value[news_title]",0,30,'utf-8')."..."; ?></a> <span>时间：<?php echo (date('Y-m-d',$value["news_time"])); ?></span>
                    <p><?php echo mb_substr("$value[news_content]",0,80,'utf-8')."...";?></p>
                </div>
            </li>
            <?php }?>

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
            <p style="font-size: 15px;">电子邮件：1536932302@qq.com<br/><br/>
                公司地址：河北省石家庄市南二环东路河北师范大学<br/><br/>
                备案编号：冀ICP备16023280号<br/>
            </p>
            <img src="/school1/Public/Home/images/xy.png" id="homemap" width="258" height="190" alt="公司位置" />
        </div>
        <div class="links">
            <h2>友情链接<strong>Links</strong></h2>
            <p>
            <ul style="font-size: 16px;">
                <li>
                    <a href="http://www.hebtu.edu.cn/" target='_blank' style="color: lightblue;">河北师范大学</a>
                </li>
                <li>
                    <a href="http://software.hebtu.edu.cn/" target='_blank' style="color: lightblue;">软件学院官网</a>
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