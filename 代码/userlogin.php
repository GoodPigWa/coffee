<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "select * from user where username='$username'";
	$result = mysql_query($sql);
		if($row = mysql_fetch_assoc($result)){
			if($row['password'] == $password){
				echo "<script>alert('登录成功');location.href='index.php?'</script>";
				
                setcookie("user_id",$row['user_id']);
				exit();
			}
			else{
				echo "登录失败";
			}
		}
		else{
			echo "用户名输入错误";
		}

	
	
}
if ($_GET) {
	if ($_GET['tuichu'] == 'ok') {
		setcookie('username','',time()-1);
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ H+ ]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h4>欢迎来到 <strong>咖啡网页</strong></h4>
                    <strong>还没有账号？ <a href="register.php">立即注册&raquo;</a></strong>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post">
                    <h4 class="no-margins">登录：</h4>
                    <input type="text" class="form-control uname" name="username" placeholder="用户名" />
                    <input type="password" class="form-control pword m-b" name="password" placeholder="密码" />
                    <a href="">忘记密码了？</a>
                    <button class="btn btn-success btn-block">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2015 All Rights Reserved. H+
            </div>
        </div>
    </div>
</body>

</html>

