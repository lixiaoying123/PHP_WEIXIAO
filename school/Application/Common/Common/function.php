<?php
/**
 * Created by PhpStorm.
 * User: sjm
 * Date: 2016/11/8
 * Time: 8:37
 */
/**
 * 获取验证码函数
 */
function getVerify(){

    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '../../../Home/Controller/cookie/'.$_SESSION['id'].'.txt'; //cookie路径
    header("Content-type: text/html; charset=utf-8");
    $url='http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/default2.aspx';  //登陆页面
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');
    $result=curl_exec($ch);
    curl_close($ch);
    preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$result,$viewstate);

    $verify_code_url = 'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx'; //验证码地址
    $curl = curl_init();

// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($curl, CURLOPT_REFERER,'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx');
    curl_setopt($curl, CURLOPT_URL, $verify_code_url);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie); //读取cookies
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $img = curl_exec($curl);
    curl_close($curl);
    $fp = fopen("Public/verifyCode.jpg", "w");  //文件名
    fwrite($fp,$img);  //写入文件
    fclose($fp);

}
function getVerify_cj(){

    $id=session_id();
    $_SESSION['id']=$id;
    $cookie = dirname(__FILE__) . '../../../Home/Controller/cj_cookie/'.$_SESSION['id'].'.txt'; //cookie路径
    header("Content-type: text/html; charset=utf-8");
    $url='http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/default2.aspx';  //登陆页面
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');
    $result=curl_exec($ch);
    curl_close($ch);
    preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$result,$viewstate);

    $verify_code_url = 'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx'; //验证码地址
    $curl = curl_init();

// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($curl, CURLOPT_REFERER,'http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/CheckCode.aspx');
    curl_setopt($curl, CURLOPT_URL, $verify_code_url);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie); //读取cookies
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $img = curl_exec($curl);
    curl_close($curl);
    $fp = fopen("Public/verifyCode2.jpg", "w");  //文件名
    fwrite($fp,$img);  //写入文件
    fclose($fp);

}