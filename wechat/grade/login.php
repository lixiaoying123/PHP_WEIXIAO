<?php
    session_start();
    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '__PUBLIC__/Home/cookie/'.$_SESSION['id'].'.txt'; //cookie路径
    header("Content-type: text/html; charset=utf-8");
    $url='http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/default2.aspx';  //登陆页面
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');
    $result=curl_exec($ch);
    //echo file_get_contents($cookie);
    curl_close($ch);
    // var_dump($result);
    preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$result,$viewstate);
    //var_dump($viewstate);



    $verify_code_url = 'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx'; //验证码地址
    $curl = curl_init();

    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($curl, CURLOPT_REFERER,'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx');
    curl_setopt($curl, CURLOPT_URL, $verify_code_url);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie); //读取cookies
    //echo file_get_contents($cookie);
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
               <div class="mui-content mui-scroll-wrapper" style="background-image: url(../images/back3.png);width: 100%; length:100%">
                    <div class="mui-scroll" >                 
                         <img class="logo" src="../images/logo.png"/>              
                         
                         <form method="post" action="post.php">
                         <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: black;width: 80%; margin: 1% auto 10% auto">
                         <label style="font-size:14px;">学年：</label>
                         <select name="ddlXN" style="background-color: grey;">
                        <option value="2013-2014">2013-2014</option>
                        <option value="2014-2015">2014-2015</option>
                        <option value="2015-2016">2015-2016</option>
                        <option value="2016-2017">2016-2017</option>
                    </select>

                        <label style="font-size:14px;">学期：</label>
                        <select name="ddlXQ" style="background-color: grey;">
                        
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select></div>
                    <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: black;width: 80%; margin: 10% auto 3% auto">
                    <label style="font-size:14px;">学&nbsp号</label>
                    <input name="xh"  type="text" class="mui-input-clear"/>
                       </div>
                       <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: black;width: 80%; margin: 1% auto 10% auto">
                                <label style="font-size:14px;">
                            密&nbsp码</label>
                            <input name="pw"  type="password" class="mui-input-clear" />

                      </div>
                      <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: black;width: 80%; margin: 1% auto 10% auto">
                                <label style="font-size:14px;">
                            验证码</label>
                            <input name="code"  type="text" class="mui-input-clear" />
                            <img src="./verifyCode.jpg">
                            <input type="hidden" name="view" value=$viewstate>
                        </div>
                       <div class="mui-input-row">
                             
                            <input type="submit" name="" value="查询" style="width: 80%; margin:0  10% 2% 10%;background-color:#eb6c85;border:none"/>

                    </div>
</form>
</div>
</div>
</body>
</html>