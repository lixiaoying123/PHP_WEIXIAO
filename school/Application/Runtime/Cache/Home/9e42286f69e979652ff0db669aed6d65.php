<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=1024" />
<title>个人中心</title>
<meta name="keywords" content="这里填写关键词" />
<meta name="description" content="这里填写描述" />      
<link rel="stylesheet" href="/school1/Public/Home/css/style.css" type="text/css" media="all" />
<!--[if lt IE 9]><script type="text/javascript" src="../js/html5.js"></script><![endif]-->
</head>

<body >



<header>
	<div id="navbg"></div>
	<div class="wrapper">
		<h1 class="logo">
			<a href="index.htm"  title="微校">
				<img src="/school1/Public/Home/images/logo.png" width="213" height="36" alt="" />
			</a>
		</h1>
		<nav>
			<ul>
				<li class="home"><a href="../index/index" >首页<span>网站首页！</span></a></li>
				<li class="cases"><a href="../Goods/goodslist" title="网页制作">商品<span>都有哪些商品</span></a></li>
				<li class="service"><a href="../syllabus/syllabus"  title="网站建设">课程表<span>都有什么课</span></a></li>
				<li class="client"><a href="../Grade/grade"  title="解决方案">成绩<span>考了多少？</span></a></li>
				<li class="about"><a href="../about/about"  title="关于学校">关于<span>项目如何</span></a></li>
			</ul>
		</nav>
		<?php
 if($_SESSION['username']!=null){ $self=U('user/self'); echo "欢迎您,"."<a href='$self'>".$_SESSION['username']."</a>"; echo "&nbsp&nbsp"; $logout=U('user/logout'); echo "<a href='$logout'>注销</a> "; } else { $login=U('user/login'); $register=U('user/register'); echo "<a href='$login'>登录</a>
		<a href='$register'>注册</a>" ; } ?>
	</div>
</header>
<!-- 查找最顶级栏目  -->
<section id="single">
	<!-- 查找子栏目  -->
	<div class="cat_title">
		<div class="wrapper">
			<h2><strong>SELF</strong>个人中心</h2>
			<p>我们是谁？<br/>Who are we?</p>
		</div>
	</div>
	<div class="category">
		<div class="wrapper">
			<h2 style="font-size: 30px;">个人信息</h2>
           
            <ul class="catbtn"> 
            
			</ul>
		</div>
	</div>
	<article class="serv_detailed">
		<div id="detailed"> <ul style="font-size: 20px;">   
      	<li>用户名：<input type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly="true"></li>
      	</br>
      	<li>学院：&nbsp<input type="text" name="userclass" value="<?php echo ($data[0]['userclass']); ?>" readonly="true"></li></br>
      	<li>邮箱：&nbsp<input type="text" name="useremail" value="<?php echo ($data[0]['useremail']); ?>" readonly="true"></li></br>
      	<li><a href="/school1/index.php/Home/Goods/self" style="font-size: 30px;">我的商品</a>&nbsp&nbsp
			<a href="/school1/index.php/Home/Lost/self" style="font-size: 30px;">我的物品</a>&nbsp&nbsp
      	    <a href="#" style="font-size: 30px;">我发布的信息</a>
		</li>
      </ul>


        </div>
		<div id="case_footer"></div>
	</article>
</section>
<footer>
	<div id="footerlink">
		<nav class="wrapper">
			<a id="gotop" href="javascript:void(0)">top</a>
		</nav>
	</div>
	<div id="footerinfo">
		<div class="wrapper1">
			<h2>联系我们<strong>Contact</strong></h2>
			<p>
				电话：xxxxxxxx<br/>
				传真：xxxxxxxxx<br/>
				电子邮件：xxxxxxxxx<br/>
				公司地址：xxxxxxxxxxx<br/>
				备案编号：xxxxxxxx<br/>
				xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
			</p>
			<img src="/school1/Public/Home/images/map.gif" id="homemap" width="258" height="190" alt="公司位置" />
		</div>
		<div class="links">
			<h2>友情链接<strong>Links</strong></h2>
			<p>
			<ul>
				<li>
					<a href="#" target='_blank'>微校</a>
				</li>
				<li>
					<a href="#" target='_blank'>微校</a>
				</li>
				<li>
					<a href="#" target='_blank'>微校</a>
				</li>
				<li>
					<a href="#" target='_blank'>微校</a>
				</li>
			</ul>
			</p>
		</div>
	</div>
</footer>
<script type="text/javascript" src="/school1/Public/Home/js/jquery.1.8.2.min.js"></script>
<script type="text/javascript" src="/school1/Public/Home/js/jquery.plugin.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="../js/killie6.js"></script>
<![endif]-->

</body>
</html>