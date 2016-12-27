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
<form action="/school1/index.php/Admin/goods/goodsdetail/goods_id/6" method="post" class="definewidth m20" enctype="multipart/form-data">
    <table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">
        <input type="hidden" name='id' value="<?php echo ($_GET['id']); ?>" />
        <tr>
            <td width="10%" class="tableleft">商品名称</td>
            <td><?php echo $list[0][goods_name];?></td>
        </tr>
        <tr>
            <td class="tableleft">商品价格</td>
            <td><?php echo $list[0][goods_price];?></td>
        <tr>
        <?php
 $id = $list[0][goods_id]; if($list[0][goods_type]==study){ $list[0][goods_type] = '学习'; }else if($list[0][goods_type]==dianzi){ $list[0][goods_type] = '电子'; }else if($list[0][goods_type]==life){ $list[0][goods_type] = '生活'; }else{ $list[0][goods_type] = '其他';} ?>
        <tr>
            <td class="goods_type" name="goods_type">商品种类</td>
            <td><?php echo ($list[0][goods_type]); ?></td>
        <tr>
        <tr>
            <td class="tableleft">用户QQ</td>
            <td><?php echo $list[0][goods_qq];?></td>
        <tr>
        <tr>
            <td class="tableleft">用户电话</td>
            <td><?php echo $list[0][goods_tel];?></td>
        <tr>
            <td class="tableleft">商品图片</td>
            <td class="tableleft" style="width: 196px; "><img alt="" src="/school1/Public/<?php echo $list[0][goods_img] ?>" tppabs="" />
            <br/><img alt="" src="/school1/Public/<?php echo $list[0][goods_img1] ?>" tppabs="" />
            <td>
        </tr>

        <tr>
            <td class="tableleft">商品详情</td>
            <td><?php echo $list[0][goods_detail];?></td>
        </tr>
    </table>
    <button style="margin-left:5px;"type="button" class="btn btn-primary" type="button"  onclick="window.location.replace('/school1/index.php/Admin/Goods/jinyan/goods_id/<?php echo ($id); ?>')">禁言</button> &nbsp;&nbsp;
    <button style="margin-left:5px;"type="button" class="btn btn-primary" type="button"  onclick="window.location.replace('/school1/index.php/Admin/Goods/qxjubao/goods_id/<?php echo ($id); ?>')">取消举报</button> &nbsp;&nbsp;
    <button type="button" class="btn btn-success" name="backid" id="backid" onclick="window.location.replace('/school1/index.php/Admin/goods/goodsquery')">返回列表</button>

</form>

</body>
</html>