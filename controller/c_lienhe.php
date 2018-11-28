<?php
include ('model/m_lienhe.php');
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
			// Thêm liên hệ
			function ThemLH($ten,$email,$sdt,$tinnhan)
			{
				$m_lienhe = new M_lienhe();
				$id_them_lh = $m_lienhe->ThemLienHe($ten,$email,$sdt,$tinnhan);
			}
			// Menu
			function loaitin()
			{
				$m_lienhe = new M_lienhe();
 
				$menu = $m_lienhe->getMenu();

				return array('menu'=>$menu);
			}
			
		}
?>