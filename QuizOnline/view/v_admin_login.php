<?php
include_once ('controller/c_login.php');
$v_user = new C_Login();
if(isset($_POST['dang_nhap']))
{
	$tai_khoan = addslashes($_POST['tai_khoan']);
	$mat_khau = md5($_POST['mat_khau']);
	$v_user->admin($tai_khoan,$mat_khau);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hệ Thống Trắc Nghiệm Online</title>
	<link rel="stylesheet" href="http://localhost/quizonline/res/css/style.css">
	<script src="http://localhost/quizonline/res/js/jquery.js"></script>
	<script src="http://localhost/quizonline/res/js/bootstrap.min.js"></script>

</head>
<body class="bg-login">
	<div class="full">
		<div class="login">
			<h1 class="font">Admin Control Panel</h1>
			<?php
			if(isset($_SESSION['login_error_ad'])){
				echo '<h3>'.$_SESSION['login_error_ad'].'</h3>';
			}
			if(isset($_SESSION['login'])){
				echo '<h3>'.$_SESSION['login'].'</h3>';
			}

			?>
			<form method="POST" class="f">
				<input type="text" name="tai_khoan" placeholder="Tài Khoản">
				<input type="password" name="mat_khau" placeholder="mật khẩu">
				<button type="submit" name='dang_nhap'>Đăng Nhập</button>
			</form>
		</div>
	</div>
</body>
</html>