<?php
$index = new C_Giao_Vien($_SESSION['id_gv'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu']);
$tbgv = $index->getTBGV();
$tbhs = $index->getTBHS();
?>
<div class="col-lg-5">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Thông Báo Nhận Từ Admin</h3>
		</div>
		<div class="panel-body">
			<div class="noi_dung_gv_1 scrollbar">
				<?php 
				for ($i = count($tbgv)-1; $i >= count($tbgv)-10  && $i>0  ;   $i--) {
					if($tbgv[$i]->id!=''){
						?>
						<div class="chat">
							<span class="id_chat">#<?= $tbgv[$i]->id?> - </span>
							<span class="tk_chat"><?= $tbgv[$i]->tai_khoan?></span>
							<span class="tg_chat"> - [<?= $tbgv[$i]->thoi_gian?>]</span>
							<span class="ten_chat"><?= $tbgv[$i]->ten?><span class="txt_chat"> : <?= $tbgv[$i]->chu_de?></span></span>
							<span class="nd_chat"><?= $tbgv[$i]->noi_dung?></span>
						</div>
						<?php	
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-5">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Gửi Thông Báo Đến Học Sinh</h3>
		</div>
		<div class="panel-body">
			<div class="noi_dung_gv_2 scrollbar">
				<?php 
				for ($i = count($tbhs)-1; $i >= count($tbhs)-10  && $i>0  ;   $i--) {
					if($tbhs[$i]->id!=''){
						?>
						<div class="chat">
							<span class="id_chat">#<?= $tbhs[$i]->id?> - </span>
							<span class="tk_chat"><?= $tbhs[$i]->tai_khoan?></span>
							<span class="tg_chat"> - [<?= $tbhs[$i]->thoi_gian?>]</span>
							<span class="ten_chat"><?= $tbhs[$i]->ten?><span class="txt_chat"> : <?= $tbhs[$i]->chu_de?></span></span>
							<span class="nd_chat"><?= $tbhs[$i]->noi_dung?></span>
						</div>
						<?php	
					}
				}
				?>
			</div>
			<div class="send_gv">
				<form action="" method="POST" role="form">
					<div class="form-group">
						<input name="chu_de_hs" type="text" class="form-control" id="" placeholder="Chủ đề">
						<textarea name="noi_dung_hs" id="inputNoi_dung" class="form-control" rows="3" required="required"></textarea>
					</div>
					<button name="send_hs" type="submit" class="btn btn-info btn-max">Gửi</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if(isset($_POST['send_hs']))
{
	$chu_de = trim(addslashes($_POST['chu_de_hs']));
	$noi_dung = trim(addslashes($_POST['noi_dung_hs']));
	if($chu_de != '' && $noi_dung != '')
	{
		$index->sendHS($chu_de,$noi_dung);
		echo '<meta http-equiv="refresh" content="0" />';
	}
}
?>
