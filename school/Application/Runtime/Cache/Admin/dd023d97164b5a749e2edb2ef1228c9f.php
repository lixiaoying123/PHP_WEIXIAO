<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>微校后台登陆</title>

<link rel="stylesheet" type="text/css" href="/school1/Public/Admin/css/styles.css">

</head>
<body>


<div class="wrapper">

	<div class="container">
		<h1>微校 后台管理</h1>
		<form name="formLogin" action="/school1/index.php/Admin/user/login.html" method="post">
			<input type="text" placeholder="Username" name="admin_name">
			<input type="password" placeholder="Password" name="admin_pwd"><br>
			<button type="submit" id="login-button" name="submit"><strong>登录</strong></button></br></br></br>
		
			
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		
	</ul>
	
</div>



</body>
</html>