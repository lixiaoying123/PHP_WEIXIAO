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
		font-size: 20px;
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
<body >
<form class="form-inline definewidth m20" action="/school1/index.php/admin/goods/goodsquery.html" method="get">
    <font color="#777777"><strong>商品名称：</strong></font>
    <input type="text" name="sosuo" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; 
	<button type="button"  id="addnew" onclick="window.location.replace('/school1/index.php/Admin/goods/goodsadd')">添加商品</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>商品名称</th>
        
        <th>商品类别</th>
        <th>上传者</th>
        <th>上传日期</th>
        <th>状态</th>
        
        <th>管理菜单</th>
    </tr>
    </thead>
    <?php foreach($info as $key => $value){ if($value[user_id]==null){ $username = $admin->where("admin_id='%s'",$value[admin_id])->getField('admin_name'); $id = U("admin/user/afterdetail/admin_id/$value[admin_id]");} else{ $username = $user->where("user_id='%s'",$value[user_id])->getField('username'); $id = U("admin/user/frontdetail/user_id/$value[user_id]");} if($value[goods_type]==study){ $value[goods_type] = '学习'; }else if($value[goods_type]==dianzi){ $value[goods_type] = '电子'; }else if($value[goods_type]==life){ $value[goods_type] = '生活'; }else{ $value[goods_type] = '其他';} if($value[status]==1){ $value[status]='被举报'; }else{ $value[status]='';} ?>
	     <input type="hidden" name='id' value="<?php echo $_GET['id'];?>" />

	     <!--input type="hidden" name='user_id' value='<?php echo ($dataname); ?>' /-->
        <tr>
                <td><?php echo ($value["goods_name"]); ?></td>
                <td><?php echo ($value["goods_type"]); ?></td>

            <?php echo "<td><a href='$id'>".$username."</a></td>";?>
                <!--<td><a href="/school1/index.php/Admin/user/frontdetail/user_id/<?php echo ($value["user_id"]); ?>"><?php echo ($username); ?></a></td>-->
                <td><?php echo ($value["goods_time"]); ?></td>
            <td><a href="/school1/index.php/Admin/goods/goodsdetail/goods_id/<?php echo ($value["goods_id"]); ?>" style="color: #8B0000"><?php echo ($value["status"]); ?></a></td>
                <td><a href="/school1/index.php/Admin/Goods/delete/goods_id/<?php echo ($value["goods_id"]); ?>"><button type="submit">删除</button></a></td>
               
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