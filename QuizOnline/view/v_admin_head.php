<?php
include_once ('controller/c_admin.php');
$index = new C_Admin($_SESSION['id_admin'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu']);
if(isset($_GET['logout']))
	$index->logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Cpanel - Trắc Nghiệm Online</title>
	<link rel="stylesheet" href="http://localhost/quizonline/res/css/style.css">
</head>
<body style="overflow-x: hidden;">
	<div class="col-lg-12">
		<nav class="navbar navbar-default logo" role="navigation">
			<div class="container-fluid">
				<!-- <div class="navbar-header font">
					<a class="navbar-brand" href="?" style="color: black !important">Admin Control Panel</a>
				</div> -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right font">
						<li><a href="?" style="color: black !important">Trang Chủ</a></li>
						<li><a href="#" style="color: black !important">Hướng Dẫn Sử Dụng</a></li>
						<li><a href="#" style="color: black !important">Báo Lỗi - Góp ý</a></li>
						<li><a href="#" style="color: black !important">Liên Hệ</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="col-lg-2">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin tài khoản</h3>
			</div>
			<div class="panel-body">
				<span>Tài khoản: <?= $index->tai_khoan?></span><br />
				<span>Tên: <?= $index->ten?></span><br />
				<span>Chức vụ: <?= $index->ten_cv?></span><br />
				<a class="" data-toggle="modal" style="color: black !important;" href='#logout'>Đăng xuất</a>
				<div class="modal fade" id="logout">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" >Đăng xuất</h4>
							</div>
							<div class="modal-body">
								Bạn có muốn thoát phiên làm việc!
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								<a href="index.php?logout=true" class="btn btn-primary" name="logout">Đăng Xuất</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Menu</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-max btn-success"  href="?">Quản lý thông tin Admin</a><br /><br />
				<a class="btn btn-max btn-success" href="?admin=ql_giao_vien">Quản lý Giáo Viên</a><br /><br />
				<a class="btn btn-max btn-success" href="?admin=ql_lop">Quản lý Lớp</a><br /><br />
				<a class="btn btn-max btn-success" href="?admin=ql_hoc_sinh">Quản lý Học Sinh</a><br /><br />
				<a class="btn btn-max btn-success" href="?admin=ql_cau_hoi">Quản lý Câu Hỏi</a><br /><br />
				<a class="btn btn-max btn-success" href="?admin=admin_gui_tb">Gửi Thông Báo</a><br /><br />
			</div>
		</div>
	</div>
	