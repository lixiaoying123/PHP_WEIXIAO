<?php
session_start();
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type: text/html; charset=utf-8"); 
ini_set('display_errors', true);
 
   $xh=$_POST['xh'];
   $pw=$_POST['pw'];
   $code=$_POST['code'];
   //$year=$_POST['ddlXN'];
   //$term=$_POST['ddlXQ'];
   $cookie = dirname(__FILE__) . '/cookie/'.$_SESSION['id'].'.txt';//设置cookies路径    
   $cookiecontent=file_get_contents($cookie);
   $url='http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/default2.aspx';  //登陆页面  
   $result=httprequest($url,'',$cookie );//获取viewstate

if(preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$result,$viewstate)){

    $post_data['__VIEWSTATE']=$viewstate[1];
    $post_data['txtUserName']=$xh; 
    $post_data['TextBox2']=$pw;
    $post_data['txtSecretCode']=$code;
    $post_data['RadioButtonList1']=''; 
    $post_data['button1']=''; 
    $post_data['lbLanguage']='';
    $post_data['hidsc']='';
    $post_data['hidPdrs']='';//构造登陆post数据包
    $result=httprequest($url,$post_data,$cookie );
    $result=iconv('GB2312', 'UTF-8//IGNORE', $result);
//echo $viewstate;
    //获取姓名
     $pat="/<span id=\"xhxm\">(.*?)<\/span>/ism";
     preg_match_all($pat, $result, $name);
     $ming=str_replace("同学",'',$name[1][0]);
     $xm=iconv('GB2312', 'UTF-8//IGNORE', $ming);
     $referer="http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/default2.aspx?xh=".$xh;
    //获取课表
    //1.组织url
     $mm=iconv("UTF-8","GB2312//IGNORE",$ming);
    $cj_name=urlencode($mm);
    $kb_url="http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/xskbcx.aspx?xh=".$xh."&xm=".$cj_name."&gnmkdm=N121603";
    //echo $kb_url;
    //获取viewstate
    $vs2=cx($kb_url,'',$cookie,$referer);
    preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$vs2,$viewstate2);
    //2.获取结果并匹配
    print_r(iconv("GB2312","UTF-8//IGNORE",$vs2));
    //var_dump($viewstate2);
    /*$post1['__VIEWSTATE']=$viewstate2[1];
    $table_result=iconv('GB2312','UTF-8//IGNORE',cx($kb_url,$post1,$cookie,$referer));
    preg_match_all('/<table id=\"Table1\".*?>(.*?)<\/table>/ism',$table_result,$table);
    var_dump($table_result);
    print_r($table);*/
    //获取成绩
    //1.组织url
    /*$mm=iconv("UTF-8","GB2312//IGNORE",$ming);
    $cj_name=urlencode($mm);
    $cj_url="http://jwgl.hebtu.edu.cn/(3tf1he55ma2epkympyzp3155)/xscjcx.aspx?xh=".$xh."&xm=".$cj_name."&gnmkdm=N121605";
    //2.获取viewstate
    $vs=cx($cj_url,'',$cookie,$referer);
    preg_match("/name=\"__VIEWSTATE\" value=\"(.*?)\"/",$vs,$viewstate2);
    //3.传送数据
    $post['btn_xq']=iconv('GB2312','UTF-8//IGNORE',"学期成绩");
    $post['__VIEWSTATE']=$viewstate2[1];
    $post['ddlXN']=$year;
    $post['ddlXQ']=$term;
    $post['ddl_kcxz']='';
    $cj_result=cx($cj_url,$post,$cookie,$referer);
    $cj_result=iconv('GB2312','UTF-8//IGNORE',$cj_result);
    $cj_1=preg_replace('/<p class=\"search_con\".*?>(.*?)<\/p>/ism','', $cj_result);
    $cj_2=preg_replace( '/<table class=\"formlist\".*?>(.*?)<\/table>/ism','',$cj_1);
    print_r($cj_2);*/
    
    }else{
    echo 'error';
    }
    function httprequest($url,$post='',$cookie){
  
  $ch = curl_init(); 
     if ($post!='')
  { curl_setopt($ch, CURLOPT_POST, 1); 
   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);  //post数据包
  } 
  
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);  //保存cookies
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookies
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_URL,$url);  
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2;');  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0); 
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );     
    $result=curl_exec($ch);
    curl_close($ch);  
    return $result;
}
function cx($url,$post,$cookie,$referer){
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie);
    curl_setopt($ch,CURLOPT_REFERER,$referer);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    if($post){
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);}
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}
  