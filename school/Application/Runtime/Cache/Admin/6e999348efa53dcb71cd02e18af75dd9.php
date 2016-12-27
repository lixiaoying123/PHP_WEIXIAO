<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/style.css" />
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery2.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/common.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquerypicture.js"></script>

    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
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
<body>
<form action="#" method="post" class="definewidth m20" enctype="multipart/form-data">
    <table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">

        <tr>
            <td width="10%" class="tableleft">用户名：</td>
            <td><?php echo ($username); ?></td>
        </tr>
        <input type="hidden" name="user_name" value="<?php echo ($username); ?>"/>
        <tr>
            <td class="tableleft">题目</td>
            <td><input type="text" name="msg_title"/></td>
        <tr>

        <tr>
            <td class="tableleft">内容</td>
            <td><textarea rows="3" cols="30" name="msg_content"></textarea></td>
        </tr>
        <?php
 $msg_time = strtotime(date('Y-m-d,H:i:s',time()));?>
        <input type="hidden" name='msg_time' value=<?php echo ($msg_time); ?> />
        <input type="hidden" name='admin_name' value='<?php echo ($data); ?>' />
        <tr>
            <td class="tableleft"></td>
            <td>
                <button style="margin-left:5px;"type="submit" class="btn btn-primary" type="button"  >发送</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid" onclick="window.location.replace('/school1/index.php/Admin/user/frontlist')">返回列表</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>