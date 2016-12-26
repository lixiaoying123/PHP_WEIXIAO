<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN","weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
//$wechatObj->valid();

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);

                switch($RX_TYPE)
                {
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                        case "image":
                        $resultStr = $this->handleImg($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";             
       if(!empty( $keyword ))//如果用户端微信发来的文本内容不为空，执行46--51否则52--53  
                {  
                    $msgType = "text";//回复文本信息类型为text型，变量类型为msgType  
                    switch ($keyword) {
                        case '四六级':
                            $contentStr="<a href='http://lc1252.cn/wechat/cet/login.html'>四六级成绩查询</a>";
                            break;
                        case '教师资格证':
                            $contentStr="<a href='http://lc1252.cn/wechat/teacher/login.php'>教师资格证成绩查询</a>";
                            break;
                            case '会计资格证':
                            $contentStr="<a href='http://lc1252.cn/wechat/suan/login.php'>会计从业资格证成绩查询</a>";
                            break;
                            case '普通话':
                            $contentStr="<a href='http://lc1252.cn/wechat/pth/login.html'>普通话成绩查询</a>";
                            break;
                            case '计算机二级':
                            $contentStr="<a href='http://lc1252.cn/wechat/computer/login.php'>计算机二级成绩查询</a>";
                            break;
                            case '成绩':
                            $contentStr="<a href='http://lc1252.cn/wechat/grade/login.php'>教务系统成绩查询</a>";
                            break;
                            case '课表':
                            $contentStr="<a href='http://lc1252.cn/wechat/table/login.php'>教务系统课表查询</a>";
                            break;
                        default:
                            $contentStr="输入对应的考试名称即可查询成绩";
                            break;
                    }
                    //我们进行文本输入的内容，变量名为contentStr，如果你要更改回复信息，就在这儿  
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);//将XML格式中的变量分别赋值。注意sprintf函数  
                    echo $resultStr;//输出回复信息，即发送微信  
        }else{
            echo "Input something...";
        }
    }

    public function handleEvent($object)
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "感谢您关注【简易查】"."\n"."微信号：smarty_school"."\n"."目前平台功能如下："."\n"."【1】 查四六级成绩，输入：四六级"."\n"."【2】 查教务系统课表，输入：课表"."\n"."【3】 查教务系统成绩，输入：成绩"."\n"."【4】 查教师资格证成绩，输入：教师资格证"."\n"."【5】 查会计资格证成绩，输入：会计资格证"."\n"."【6】 查计算机二级成绩，输入：计算机二级"."\n"."更多内容，敬请期待...";
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function handleImg($object)
    {
        
                $contentStr = "收到你的图片啦!";
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>