<?php

$index = new C_Giao_Vien($_SESSION['id_gv'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu']);
$id_lop ='';
if(isset($_GET['id_lop'])){
	$id_lop = $_GET['id_lop'];
	$getCTL = $index->getCTL($id_lop);
	$id_lop -= 1;
}
if($index->dsl[$id_lop] != NULL){
	$ten_lop = $index->dsl[$id_lop]->ten_lop;
}
?>
<?php
if($id_lop<count($index->dsl) && $id_lop>=0)
	{?>
		<div class="col-lg-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Chi Tiết Lớp <?= $ten_lop?> - Tổng Số <?=count($getCTL)?> </h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-ctl">
						<thead>
							<tr>
								<th class="col-xs-1">Tài Khoản</th>
								<th class="col-xs-3">Tên</th>
								<th class="col-xs-2">Điểm 1</th>
								<th class="col-xs-2">Điểm 2</th>
								<th class="col-xs-2">Điểm 3</th>
								<th class="col-xs-2">Điểm 4</th>
							</tr>
						</thead>
						<tbody class="scrollbar">
							<?php
							for ($j = 0; $j < count($getCTL); $j++) { ?>
							<tr>
								<td class="col-lg-1"><?= $getCTL[$j]->id_hs?></td>
								<?php $id_hs = $getCTL[$j]->id_hs; ?>
								<td class="col-xs-3"><?= $index->getTHS($id_hs)->ten?></td>
								<td class="col-xs-2"><?= $getCTL[$j]->unit_1?></td>
								<td class="col-xs-2"><?= $getCTL[$j]->unit_2?></td>
								<td class="col-xs-2"><?= $getCTL[$j]->unit_3?></td>
								<td class="col-xs-2"><?= $getCTL[$j]->unit_4?></td>
							</tr>
							<div class="clearfix">
							
							</div>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
	<?php
}
else {?>
<div class="col-lg-10">
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Lỗi </h3>
		</div>
		<div class="panel-body overflow-gv">
			Lớp không tồn tại hoặc đã bị xóa, vui lòng kiểm tra lại hoặc liên hệ Quản trị viên.<br /><br />
			<a href="?"><button type="button" class="btn btn-info">Quay Lại</button></a>
		</div>	
	</div>
</div>
<?php
}
?>