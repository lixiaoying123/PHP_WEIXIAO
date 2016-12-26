<?php
 session_start();
    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt'; //cookie路径 
   header("Content-type: text/html; charset=utf-8"); 
   $url='http://chafen.ntce.cn/';  //登陆页面  
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_REFERER, 'http://www.ntce.cn/');
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');  
   $result=curl_exec($ch);
   curl_close($ch);
    $verify_code_url = 'http://chafen.ntce.cn/getYZM'; //验证码地址
     $curl = curl_init();
    
   // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($curl, CURLOPT_REFERER,'http://chafen.ntce.cn/getYZM');
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
             <div class="mui-content mui-scroll-wrapper" style="background-image: url(../images/83.jpg);width: 100%; length:100%">
                  <div class="mui-scroll" >               
                       <img class="logo" src="../images/logo.png"/>             
                     <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;width: 80%; margin: 10% auto 3% auto">
                     <form method="post" action="post.php">
    <label style="font-size:14px;">姓&nbsp&nbsp名:</label>
    <input type="text" name="name" class="mui-input-clear" >
    </div>
             <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;width: 80%; margin: 1% auto 10% auto">
             <label style="font-size:14px;">证件号:</label>
             <input type="text" name="zjh" class="mui-input-password">
             </div>
             <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:80%;margin: 1% auto 10% auto">
    <label style="font-size:14px;">验证码：</label>
    <input type="text" name="yzm"><img src="verifyCode.jpg">
   </div>
    <div class="mui-input-row">
    <input type="submit" name="button" id="button" value="查　询" class="mui-btn mui-btn-blue" style="width: 80%; margin:0  10% 2% 10%;background-color:#eb6c85;border:none"/>
</form>
</div>
</div>
</body>

</script></html>