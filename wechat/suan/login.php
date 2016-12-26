<?php
 session_start();
    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt'; //cookie路径 
   header("Content-type: text/html; charset=utf-8"); 
   $url='http://kjry.hebcz.gov.cn:7005/acms/sacc/UserAction.do?method=loginIndex';  //登陆页面  
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_REFERER, 'http://www.hebcz.gov.cn/');
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');  
   $result=curl_exec($ch);
   curl_close($ch);
    $verify_code_url = 'http://kjry.hebcz.gov.cn:7005/acms/common/images/authimage.gif'; //验证码地址
     $curl = curl_init();
    
   // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($curl, CURLOPT_REFERER,'http://kjry.hebcz.gov.cn:7005/acms/common/images/authimage.gif');
    curl_setopt($curl, CURLOPT_URL, $verify_code_url);
     curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie); //读取cookies
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $img = curl_exec($curl);
    curl_close($curl);
     $fp = fopen("verifyCode.jpg","w");  //文件名
    fwrite($fp,$img);  //写入文件 
    fclose($fp);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />   
    <title></title>
    <script src="../js/mui.min.js"></script>
    <link href="../css/mui.css" rel="stylesheet"/>
    
    
</head>
<body>
  <!-- 主界面菜单同时移动 -->
      <!-- 侧滑导航根容器 -->
      
          <!--<div class="mui-inner-wrap">-->
             <div class="mui-content mui-scroll-wrapper" style="background-image: url(../images/back2.jpeg);width: 100%; length:100%">
                  <div class="mui-scroll" >               
                       <img class="logo" src="../images/logo.png"/>             
                     <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;width: 80%; margin: 10% auto 3% auto">
<form action="post.php" method="post">
    
    <label style="font-size:14px;">证件号:</label>
    <input type="text" name="cardID">
    </div>
    <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;width: 80%; margin: 10% auto 10% auto">
    <label style="font-size:14px;">批次名称：</label>
    <select id="planName" name="planName" style="background-color: grey;">
             <option value="">请选择....</option>
             
                <option value="河北省2015年度第四季度会计从业资格考试">河北省2015年度第四季度会计从业资格考试</option>
             
                <option value="河北省2016年度第二季度会计从业资格考试">河北省2016年度第二季度会计从业资格考试</option>
             
                <option value="河北省2016年度第三季度会计从业资格考试">河北省2016年度第三季度会计从业资格考试</option>
             
                <option value="河北省2016年度第一季度会计从业资格考试">河北省2016年度第一季度会计从业资格考试</option>
             
          </select>
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:80%;margin: 1% auto 10% auto">
    <label style="font-size:14px;">验证码：</label>
    <input type="text" name="rand" >
    <div><img src="verifyCode.jpg"></div>
    </div>
    <div class="mui-input-row">
    <input type="submit" name="button" id="button" value="查　询" class="mui-btn mui-btn-blue" style="width: 80%; margin:0  10% 2% 10%;background-color:#eb6c85;border:none"/></div>
</form>

</div></div></body></html>