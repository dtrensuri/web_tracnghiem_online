<?php

include_once ('controller/controller.php');

$index = new Controller();
if(isset( $_GET['admin'])){
	$admin = $_GET['admin'];
}
if(isset( $_GET['giao_vien'])){
	$giao_vien = $_GET['giao_vien'];
}

if(isset($_SESSION['login']))
{
	if($_SESSION['chuc_vu']==3)
		$index->loadView('v_hoc_sinh');
	if($_SESSION['chuc_vu']==2)
		$index->loadView('v_giao_vien');
	if($_SESSION['chuc_vu']==1)
		$index->loadView('v_admin');
}
else
{
	if(isset($admin))
		$index->loadView('v_admin_login');
	if(isset($giao_vien))
		$index->loadView('v_giao_vien_login');
	if(!isset($admin)&&!isset($giao_vien))
		$index->loadView('v_hoc_sinh_login');
}

?>