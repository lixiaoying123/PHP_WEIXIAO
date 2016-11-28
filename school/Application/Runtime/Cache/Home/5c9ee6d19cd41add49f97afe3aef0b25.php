<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="YONGDA v1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Keywords" content="" />
        <meta name="Description" content="" />

        <title>用户中心_YONGDA商城 - Powered by YongDa</title>

        <link href="/school1/Public/Home/css/registerstyle.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
       
        <div class="block block1">
            <div class="block box">
                <div class="blank"></div>
                <div id="ur_here">
                    当前位置: <a href="">首页</a> <code>&gt;</code> 用户中心
                </div>
            </div>
            <div class="blank"></div>

            <div class="block box">

            <div class="usBox clearfix">
                <div class="usBox_1 f_l">
                    <div class="logtitle"></div>
                    <form name="formLogin" action="/school1/index.php/Home/user/login.html" method="post">
                        <table align="left" border="0" cellpadding="3" cellspacing="5" width="100%">
                            <tbody><tr>
                                    <td align="right" width="15%">用户名</td>
                                    <td width="85%"><input name="username" size="25" class="inputBg" type="text" /></td>
                                </tr>
                                <tr>
                                    <td align="right">密码</td>
                                    <td>
                                        <input name="password" size="25" class="inputBg" type="password" />
                                    </td>
                                </tr>
                            <tr>
                                <td align="right">验证码</td>

                                <td>
                                    <input name="yanzhengma" size="10" class="inputBg" type="text" />
                                    <img src="/school/Home/User/VerifyImg" alt="" onClick="this.src=this.src+'?'+Math.random()"/>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp点击图片刷新验证码
                                </td>
                            </tr>
                                <tr>
                                    <td colspan="2"><input value="1" name="remember" id="remember" type="checkbox" />
                                        <label for="remember">请保存我这次的登录信息。</label></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <input name="act" value="act_login" type="hidden" />
                                        <input name="back_act" value="./index.php" type="hidden" />
                                        <input name="submit" value="" class="us_Submit" type="submit" />

                                        <input name="submit" value="" class="qqlogin" type="submit" />
                                    </td>
                                </tr>

                            </tbody></table>
                    </form>
                    <div class="blank"></div>
                </div>
                <div class="usTxt">
                    <div class="regtitle"></div>
                    <div style="padding-left: 50px;">
                        <strong>如果您不是会员，请注册</strong>  <br />
                        <strong class="f4">友情提示：</strong><br />
                        不注册为会员也可浏览本网站<br />
                        但注册之后您可以：<br />
                        1. 收藏您关注的商品<br />
                        2. 购买您关注的商品<br />
                        3. 查询您的成绩    <br />
                        4. 查询您的课表    <br />
                        <a href="/school/Home/User/register"><img src="/school1/Public/Home/images/bnt_ur_reg.gif"></a>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <div class="blank"></div>
            

            <div class="blank"></div>


            <div id="bottomNav" class="box block">
                <div class="bNavList clearfix">
                    <a href="#">Powered&nbsp;by&nbsp;<strong><span style="color: rgb(51, 102, 255);">YongDa</span></strong></a>
                    |
                    <a href="#">隐私保护</a>
                    |
                    <a href="#">咨询热点</a>
                    |
                    <a href="#">联系我们</a>
                    |
                    <a href="#">公司简介</a>
                    |
                    <a href="#">批发方案</a>
                    |
                    <a href="#">配送方式</a>

                </div>
            </div>
        </div>


        <div id="footer">
            <div class="text">
                © 2005-2012 YONGDA 版权所有，并保留所有权利。<br />
            </div>
        </div>
    </body>
</html>