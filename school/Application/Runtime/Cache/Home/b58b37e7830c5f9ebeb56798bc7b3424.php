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




<section id="caseslist">
    <div class="cat_title">
        <div class="wrapper">
            <h2><strong><?php echo ($user_name); ?></strong>的物品</h2>
            <p>丢失的物品<br/>
                lost and found ... </p>
                <?php if($data==session('username')){ echo "<a href='/school1/index.php/Home/Lost/add'>添加物品</a>"; }?>
            
        </div>
    </div>

    <ul class="cases wrapper">

        <?php foreach($list as $key => $value){?>

        <input type="hidden" name='id' value="{:$_GET['id']}" />



        <li class="item1"> <img src="/school1/Public/<?php echo ($value["lost_img"]); ?>" tppabs=""  width="240" height="152" alt="<?php echo ($value["lost_name"]); ?>" /> <strong></strong>
            <?php echo ($value["lost_name"]); ?>
            <p> <strong><?php echo ($value["lost_name"]); ?> </strong> <em>QQ：<?php echo ($value["lost_qq"]); ?><br/>
                时间:<?php echo ($value["lost_time"]); ?></em><?php echo ($value["lost_detail"]); ?><br/>
                <a href="/school1/index.php/Home/Lost/lostdetail?id=<?php echo ($value["lost_id"]); ?>" tppabs="" class="btn_blue">查看物品详情</a> </p>
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


<script type="text/javascript">
    //<![CDATA[
    //Nav Start
    $("header>div>nav>ul>li>a").hover(function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"6px",opacity:"0.7"},{duration:"normal", easing: "easeOutElastic"});
    },function(){
        $(this).parent().stop(false,true).animate({"background-position-x":"10px",opacity:"1"},{duration:"normal", easing: "easeOutElastic"});
    });

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