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
<form class="form-inline definewidth m20" action="/school1/index.php/admin/user/userjinyan.html" method="get">
    <font color="#777777"><strong>用户名称：</strong></font>
    <input type="text" name="username" class="abc input-default">&nbsp;&nbsp;
    <a href="/school1/index.php/Admin/user/frontlist"><button type="submit" class="btn btn-primary">查询</button></a>
    </form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户昵称</th>
        <th>Email</th>
        <th>用户学院</th>
        <th>状态</th>
        <th>管理用户</th>

    </tr>
    </thead>
    <?php foreach($list as $key => $value){ if($value[count]==1){ $value[count]='被禁言'; }else{ $value[count]='';} ?>
    <tr>
        <td><a href="/school1/index.php/Admin/user/frontdetail/user_id/<?php echo ($value["user_id"]); ?>"><?php echo ($value["username"]); ?></a></td>
        <td><?php echo ($value["useremail"]); ?></td>
        <td><?php echo ($value["userclass"]); ?></td>
        <td style="color: #8B0000"><?php echo ($value[count]); ?></td>
       <td><a href="/school1/index.php/Admin/user/jiejin/user_id/<?php echo ($value["user_id"]); ?>"><button type="submit">解除禁言</button></a></td>
    </tr>
    <?php } ?>

</table>
<div class="dede_pages">
    <ul class="pagelist">
        <span class="pageinfo"><strong><?php echo ($pagelist); ?></strong></span>
    </ul>
</div>

</body>
</html>