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
<form class="form-inline definewidth m20" action="/school1/index.php/Admin/user/afterlist" method="get">
      <font color="#777777"><strong>管理员名称：</strong></font>
    <input type="text" name="admin_name" class="abc input-default">&nbsp;&nbsp;
    <a href="/school1/index.php/Admin/user/afterlist"><button type="submit" class="btn btn-primary">查询</button></a>
    <button type="button"  id="addnew" onclick="window.location.replace('/school1/index.php/Admin/user/afteradd')">添加管理员</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>管理员名称</th>
        
        <th>真实姓名</th>
       
        <th>学院</th>
        <th>邮箱</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php foreach($list as $key => $value){ ?>
        <tr>
                <td><a href="/school1/index.php/Admin/user/afterdetail/admin_id/<?php echo ($value["admin_id"]); ?>"><?php echo ($value["admin_name"]); ?></a></td>
                
                <td><?php echo ($value["admin_tname"]); ?></td>
                <td><?php echo ($value["admin_class"]); ?></td>
                <td><?php echo ($value["admin_email"]); ?></td>
                <td><a href="/school1/index.php/Admin/user/afterupdate/admin_id/<?php echo ($value["admin_id"]); ?>"><button type="button"  id="a">修改</button></a></td>
                <td><a href="/school1/index.php/Admin/user/afterdelete/admin_id/<?php echo ($value["admin_id"]); ?>"><button type="button"  id="ad">删除</button></a></td>
        </tr>
    <?php } ?>
       
       </table>

</body>
</html>