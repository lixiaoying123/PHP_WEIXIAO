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
<form class="form-inline definewidth m20" action="/school1/index.php/Admin/lost/userlostquery" method="get">
    <font color="#777777"><strong>请输入用户名称：</strong></font>
    <input type="text" name="sosuo" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; 
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--font color="#777777"><strong>用户名称：</strong></font>
 &nbsp;&nbsp; <a href="/school1/index.php/Admin/user/frontdetail.html">小强</a-->
    <tr>
	     <th>序号</th>
        <th>物品名称</th>
        
        <th>分类</th>
        
        <th>上传日期</th>
        
        
        <th>管理菜单</th>
    </tr>
    </thead>
	      <?php foreach($info as $key => $value){?>
        <input type="hidden" name='id' value="{:$_GET['id']}" />
	     
        <tr>
		        <td><?php echo ($value["lost_id"]); ?></td>
                <td><?php echo ($value["lost_name"]); ?></td>
                <td><?php echo ($value["lost_type"]); ?></td>
                <td><?php echo ($value["lost_time"]); ?></td>
                
                <td><a href="/school1/index.php/Admin/Lost/delete/lost_id/<?php echo ($value["lost_id"]); ?>"><button type="submit">删除</button></a></td>
               
        </tr>
        <?php } ?>
               
 
		
           
       
       </table>

</body>
</html>