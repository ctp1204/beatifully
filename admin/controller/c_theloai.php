<?php
include ('model/m_theloai.php');
include ('controller/convert.php');
include ('model/pager.php');
/**
* 
*/
	class C_theloai
		{
			function getDanhSachTL(){

				$m_theloai = new M_theloai();
				$dstheloai = $m_theloai->getDanhSachTheLoai();
				return array('dstheloai'=>$dstheloai);
			}
			function chitietTheLoai(){
				$id_theloai = $_GET['id_theloai'];
				$m_theloai = new M_theloai();
				$getIdTheLoai = $m_theloai->getChiTietTheLoai($id_theloai);
				return array('getIdTheLoai'=>$getIdTheLoai);
			}
			function ThemTL($tentl,$tenkhongdau)
			{
				$m_them = new M_theloai();
				$id_them_tl = $m_them->themTheLoai($tentl,$tenkhongdau);
				if($id_them_tl>0){
					$_SESSION['success'] = "Thêm thành công";
					header('location:index.php');
					if(isset($_SESSION['erroradd'])){
						unset($_SESSION['erroradd']);
					}
				}
			}

			function suaTL($tentl,$tenkhongdau){
				$m_sua = new M_theloai();
				$id_theloai = $_GET['id_theloai'];
				$id_sua_tl = $m_sua->suaTheLoai($id_theloai,$tentl,$tenkhongdau);
				if($id_sua_tl>0){
					$_SESSION['success'] = "Thêm thành công";
					header('location:index.php');
					if(isset($_SESSION['erroredit'])){
						unset($_SESSION['erroredit']);
					}
				}
			}
			function DeleteTL($idTL){
				$m_xoa = new M_theloai();
				$idTL = $_GET['idTL'];

				$id_tl = $m_xoa->xoaTheLoai($idTL);
			}
		}
?>