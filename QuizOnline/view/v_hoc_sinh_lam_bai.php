<?php
$index = new C_Hoc_Sinh($_SESSION['id_hs'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu'],$_SESSION['id_lop']);
$unit = '';
if(isset($_GET['unit'])){
	
$unit = addslashes($_GET['unit']);
}
$cau_hoi = $index->getCauHoi($unit);
$ts_ch = count($cau_hoi);

if($unit<5&&$unit>0&&$index->diem[$unit-1]==-1)
{
	?>
	<div class="col-lg-7">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Làm Bài Tập Chương <?= $unit?></h3>
			</div>
			<div class="panel-body" id="lambai">
				<form action="?nop_bai" method="POST" role="form">
					<div class="overflow-bt scrollbar">
						<input type="hidden" name="unit" value="<?= $unit?>">
						<input type="hidden" name="tong_so_ch" value="<?= $ts_ch?>">
						<?php 
						for ($i = 0; $i < $ts_ch; $i++) {?>
						<div class="panel panel-default rlambai">
							<div class="panel-body lambai">
								<h3 class="panel-title">
									Câu <?= $i+1?> - #<?= $cau_hoi[$i]->id_cauhoi?> :   <?= $cau_hoi[$i]->cau_hoi?>
								</h3>
								<input type="hidden" name="id_ch_<?= $i?>" value="<?= $cau_hoi[$i]->id_cauhoi?>">
								<ul>
									<li>
										<input type="radio" name="da_<?= $i?>" value="<?= $cau_hoi[$i]->da_1?>">
										<label><?= $cau_hoi[$i]->da_1?></label>
									</li>
									<li>
										<input type="radio" name="da_<?= $i?>" value="<?= $cau_hoi[$i]->da_2?>">
										<label><?= $cau_hoi[$i]->da_2?></label>
									</li>
									<li>
										<input type="radio" name="da_<?= $i?>" value="<?= $cau_hoi[$i]->da_3?>">
										<label><?= $cau_hoi[$i]->da_3?></label>
									</li>
									<li>
										<input type="radio" name="da_<?= $i?>" value="<?= $cau_hoi[$i]->da_4?>">
										<label><?= $cau_hoi[$i]->da_4?></label>
									</li>
								</ul>
							</div>
						</div>
						<?php }
						?>
					</div>
					<button type="submit" name="nopbai" class="btn btn-success btn-nopbai" value="true">Nộp Bài</button>
					<a href="?" class="btn btn-success btn-nopbai">Quay lại!</a>
				</form>
			</div>	
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
				Bài tập không tồn tại hoặc đã làm xong, vui lòng kiểm tra lại hoặc liên hệ giáo viên.<br /><br />
				<a href="?"><button type="button" class="btn btn-info">Quay Lại</button></a>
			</div>	
		</div>
	</div>
	<?php
}
?>