<?php

include_once ('model/m_giao_vien.php');
class C_Giao_Vien
{
	var $id_gv = '';
	var $tai_khoan = '';
	var $ten = '';
	var $chuc_vu = '';
	var $ten_cv = '';
    var $dsl = array();
    public function __construct($id_gv,$tai_khoan,$ten,$chuc_vu)
    {
    	$this->id_gv = $id_gv;
    	$this->tai_khoan = $tai_khoan;
    	$this->ten = $ten;
    	$this->chuc_vu = $chuc_vu;
        $this->ten_cv = $this->getQuyen($this->chuc_vu)->mo_ta;
        $this->dsl = $this->getDSL();
    }
    public function logout()
    {
    	session_destroy();
    	header( "Refresh:0; url=index.php");
    }
    public function getQuyen()
    {
    	$cv = new M_Giao_Vien();
    	return $cv->getQuyen($this->chuc_vu);
    }
    public function getDSL()
    {
        $getDSL = new M_Giao_Vien();
        return $getDSL->getDSL($this->id_gv);
    }
    public function getCTL($id_lop)
    {
        $getCTL = new M_Giao_Vien();
        return $getCTL->getCTL($id_lop);
    }
    public function getTHS($id_hs)
    {
        $getTHS = new M_Giao_Vien();
        return $getTHS->getTHS($id_hs);
    }
    public function getTBGV()
    {
        $tbgv = new M_Giao_Vien();
        return $tbgv->getTBGV();
    }
    public function sendHS($chu_de,$noi_dung)
    {
        $send = new M_Giao_Vien();
        return $send->sendHS($this->tai_khoan,$this->ten,$chu_de,$noi_dung);
    }
    public function getTBHS()
    {
        $tbgv = new M_Giao_Vien();
        return $tbgv->getTBHS();
    }
}
?>