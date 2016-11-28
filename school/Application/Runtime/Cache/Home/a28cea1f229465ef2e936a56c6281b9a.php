<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024" />
    <title>案例_我的网站</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="/school1/Public/Home/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/school1/Public/Home/css/goodslist.css" type="text/css" media="all" />
    <!--[if lt IE 9]><script type="text/javascript" src="/school1/Public/Home/js/html5.js" ></script><![endif]-->
</head>
<body>
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
<section id="caseslist">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong>LOST</strong>失物</h2>
            <p>失去了什么<br/>
                lost and found... </p>
            <a href="/school1/index.php/Home/Lost/add">添加</a>&nbsp&nbsp&nbsp
            <a href="/school1/index.php/Home/Lost/self">我的物品</a>
        </div>
    </div>
    <div id="filter">
        <div class="wrapper">
            <table width="1000px" border="0" align="center">
                <form action="/school1/index.php/Home/Lost/lostlist" method="post" >
                    <tr id="header">
                        <td width="640px" height="50px">

                            <li><button type="submit" name="study" value="study" >学习类</button></li>

                            <li><button type="submit" name="dianzi" value="dianzi">电子类</button></li>

                            <li><button type="submit" name="life" value="life">生活类</button></li>

                            <li><button type="submit" name="other" value="other">其他</button></li>
                            <div id="paixu">

                                时间排序<a href="#"><button type="submit" name="timeup" value="timeup" ><img src="/school1/Public/Home/css/images/up.jpg"  width="10" height="10"  /></button></a>&ensp;<a href="#"><button type="submit" name="timedown" value="timedown" ><img src="/school1/Public/Home/css/images/down.jpg"  width="10" height="10"  /></button></a>&ensp;&ensp;&ensp;&ensp;

                               <!-- 价格排序<a href="#"><button type="submit" name="priceup" value="priceup"><img src="/school1/Public/Home/css/images/up.jpg"  width="10" height="10"  /></button></a>&ensp;<a href="#"><button type="submit" name="pricedown" value="pricedown"><img src="/school1/Public/Home/css/images/down.jpg"  width="10" height="10"  /></button></a>
                            --></div>
                </form>

                </td>

                <td align="right" >
                    <form action="/school1/index.php/Home/Lost/lostlist" method="post" >
                        <div class="logo">
                            <a href="#"><button type="submit" class="ss" name="sosuo" ></button></a>
                            <input name="sosuo" type="text" class="ssb" value="请输入关键词"/>
                        </div>
                    </form>
                </td>
                </tr>

            </table>

        </div>
    </div>
    <ul class="cases wrapper">

        <?php foreach($list as $key => $value){?>

        <input type="hidden" name='id' value="{:$_GET['id']}" />



        <li class="item1"> <img src="/school1/Public/<?php echo ($value["lost_img"]); ?>" tppabs=""  width="240" height="152" alt="<?php echo ($value["lost_name"]); ?>" /> <strong></strong>
            <?php echo ($value["lost_name"]); ?>
            <p> <strong><?php echo ($value["lost_name"]); ?> </strong> <em>QQ：<?php echo ($value["lost_qq"]); ?><br/>
                时间:<?php echo ($value["lost_time"]); ?></em><?php echo ($value["lost_detail"]); ?><br/>
                <a href="/school1/index.php/Home/Lost/lostdetail?id=<?php echo ($value["lost_id"]); ?>" tppabs="" class="btn_blue">查看商品详情</a> </p>
        </li>

        <?php } ?>
    </ul>

    <div class="dede_pages">
        <ul class="pagelist">
            <span class="pageinfo"><strong><?php echo ($page); ?></strong></span>

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
    //Nav Start

    var pagecur=1;//当前页
    var username=getCookie("username");
    $("header>div>nav>ul>li>a").hover(function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"6px",opacity:"0.7"},{duration:"normal", easing: "easeOutElastic"});
    },function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"10px",opacity:"1"},{duration:"normal", easing: "easeOutElastic"});
    });
    //Nav End

    //Filter Start

    ajaxLogin("username="+username);
    $("#filter>div>p>.signIn").live("click",function(){
        $("#login_bg").css("height",$("body").height()+"px").fadeIn();
        $("#login").fadeIn();
        $("#username").val("");
        $("#password").val("");
        $("#login_err").text("");
    });
    $("#filter>div>p>.signOut").live("click",function(){
        ajaxOut("act=loginout&username="+username);
    });
    $("#login .close").click(closeLogin);
    $("#login .textinput").focusout(loginck);
    $("#signin").click(function(){
        if(loginck()) ajaxLogin("username="+$("#username").val()+"&password="+$("#password").val());
    });
    function closeLogin(){
        $("#login_bg").fadeOut();
        $("#login").fadeOut();
    }
    function loginck(){
        var reg=/[a-z]{3,12}/.test($("#username").val());
        if($("#username").val()==""){
            $("#login_err").text("帐号不能为空");
            return false;
        }
        if(!reg){
            $("#login_err").text("帐号格式不正确");
            return false;
        }
        if($("#password").val()==""){
            $("#login_err").text("密码不能为空");
            return false;
        }
        $("#login_err").text("");
        return true;
    }
    function getCookie(name){
        var cookieValue = "";
        var search = name + "=";
        if(document.cookie.length>0){
            offset = document.cookie.indexOf(search);
            if (offset != -1){
                offset += search.length;
                end = document.cookie.indexOf(";", offset);
                if (end == -1) end = document.cookie.length;
                cookieValue = unescape(document.cookie.substring(offset, end))
            }
        }
        return cookieValue;
    }
    function ajaxLogin(str){
        $.ajax({
            type: "POST",
            url: "http://mc18.eatdou.com/login.php",
            data: str,
            success: function(msg){
                if(msg!="false"){
                    document.cookie = "username="+msg;
                    $("#filter>div>p").html("欢迎你，"+msg+"！<a href='javascript:void(0)' class='signOut'>Sign Out</a>");
                    username=msg;
                    closeLogin();
                }else{
                    $("#login_err").text("登录失败，请核对帐号后重新登录。");
                    document.cookie = "username=";
                }
            },
            error:function(){
                $("#filter>div>p").html("查看更多案例？<a href='javascript:void(0)' class='signIn'>Sign In</a>");
            }
        });
    }

    //Filter End
    //Cases Start
    $("#caseslist>.cases>li").live({mouseenter:function(){
        $("p",this).stop(false,true).slideDown("normal","easeOutQuad");
    },mouseleave:function(){
        $("p",this).stop(false,true).slideUp("normal","easeOutQuad");
    }});
    $("#caseslist>.cases>li>img").lazyload({effect:"fadeIn",failurelimit:10});
    $("#loadmore>a").click(function(){
        if($("#loadmore>a").text()=="没有更多案例了..."){
            return false;
        }
        $("#loading").slideDown("normal","easeOutQuad");
        $.get(ajaxUrl+(pagecur+1)+"..html", function(data){
            $("#loading").slideUp("normal","easeOutQuad",function(){
                if(data==0){
                    $("#loadmore>a").text("没有更多案例了...");
                    return false;
                }
                $("#caseslist>.cases").append(data);
                $("#caseslist>.cases>li>img").lazyload({effect:"fadeIn",failurelimit:10});
            });
            pagecur++;
        });
    })
    //Cases End
    $("#gotop").click(function(){$('body,html').animate({scrollTop:0},500);})

    //]]>
</script>
</body>
</html>