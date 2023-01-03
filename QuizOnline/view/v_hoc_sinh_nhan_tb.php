<?php
$index = new C_Hoc_Sinh($_SESSION['id_hs'],$_SESSION['tai_khoan'],$_SESSION['ten'],$_SESSION['chuc_vu'],$_SESSION['id_lop']);
$tbhs = $index->getTBHS();
?>
<div class="col-lg-3">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Thông Báo</h3>
		</div>
		<div class="panel-body">
			<div class="noi_dung_hs scrollbar">
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
		</div>
	</div>
</div>