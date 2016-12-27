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
<h3><strong>基本信息：</strong></h3>
   <table class="table table-condensed">
               <tr>              
	              <td width="18%" height="30" align="center">用 户 名：</td>
	              <td width="82%" class="word_grey"><?php echo ($info["username"]); ?></td>
	            </tr>
	           <tr>
		          <td height="28" align="center">学院：</td>
		          <td height="28"><?php echo ($info["userclass"]); ?></td>
	           </tr>
	           <tr>
	              <td height="28" align="center">E-mail：</td>
	              <td height="28"><?php echo ($info["useremail"]); ?></td>
	            </tr> 
			   

	        </table>				
        <h3><strong>操作记录：</strong></h3><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<strong>商品添加记录：</strong>
	 
	   <table class="table table-condensed"   >
	          <tr>
	             <td class="word_grey">序号 &nbsp;</td>
	              <td class="word_grey">商品名称 &nbsp;</td>
				  <td class="word_grey">上传时间</td>
				  <td class="word_grey">操作菜单</td>
	            </tr>  
              <?php foreach($list as $key => $value){ $count++;?>
	           <tr>
			   
	               <td class="word_grey"><?php echo ($count); ?></td>
	              <td class="word_grey"><?php echo ($value["goods_name"]); ?></td>
				  <td class="word_grey"><?php echo ($value["goods_time"]); ?></td>
				   <td><a href="#"><button type="submit">删除</button></a></td>
	            </tr> 
				 <?php } ?>
		   <tr>

		   </tr>
				</table>

			<!--/////////////////////////////////////-->  
	 &nbsp;&nbsp;&nbsp; <strong>物品添加记录：</strong>
		
	<table class="table table-condensed"  >
		<tr>
	             
	              <td class="word_grey">序号</td>
				  <td class="word_grey">物品名称</td>
				  <td class="word_grey">上传时间</td>
			      <td class="word_grey">操作菜单</td>
	            </tr>
		<?php foreach($list1 as $key => $value){ $count1++;?>
				<tr>
			  
	               <td class="word_grey"><?php echo ($count1); ?></td>
	              <td class="word_grey"><?php echo ($value["lost_name"]); ?></td>
				  <td class="word_grey">2<?php echo ($value["lost_time"]); ?></td>
					<td><a href="#"><button type="submit">删除</button></a></td>
	            </tr>
		<?php } ?>
				</table>

</body>
</html>