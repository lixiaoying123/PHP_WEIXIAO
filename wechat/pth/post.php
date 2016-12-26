<?php
function curl_request($url,$post=''){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko');
    curl_setopt($curl, CURLOPT_COOKIEJAR,"cookie_file");
    curl_setopt($curl, CURLOPT_COOKIEFILE,"cookie_file");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_REFERER, "http://hb.cltt.org/Web/Login/PSCP01001.aspx");
    if($post) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    }
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $data = curl_exec($curl);
     var_dump(curl_error($curl));
    curl_close($curl);

    return $data; 
}
$post['txtname']=$_POST['name'];
$post['stuID']='';
$post['txtidCard']=$_POST['idCard'];
$url="http://hb.cltt.org/Web/Login/PSCP01001.aspx";
$result=curl_request($url,$post);
print_r($result);