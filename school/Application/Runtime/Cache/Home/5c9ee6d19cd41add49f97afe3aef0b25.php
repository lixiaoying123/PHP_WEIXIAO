<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0064)http://www.17sucai.com/preview/137615/2015-01-15/demo/index.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" http-equiv="X-UA-Compatible">
 
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<TITLE>登录页面</TITLE> 
<SCRIPT src="/school1/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="/school1/Public/Home/css/login.css">
<script type="text/javascript" src="/school1/Public/Home/js/jquery.js"></script>
     
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#userpassword").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#userpassword").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
});
</SCRIPT>
 
<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 
<BODY>
<DIV class="top_div"></DIV>
<DIV style="background: rgb(255, 255, 255); margin: -100px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 600px; height: 250px; text-align: center;">
<DIV style="width: 165px; height: 96px; position: absolute;">
<DIV class="tou"></DIV>
<DIV class="initial_left_hand" id="left_hand"></DIV>
<DIV class="initial_right_hand" id="right_hand"></DIV></DIV>
<form name="formLogin" action="/school1/index.php/Home/user/login.html" method="post">
<P style="padding: 30px 0px 10px; position: relative;"><span class="u_logo"></span>
         <INPUT class="ipt" type="text"   placeholder="请输入用户名" name='username' id='username' value=""> <label></label>
    </P>
<P style="position: relative;">
<SPAN class="p_logo"></SPAN>         
<INPUT class="ipt"  name='userpassword'  id="userpassword" type="password" placeholder="请输入密码" value="">  <label></label> 
  </P>
  <P style="position: relative;"><SPAN class="p_logo"></SPAN>         
<INPUT class="ipt"  name='yanzhengma' style="width: 120px;" type="text" placeholder="验证码" value="" > <img src="/school1/index.php/Home/User/VerifyImg" alt="" onClick="this.src=this.src+'?'+Math.random()"/>
                                    点击刷新  
  </P>

<DIV style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
<P style="margin: 0px 35px 20px 45px;"><SPAN style="float: left;"><A style="color: blue;" 
href="/school1/index.php/Home/index/index">回到首页</A></SPAN> 

           <SPAN style="float: right;"><A style="color:blue; margin-right: 10px;" 
href="/school1/index.php/Home/User/register">注册</A>  

              <input type='submit' value="登录" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" 
> 

</form>
           </SPAN>         </P></DIV></DIV>
		   <div style="text-align:center;">

</div></BODY>
<script type="text/javascript">
    $(document).ready(function() {
        $("#username").blur(function () {
            var username = $("#username").val();
            var span = $("#username").parent().children("label");
            if(username==""){
                span.css('color', 'red');
                span.text('用户名不能为空');
            }else{
                span.text('');
            }
        });

        $("#userpassword").blur(function () {
            var userpassword = $("#userpassword").val();
            var span = $("#userpassword").parent().children("label");
            if(userpassword==""){
                span.css('color', 'red');
                span.text('密码不能为空');
            }else{
                span.text('');
            }
        });
    })

</script>
</HTML>