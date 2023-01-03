<?php

include_once ('model/m_admin.php');
class C_Admin
{
	var $id_admin = '';
	var $tai_khoan = '';
	var $ten = '';
	var $chuc_vu = '';
	var $ten_cv = '';
    public function __construct($id_admin,$tai_khoan,$ten,$chuc_vu)
    {
    	$this->id_admin = $id_admin;
    	$this->tai_khoan = $tai_khoan;
    	$this->ten = $ten;
    	$this->chuc_vu = $chuc_vu;
    	$this->ten_cv = $this->getQuyen($this->chuc_vu)->mo_ta;		
    }
    public function logout()
    {
    	session_destroy();
    	header( "Refresh:0; url=index.php");
    }
    public function getQuyen()
    {
    	$cv = new M_Admin();
    	return $cv->getQuyen($this->chuc_vu);
    }
    public function getDSA()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSA();
    }
    public function editAdmin($id_admin,$tai_khoan,$mat_khau,$ten)
    {
    	$edit = new M_Admin();
    	return $edit->editAdmin($id_admin,$tai_khoan,$mat_khau,$ten);
    }
    public function delAdmin($id_admin)
    {
    	$update = new M_Admin();
    	return $update->delAdmin($id_admin);
    }
    public function addAdmin($tai_khoan,$mat_khau,$ten)
    {
    	$add = new M_Admin();
    	return $add->addAdmin($tai_khoan,$mat_khau,$ten);
    }
    public function getDSGV()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSGV();
    }
    public function editGV($id_gv,$tai_khoan,$mat_khau,$ten)
    {
    	$edit = new M_Admin();
    	return $edit->editGV($id_gv,$tai_khoan,$mat_khau,$ten);
    }
    public function delGV($id_gv)
    {
    	$update = new M_Admin();
    	return $update->delGV($id_gv);
    }
    public function addGV($tai_khoan,$mat_khau,$ten)
    {
    	$add = new M_Admin();
    	return $add->addGV($tai_khoan,$mat_khau,$ten);
    }
    public function getDSHS()
    {
    	$dsa = new M_Admin();
    	return $dsa->getDSHS();
    }
    public function editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop)
    {
    	$edit = new M_Admin();
    	return $edit->editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop);
    }
    public function delHS($id_hs,$id_lop)
    {
    	$update = new M_Admin();
    	return $update->delHS($id_hs,$id_lop);
    }
    public function addHS($tai_khoan,$mat_khau,$ten,$id_lop)
    {
    	$addhs = new M_Admin();
    	return $addhs->addHS($tai_khoan,$mat_khau,$ten,$id_lop);
    }
    public function addDiem($id_hs,$id_lop)
    {
        $adddiem = new M_Admin();
        return $adddiem->addDiem($id_hs,$id_lop);
    }
    public function getTenLop($id_lop)
    {
    	$tenlop = new M_Admin();
    	return $tenlop->getTenLop($id_lop);
    }
    public function getDSL()
    {
    	$dsl = new M_Admin();
    	return $dsl->getDSL();
    }
    public function editLop($id_lop,$id_khoi,$ten_lop,$id_gv)
    {
    	$edit = new M_Admin();
    	return $edit->editLop($id_lop,$id_khoi,$ten_lop,$id_gv);
    }
    public function delLop($id_lop)
    {
    	$update = new M_Admin();
    	return $update->delLop($id_lop);
    }
    public function addLop($id_khoi,$ten_lop,$id_gv)
    {
    	$add = new M_Admin();
    	return $add->addLop($id_khoi,$ten_lop,$id_gv);
    }
    public function getTenKhoi($id_khoi)
    {
    	$tkhoi = new M_Admin();
    	return $tkhoi->getTenKhoi($id_khoi);
    }
    public function getKhoi()
    {
    	$khoi = new M_Admin();
    	return $khoi->getKhoi();
    }
    public function getTenGV($id_gv)
    {
    	$khoi = new M_Admin();
    	return $khoi->getTenGV($id_gv);
    }
    public function getDSCH()
    {
        $dsch = new M_Admin();
        return $dsch->getDSCH();
    }
    public function editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $editch = new M_Admin();
        return $editch->editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
    }
    public function delCH($id_cauhoi)
    {
        $delch = new M_Admin();
        return $delch->delCH($id_cauhoi);
    }
    public function addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $addch = new M_Admin();
        return $addch->addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung);
    }
    public function sendGV($chu_de,$noi_dung)
    {
        $send = new M_Admin();
        return $send->sendGV($this->tai_khoan,$this->ten,$chu_de,$noi_dung);
    }
    public function getTBGV()
    {
        $tbgv = new M_Admin();
        return $tbgv->getTBGV();
    }
    public function sendHS($chu_de,$noi_dung)
    {
        $send = new M_Admin();
        return $send->sendHS($this->tai_khoan,$this->ten,$chu_de,$noi_dung);
    }
    public function getTBHS()
    {
        $tbgv = new M_Admin();
        return $tbgv->getTBHS();
    }

}
?>