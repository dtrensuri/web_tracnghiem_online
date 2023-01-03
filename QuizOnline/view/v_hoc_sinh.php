<?php
include_once ('controller/c_hoc_sinh.php');
include_once ('controller/controller.php');
$control = new Controller();
$index = new C_Hoc_Sinh($_SESSION['id_hs'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu'],$_SESSION['id_lop']);
if(isset($_GET['logout']))
	$index->logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hệ Thống Trắc Nghiệm Online</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="http://localhost/quizonline/res/css/style.css">
</head>
<body style="overflow-x: hidden;">
	<div class="col-lg-12">
		<nav class="navbar navbar-default logo" role="navigation">
			<div class="container-fluid">
				<!-- <div class="navbar-header">
					<a class="navbar-brand font" href="?" style="color: black !important;">Hệ Thống Trắc Nghiệm Online</a>
				</div> -->

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right font">
						<li><a href="?" style="color: black !important">Trang Chủ</a></li>
						<li><a href="#" style="color: black !important">Hướng Dẫn Sử Dụng</a></li>
						<li><a href="#" style="color: black !important">Ôn Lại Kiến Thức</a></li>
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
				<span><?= $index->ten_cv?>
					<span><?= $index->ten_lop?></span>
				</span><br />
				<a class="" data-toggle="modal" style="color: black !important;"  href='#logout'>Đăng xuất</a>
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
				<h3 class="panel-title">Bảng Điểm</h3>
			</div>
			<div class="panel-body" style="height: 300px;">
				<?php 
				for ($i = 1; $i < 5; $i++) { 
					if($index->diem[$i-1]>=0){?>
					<a class="btn btn-max btn-success" data-toggle="modal" href="?unit=<?= $i?>">Chương <?= $i?><br />Điểm: <?= $index->diem[$i-1]?></a><br /><br />
					<?php }
					else {?>
					<a class="btn btn-max btn-warning" data-toggle="modal" href="?unit=<?= $i?>">Chương <?= $i?><br />Chưa làm</a></a><br /><br />
					<?php }?>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php
	$unit = '';
	$luu_tru = '';
	if(isset($_GET['luu_tru'])){
		$luu_tru = addslashes($_GET['luu_tru']);
	}
	if(isset($_GET['unit'])){
		$unit = $_GET['unit'];
	}
	
	
	if($unit!='')
		$control->loadView('v_hoc_sinh_lam_bai');
	if(isset($_GET['nop_bai']))
		$control->loadView('v_hoc_sinh_nop_bai');
	if($luu_tru!='')
		$control->loadView('v_luu_tru');
	if($unit==''&&$luu_tru==''&&!isset($_GET['nop_bai']))
		$control->loadView('v_hoc_sinh_chat_lop');

	?>

	<?php

	$control->loadView('v_hoc_sinh_nhan_tb');
	?>

	<?php

	$control->loadView('v_foot');
	?>