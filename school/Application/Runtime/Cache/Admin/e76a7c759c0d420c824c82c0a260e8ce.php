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
        <td width="10%" class="tableleft">商品名称</td>
        <td><input type="text" name="goods_name"/></td>
    </tr>
    <tr>
        <td class="tableleft">商品价格</td>
        <td><input type="text" name="goods_price"/></td>
    <tr>
    <tr>
        <td class="goods_type" name="goods_type">商品种类</td>
        <td><input name="goods_type"  type="radio" value="1"  />学习
            <input name="goods_type"  type="radio" value="2" />电子
            <input name="goods_type"  type="radio" value="3" />生活
            <input name="goods_type"  type="radio" value="4" />其他</td>
    <tr>
    <tr>
        <td class="tableleft">用户QQ</td>
        <td><input type="text" name="goods_qq"/></td>
    <tr>
    <tr>
        <td class="tableleft">用户电话</td>
        <td><input type="text" name="goods_tel"/></td>
    <tr>
        <td class="tableleft">商品图片</td>
        <td class="tableleft" style="width: 196px; "><input name="goods_img"  type="file"/><td>
    </tr>
	 
    <tr>
        <td class="tableleft">商品详情</td>
        <td><textarea rows="3" cols="30" name="goods_detail"></textarea></td>
    </tr>
     <?php
 $goods_time = date('Y-m-d,H:i:s',time());?>
                    <input type="hidden" name='goods_time' value=<?php echo ($goods_time); ?> />
                    <input type="hidden" name='admin_id' value='<?php echo ($data); ?>' />
    <tr>
        <td class="tableleft"></td>
        <td>
            <button style="margin-left:5px;"type="submit" class="btn btn-primary" type="button"  >保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid" onclick="window.location.replace('/school1/index.php/Admin/goods/goodsquery')">返回列表</button>
        </td>
    </tr>
</table>
</form>

</body>
</html>