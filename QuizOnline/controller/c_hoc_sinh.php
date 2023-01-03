<?php

include_once ('model/m_hoc_sinh.php');

class C_Hoc_Sinh
{
	var $id_hs = '';
	var $tai_khoan = '';
	var $ten = '';
	var $chuc_vu = '';
	var $ten_cv = '';
	var $id_lop = '';
	var $ten_lop = '';
    var $id_khoi = '';
	var $diem = array();
    public function __construct($id_hs,$tai_khoan,$ten,$chuc_vu,$id_lop)
    {
    	$this->id_hs = $id_hs;
    	$this->tai_khoan = $tai_khoan;
    	$this->ten = $ten;
    	$this->chuc_vu = $chuc_vu;	
    	$this->id_lop = $id_lop;
        $this->id_khoi = $this->getKhoi($this->id_lop)->id_khoi;
        $this->ten_lop = $this->getTlop()->ten_lop;
        $this->ten_cv = $this->getQuyen()->mo_ta;
        $this->diem[0]=$this->getBangDiem()->unit_1;
        $this->diem[1]=$this->getBangDiem()->unit_2;
        $this->diem[2]=$this->getBangDiem()->unit_3;
        $this->diem[3]=$this->getBangDiem()->unit_4;	
    }
    public function logout()
    {
    	session_destroy();
    	header( "Refresh:0; url=index.php");
    }
    public function getTlop()
    {
    	$lop = new M_Hoc_Sinh();
    	return $lop->getTLop($this->id_lop);
    }
    public function getQuyen()
    {
    	$cv = new M_Hoc_Sinh();
    	return $cv->getQuyen($this->chuc_vu);
    }
    public function getBangDiem()
    {
    	$diem = new M_Hoc_Sinh();
    	return $diem->getBangDiem($this->id_lop,$this->id_hs);
    }
    public function getKhoi($id_lop)
    {
        $idkhoi = new M_Hoc_Sinh();
        return $idkhoi->getKhoi($id_lop);
    }
    public function getCauHoi($unit)
    {
    	$cauhoi = new M_Hoc_Sinh();
    	return $cauhoi->getCauHoi($this->id_khoi,$unit);
    }
    public function get1CauHoi($id_cauhoi)
    {
        $ch = new M_Hoc_Sinh();
        return $ch->get1CauHoi($id_cauhoi);
    }
    public function tinhDiem($id_hs,$id_lop,$unit,$diem)
    {
        $tdiem = new M_Hoc_Sinh();
        return $tdiem->tinhDiem($id_hs,$id_lop,$unit,$diem);
    }
    public function chat($noi_dung)
    {
        $chat = new M_Hoc_Sinh();
        return $chat->chat($this->tai_khoan,$this->ten,$noi_dung,$this->id_lop);
    }
    public function getChat()
    {
        $gchat = new M_Hoc_Sinh();
        return $gchat->getChat($this->id_lop);
    }
    public function getTBHS()
    {
        $tbgv = new M_Hoc_Sinh();
        return $tbgv->getTBHS();
    }
}
?>