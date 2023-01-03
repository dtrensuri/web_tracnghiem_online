<?php

include_once ('db.php');
class M_Admin extends Database
{

    public function login($tai_khoan,$mat_khau)
    {
    	$sql = "SELECT * FROM admin WHERE tai_khoan='$tai_khoan' and mat_khau = '$mat_khau'";
    	// $this->setQuery($sql);
		return $this->loadRow($sql);
    }
    public function getQuyen($chuc_vu)
    {
    	$sql = "SELECT mo_ta FROM quyen WHERE chuc_vu='$chuc_vu'";
    	// $this->setQuery($sql);
    	return $this->loadRow($sql);
    }
    public function getDSA()
    {
        $sql = "SELECT * FROM admin";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function editAdmin($id_admin,$tai_khoan,$mat_khau,$ten)
    {
        $sql="UPDATE admin set tai_khoan='$tai_khoan', mat_khau='$mat_khau', ten ='$ten' where id_admin='$id_admin'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function delAdmin($id_admin)
    {
        $sql="DELETE FROM admin where id_admin='$id_admin'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function addAdmin($tai_khoan,$mat_khau,$ten)
    {
        $sql="INSERT INTO admin (tai_khoan,mat_khau,ten,chuc_vu) VALUES ('$tai_khoan','$mat_khau','$ten',1)";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getDSGV()
    {
        $sql = "SELECT * FROM giao_vien";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function editGV($id_gv,$tai_khoan,$mat_khau,$ten)
    {
        $sql="UPDATE giao_vien set tai_khoan='$tai_khoan', mat_khau='$mat_khau', ten ='$ten' where id_gv='$id_gv'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function delGV($id_gv)
    {
        $sql="DELETE FROM giao_vien where id_gv='$id_gv'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function addGV($tai_khoan,$mat_khau,$ten)
    {
        $sql="INSERT INTO giao_vien (tai_khoan,mat_khau,ten,chuc_vu) VALUES ('$tai_khoan','$mat_khau','$ten',2)";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getDSHS()
    {
        $sql = "SELECT * FROM hoc_sinh";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function editHS($id_hs,$tai_khoan,$mat_khau,$ten,$id_lop)
    {
        $sql="UPDATE hoc_sinh set tai_khoan='$tai_khoan', mat_khau='$mat_khau', ten ='$ten', id_lop ='$id_lop' where id_hs='$id_hs'";
        // $this->setQuery($sql);
        $this->loadRow($sql);
        $sql="UPDATE diem set id_lop ='$id_lop'  where id_hs='$id_hs'";
        // $this->setQuery($sql);
        $this->loadRow($sql);
    }
    public function delHS($id_hs,$id_lop)
    {
        $sql="DELETE FROM diem where id_hs='$id_hs' and id_lop = '$id_lop'";
        // $this->setQuery($sql);
        $this->loadRow($sql);
        $sql="DELETE FROM hoc_sinh where id_hs='$id_hs'";
        // $this->setQuery($sql);
        $this->loadRow($sql);
    }
    public function addDiem($id_hs,$id_lop)
    {
        $sql="INSERT INTO diem (id_hs,unit_1,unit_2,unit_3,unit_4,id_lop) VALUES ('$id_hs',-1,-1,-1,-1,'$id_lop')";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function addHS($tai_khoan,$mat_khau,$ten,$id_lop)
    {
        $sql = "ALTER TABLE `hoc_sinh` AUTO_INCREMENT=1";
        // $this->setQuery($sql);
        $this->loadRow($sql);
        $sql="INSERT INTO hoc_sinh (tai_khoan,mat_khau,ten,chuc_vu,id_lop) VALUES ('$tai_khoan','$mat_khau','$ten',3,'$id_lop')";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getTenLop($id_lop)
    {
        $sql = "SELECT ten_lop from lop where id_lop = '$id_lop'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getDSL()
    {
        $sql = "SELECT * FROM lop";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function editLop($id_lop,$id_khoi,$ten_lop,$id_gv)
    {
        $sql="UPDATE lop set id_khoi='$id_khoi', ten_lop='$ten_lop', id_gv ='$id_gv'  where id_lop ='$id_lop'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function delLop($id_lop)
    {
        $sql="DELETE FROM lop where id_lop='$id_lop'";
        // $this->setQuery($sql);
            return $this->loadRow($sql);
    }
    public function addLop($id_khoi,$ten_lop,$id_gv)
    {
        $sql="INSERT INTO lop (id_khoi,ten_lop,id_gv) VALUES ('$id_khoi','$ten_lop','$id_gv')";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getTenKhoi($id_khoi)
    {
        $sql = "SELECT mo_ta from khoi where id_khoi = '$id_khoi'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getKhoi()
    {
        $sql = "SELECT * from khoi";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function getTenGV($id_gv)
    {
        $sql = "SELECT ten from giao_vien where id_gv = '$id_gv'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getDSCH()
    {
        $sql = "SELECT * FROM cau_hoi";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function editCH($id_cauhoi,$cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $sql="UPDATE cau_hoi set cau_hoi='$cau_hoi', id_khoi='$id_khoi', unit ='$unit',da_1 ='$da_1',da_2 ='$da_2',da_3 ='$da_3',da_4 ='$da_4',da_dung ='$da_dung' where id_cauhoi='$id_cauhoi'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function delCH($id_cauhoi)
    {
        $sql="DELETE FROM cau_hoi where id_cauhoi='$id_cauhoi'";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function addCH($cau_hoi,$id_khoi,$unit,$da_1,$da_2,$da_3,$da_4,$da_dung)
    {
        $sql="INSERT INTO cau_hoi (id_khoi,unit,cau_hoi,da_1,da_2,da_3,da_4,da_dung) VALUES ($id_khoi,$unit,'$cau_hoi','$da_1','$da_2','$da_3','$da_4','$da_dung')";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function sendGV($tai_khoan,$ten,$chu_de,$noi_dung)
    {
        $sql="INSERT INTO thong_bao (tai_khoan,ten,chu_de,noi_dung,thoi_gian,chuc_vu) VALUES ('$tai_khoan','$ten','$chu_de','$noi_dung',NOW(),2)";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getTBGV()
    {
        $sql = "SELECT * FROM thong_bao where chuc_vu = 2";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
    public function sendHS($tai_khoan,$ten,$chu_de,$noi_dung)
    {
        $sql="INSERT INTO thong_bao (tai_khoan,ten,chu_de,noi_dung,thoi_gian,chuc_vu) VALUES ('$tai_khoan','$ten','$chu_de','$noi_dung',NOW(),3)";
        // $this->setQuery($sql);
        return $this->loadRow($sql);
    }
    public function getTBHS()
    {
        $sql = "SELECT * FROM thong_bao where chuc_vu = 3";
        // $this->setQuery($sql);
        return $this->loadRows($sql);
    }
}
?>