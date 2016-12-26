<?php

function curl_request($url,$post=''){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko');
    curl_setopt($curl, CURLOPT_COOKIEJAR,"cookie_file");
    curl_setopt($curl, CURLOPT_COOKIEFILE,"cookie_file");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_REFERER, "http://www.chsi.com.cn");
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

$post['zkzh']=$_POST['zkzh'];
$post['xm']=urlencode($_POST['xm']);
$url='http://www.chsi.com.cn/cet/query?zkzh='.$post['zkzh'].'&xm='.$post['xm'];
$result=curl_request($url,$post);
$pat1="/<div class=\"m_l\" .*?>.*?<\/div>/ism";
preg_match_all($pat1,$result,$cet);

$cet='<html><head><meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />   <link rel="stylesheet" type="text/css" href="base.css"><link rel="stylesheet" type="text/css" href="common2014.css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>'.$cet[0][0].'</body></html>';
print_r($cet);
?>