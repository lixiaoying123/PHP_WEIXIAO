<?php
 session_start();
    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt'; //cookie路径 
   header("Content-type: text/html; charset=utf-8"); 
   $url='http://chaxun.neea.edu.cn/examcenter/query.cn?op=doQueryCond&sid=300&pram=results';  //登陆页面  
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_REFERER, 'http://sk.neea.edu.cn/jsjdj/index.jsp');
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');  
   $result=curl_exec($ch);
   curl_close($ch);
    $verify_code_url = 'http://chaxun.neea.edu.cn/examcenter/myimage.jsp'; //验证码地址
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
             <div class="mui-content mui-scroll-wrapper" style="background-image: url(../images/back5.jpg);width: 100%; length:100%">
                  <div class="mui-scroll" >               
                       <img class="logo" src="../images/logo.png"/>             
                     <div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;width: 90%; margin: 1% auto 3% auto">
                     <form method="post" action="post.php">

<label style="font-size:14px;">考试时间</label>
<select name="ksnf" style="background-color: grey;"><option value="4483">2016年09月</option>
<option value="4223">2016年03月</option>
<option value="4069">2015年12月</option>
<option value="3902">2015年 9月</option>
<option value="3722">2015年 3月</option>
<option value="3502">2014年12月</option>
<option value="3463">2014年 9月</option>
<option value="3202">2014年 3月</option>
<option value="2862">2013年9月</option>
<option value="2622">2013年3月</option>
<option value="2402">2012年9月</option>
<option value="2240">2012年3月</option>
<option value="2080">2011年9月</option>
<option value="1821">2011年3月</option>
<option value="1680">2010年9月</option>
<option value="1480">2010年3月</option>
<option value="1202">2009年9月</option>
<option value="1020">2009年3月</option>
<option value="620">2008年9月</option>
<option value="520">2008年4月</option>
<option value="480">2007年9月</option>
<option value="560">2007年4月</option>
<option value="660">2006年9月</option>
<option value="1342">2006年4月</option>
<option value="1341">2005年9月</option>
<option value="1340">2005年4月</option>
<option value="1360">2004年9月</option>
<option value="1361">2004年4月</option>
<option value="1362">2003年9月</option>
<option value="1363">2003年4月</option>
<option value="1520">2002年9月</option>
<option value="1521">2002年4月</option>
<option value="1522">2001年9月</option>
<option value="1523">2001年4月</option>
<option value="1545">2000年9月</option>
<option value="1544">2000年4月</option>
<option value="1524">1999年9月</option>
<option value="1525">1999年4月</option>
<option value="1526">1998年9月</option>
<option value="1527">1998年4月</option>
<option value="1528">1997年9月</option>
<option value="1529">1997年4月</option>
<option value="1530">1996年9月</option>
<option value="1531">1996年4月</option>
<option value="1532">1995年</option>
<option value="1533">1994年</option></select>
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 3% auto">
<label style="font-size:14px;">报考省份</label>
<select name="sf" style="background-color: grey;">
<option value="11">11-北京</option>
<option value="12">12-天津</option>
<option value="13">13-河北</option>
<option value="14">14-山西</option>
<option value="15">15-内蒙古</option>
<option value="21">21-辽宁</option>
<option value="22">22-吉林</option>
<option value="23">23-黑龙江</option>
<option value="31">31-上海</option>
<option value="32">32-江苏</option>
<option value="33">33-浙江</option>
<option value="34">34-安徽</option>
<option value="35">35-福建</option>
<option value="36">36-江西</option>
<option value="37">37-山东</option>
<option value="41">41-河南</option>
<option value="42">42-湖北</option>
<option value="43">43-湖南</option>
<option value="44">44-广东</option>
<option value="45">45-广西</option>
<option value="46">46-海南</option>
<option value="50">50-重庆</option>
<option value="51">51-四川</option>
<option value="52">52-贵州</option>
<option value="53">53-云南</option>
<option value="54">54-西藏</option>
<option value="61">61-陕西</option>
<option value="62">62-甘肃</option>
<option value="63">63-青海</option>
<option value="64">64-宁夏</option>
<option value="65">65-新疆</option>
<option value="81">81-总参</option>
<option value="82">82-北京军区</option>
<option value="83">83-兰州军区</option>
<option value="84">84-部队院校局</option></select>
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 3% auto">
<label style="font-size:14px;">
报考级别</label>
<select name="bkjb" style="background-color: grey;"><option value="10">10一级(DOS)(1994-2002上)</option>
<option value="11">11一级B(DOS)(1996上-2002上)</option>
<option value="12">12一级(1999上-2005上)</option>
<option value="13">13一级B(2000上-2013上)</option>
<option value="14">14一级计算机基础及WPS Office应用(原WPS Office)(2004上至今)</option>
<option value="15">15一级计算机基础及MS Office应用(原MS Office)(2004下至今)</option>
<option value="16">16一级计算机基础及Photoshop应用(2013下至今)</option>
<option value="20">20二级(1994)</option>
<option value="21">21二级QBASIC(1995-2005上)</option>
<option value="22">22二级FORTRAN(1995-2003下)</option>
<option value="23">23二级PASCAL(1995-2002上)</option>
<option value="24">24二级C语言程序设计(原二级C)(1995至今)</option>
<option value="25">25二级FOXBASE+(1995-2005上)</option>
<option value="26">26二级VB语言程序设计(原VISUAL BASIC)(2002上至今)</option>
<option value="27">27二级VFP数据库程序设计(原VISUAL FOXPRO)(2002上至今)</option>
<option value="28">28二级JAVA语言程序设计(原二级JAVA)(2004下至今)</option>
<option value="29">29二级ACCESS数据库程序设计(原二级ACCESS)(2004下至今)</option>
<option value="61">61二级C++语言程序设计(原二级C++)(2004下至今)</option>
<option value="62">62二级Delphi(2008上-2013上)</option>
<option value="63">63二级MySQL数据程序设计(2013下至今)</option>
<option value="64">64二级Web程序设计(2013下至今)</option>
<option value="65">65二级MS Office高级应用(2013下至今)</option>
<option value="30">30三级(1994)</option>
<option value="31">31三级A(1995-2002上)</option>
<option value="32">32三级B(1995-2002上)</option>
<option value="33">33三级PC技术(2002下-2013下)</option>
<option value="34">34三级信息管理技术(2002下-2013下)</option>
<option value="35">35三级网络技术(2002下至今)</option>
<option value="36">36三级数据库技术(2002下至今)</option>
<option value="37">37三级软件测试技术(2013下至今)</option>
<option value="38">38三级信息安全技术(2013下至今)</option>
<option value="39">39三级嵌入式系统开发技术(2013下至今)</option>
<option value="40">40四级(1995-2008下)</option>
<option value="41">41四级网络工程师(2008上至今)</option>
<option value="42">42四级数据库工程师(2008上至今)</option>
<option value="43">43四级软件测试工程师(2008上至今)</option>
<option value="44">44四级信息安全工程师(2013下至今)</option>
<option value="45">45四级嵌入式系统开发工程师(2013下至今)</option></select>
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 1% auto">
<label style="font-size:14px;">准考证</label>
<input type="text" name="zkzh" class="mui-input-password"> 
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 1% auto">
<label style="font-size:14px;">姓&nbsp&nbsp名：</label>
<input type="text" name="name" class="mui-input-password">
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 1% auto">
<label style="font-size:14px;">证件号</label>
<input type="text" name="sfzh" class="mui-input-password">
</div>
<div class="mui-input-row" style="border-bottom: 1px solid white;opacity:0.5;color: white;
width:90%;margin: 1% auto 1% auto">
<label style="font-size:14px;">验证码</label><input type="text" name="rand" >
<img src="verifyCode.jpg"/>
</div>
<div class="mui-input-row">
<input type="submit" name="查询" value="查询" class="mui-btn mui-btn-blue" style="width: 80%; margin:0  10% 2% 10%;background-color:#eb6c85;border:none">
</div>
</form>
</div>
</div>
</body>
</html>