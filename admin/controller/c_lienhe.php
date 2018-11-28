<?php
include ('model/m_lienhe.php');
include ('controller/convert.php');
include ('model/pager.php');
/**
* 
*/
	class C_lienhe
		{
			function getDanhSachLH(){

				$m_lienhe = new M_lienhe();
				$dslienhe = $m_lienhe->getDanhSachLienHe();
				return array('dslienhe'=>$dslienhe);
			}
			// Xóa liên hệ
			function DeleteLH($idLH){
				$m_xoa = new M_lienhe();
				$idLH = $_GET['idLH'];

				$id_lh = $m_xoa->xoaLienHe($idLH);
			}
			
		}
?>