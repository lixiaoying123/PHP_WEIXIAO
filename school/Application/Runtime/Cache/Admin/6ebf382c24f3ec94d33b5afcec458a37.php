<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/style.css" />
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/common.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/js/showdate.js"></script>
    <style type="text/css">
        body {font-size: 20px;
             padding-bottom: 40px;
             background-color:#e9e7ef;
             font-size:17px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<form action="#" method="post">
<table class="table table-bordered table-hover definewidth m10" style="margin-left:3%;margin-top:2%;">
    <tr>
        <td width="10%" class="tableleft">新闻标题</td>
        <td><p><?php echo $info[0][news_title];?></p></td>
     
    </tr>
    <tr>
        <td class="tableleft">发布时间</td>
        <td><?php echo date('Y-m-d',$info[0][news_time]);?>
        </td>
    </tr>
    <tr>
        <td class="tableleft">内容</td>
        <td><?php echo $info[0][news_content];?></td>
    </tr> 

</table>
</form>
</body>
</html>
<script>
function jump(){
 window.location.href="placardQuery.html";
}
</script>