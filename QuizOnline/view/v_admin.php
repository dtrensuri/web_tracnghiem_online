<?php
include_once ('controller/controller.php');
$admin = new Controller();
$controller = '';
if(isset($_GET['admin'])){
	$controller = $_GET['admin'];
}
$admin->loadView('v_admin_head');
if(isset($controller))
 {
	$check = true;
	if($controller=='ql_cau_hoi')
		{
			$admin->loadView('v_ql_cau_hoi');
			$check = false;
		}
	if($controller=='ql_giao_vien')
		{
			$admin->loadView('v_ql_giao_vien');
			$check = false;
		}
	if($controller=='ql_hoc_sinh')
		{
			$admin->loadView('v_ql_hoc_sinh');
			$check = false;
		}
	if($controller=='ql_lop')
		{
			$admin->loadView('v_ql_lop');
			$check = false;
		}
	if($controller=='admin_gui_tb')
		{
			$admin->loadView('v_admin_gui_tb');
			$check = false;
		}
	if($check)
		$admin->loadView('v_404');
}
 else
	 $admin->loadView('v_ql_admin');
?>

<?php
$admin->loadView('v_foot');
?>