
<?php
session_start();
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type: text/html; charset=utf-8"); 
ini_set('display_errors', true);

   $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt';//设置cookies路径    
   $url='http://chafen.ntce.cn/selectScore.do?method=getMyScore ';  //登陆页面     
    $post_data['name']=$_POST['name'];
    $post_data['zjhm']=$_POST['zjh']; 
    $post_data['yzm']=$_POST['yzm'];
     $result=curl_request($url,$post_data,$cookie);
     print_r($result);
   function curl_request($url,$post='',$cookie){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko');
    curl_setopt($curl, CURLOPT_COOKIEFILE,$cookie);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_REFERER, "http://chafen.ntce.cn/");
    if($post) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    }
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data; 
}