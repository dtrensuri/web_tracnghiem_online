<?php

$index = new C_Hoc_Sinh($_SESSION['id_hs'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu'],$_SESSION['id_lop']);
$unit = $_POST['unit']; 
$ts_ch = $_POST['tong_so_ch'];
for ($i = 0; $i < $ts_ch; $i++) {
	$id_cauhoi[$i] = addslashes($_POST['id_ch_'.$i.'']);
	if(isset($_POST['da_'.$i.''])){
		$da_cauhoi[$i] = addslashes($_POST['da_'.$i.'']);
	}else{
		$da_cauhoi[$i] = addslashes('');
	}
}
?>
<?php
if(isset($unit))
{
	?>
	<div class="col-lg-7">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Kết Quả Bài Làm</h3>
			</div>
			<div class="panel-body" id="ket_qua">
				<span class="ket_qua">Chương: <?= $unit?></span>
				<span class="ket_qua">Tổng Số Câu Hỏi: <?= $ts_ch?></span>
				<div class="overflow-kq scrollbar">
					<?php
					$diem = 0;
					for ($i = 0; $i < $ts_ch; $i++) {
				$cau_hoi = $index->get1CauHoi($id_cauhoi[$i]);
				?>
				<div class="panel panel-default rlambai">
					<div class="panel-body lambai">
						<h3 class="panel-title">
							Câu <?= $i+1?> - #<?= $cau_hoi->id_cauhoi?> :   <?= $cau_hoi->cau_hoi?>
						</h3>
						<ul>
							<?php
							if($da_cauhoi[$i]==$cau_hoi->da_dung)
								$diem++;
							?>
							<?php
							if($da_cauhoi[$i]==$cau_hoi->da_1)
								echo '<li><input type="radio" checked="checked">
							<label>'.$cau_hoi->da_1.'</label></li>';
							else
								echo '<li><input type="radio" disabled="disabled">
							<label>'.$cau_hoi->da_1.'</label></li>';
							?>
							<?php
							if($da_cauhoi[$i]==$cau_hoi->da_2)
								echo '<li><input type="radio" checked="checked">
							<label>'.$cau_hoi->da_2.'</label></li>';
							else
								echo '<li><input type="radio" disabled="disabled">
							<label>'.$cau_hoi->da_2.'</label></li>';
							?>
							<?php
							if($da_cauhoi[$i]==$cau_hoi->da_3)
								echo '<li><input type="radio" checked="checked">
							<label>'.$cau_hoi->da_3.'</label></li>';
							else
								echo '<li><input type="radio" disabled="disabled">
							<label>'.$cau_hoi->da_3.'</label></li>';
							?>
							<?php
							if($da_cauhoi[$i]==$cau_hoi->da_4)
								echo '<li><input type="radio" checked="checked">
							<label>'.$cau_hoi->da_4.'</label></li>';
							else
								echo '<li><input type="radio" disabled="disabled">
							<label>'.$cau_hoi->da_4.'</label></li>';
							?>
						</ul>
					</div>
					<span class="dap_an">Đáp án: <span class="da_dung"><?= $cau_hoi->da_dung?></span></span>
				</div>
				<?php }
				?>
			</div>
			<span class="ket_qua">Điểm: <span class="diem"><?= $diem?></span></span>
			<a href="?"><button class="btn btn-success" style="float: right;">Quay lại!</button></a>
		</div>
		<?php
		$index->tinhDiem($index->id_hs,$index->id_lop,$unit,$diem);
		?>	
	</div>
</div>
<?php
}
else
{
	?>
	<div class="col-lg-7">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Lỗi!</h3>
			</div>
			<div class="panel-body overflow-hs">
				Đã hết hạn xem lại kết quả bài kiểm tra.<br /><br />
				<a href="?"><button type="button" class="btn btn-info">Quay Lại</button></a>
			</div>	
		</div>
	</div>
	<?php
}
?>