<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Creating Modal Window with Twitter Bootstrap">
<link href="/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/school1/Public/Admin/Css/style.css" />
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery2.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/school1/Public/Admin/Js/common.js"></script>

    <style type="text/css">
        body {
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
<form class="form-inline definewidth m20" action="/school1/index.php/Admin/news/newsquery" method="get">
    <font color="#777777"><strong>新闻标题：</strong></font>
    <input type="text" name="sosuo" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>新闻标题</th>
        <th>详情</th>
        <th>发布时间</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php foreach($info as $key => $value){?>
        <tr>
            <input type="hidden" name='id' value="{:$_GET['id']}" />
                <td><?php echo ($value["news_title"]); ?></td>
				<td><a href="/school1/index.php/Admin/news/newsdetail/news_id/<?php echo ($value["news_id"]); ?>" id="xiangqing"  rel="popover"  data-original-title="公告标题"data-content="">详情</a></td>
                <td><?php echo (date('Y-m-d',$value["news_time"])); ?></td>
                <td><a href="/school1/index.php/Admin/news/delete/news_id/<?php echo ($value["news_id"]); ?>">删除</a></td>
        </tr>
     <?php }?>
       
       </table>
<div class="dede_pages">
    <ul class="pagelist">
        <span class="pageinfo"><strong><?php echo ($pagelist); ?></strong></span>
    </ul>
</div>

</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script>
$(function ()
{ $("#xiangqing").popover();
});
</script>