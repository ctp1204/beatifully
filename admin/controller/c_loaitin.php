<?php
include ('model/m_loaitin.php');
include ('controller/convert.php');
include ('model/pager.php');
/**
* 
*/
	class C_loaitin
		{

			function getDanhSach(){
				$m_loaitin = new M_loaitin();
				$dsloaitin = $m_loaitin->getDanhSachLoaiTin();	
				$dstheloai = $m_loaitin->getDanhSachTheLoai();			

				return array('dsloaitin'=>$dsloaitin,'dstheloai'=>$dstheloai);
			}
			function chitietLoaiTin(){
				$id_loaitin = $_GET['id_loaitin'];
				$m_loaitin = new M_loaitin();
				$getIdLoaiTin = $m_loaitin->getChiTietLoaiTin($id_loaitin);
				return array('getIdLoaiTin'=>$getIdLoaiTin);
			}
			function chitietTheLoai(){
				$id_theloai = $_GET['id_theloai'];
				$m_loaitin = new M_loaitin();
				$getIdTheLoai = $m_loaitin->getChiTietTheLoai($id_theloai);
				return array('getIdTheLoai'=>$getIdTheLoai);
			}
			// Thêm loại tin
			function ThemLT($idtheloai,$tenlt,$tenkhongdau)
			{
				$m_them = new M_loaitin();
				$id_them_lt = $m_them->themLoaiTin($idtheloai,$tenlt,$tenkhongdau);
				if($id_them_lt>0){
					$_SESSION['success'] = "Thêm thành công";
					header('location:index.php');
					if(isset($_SESSION['error'])){
						unset($_SESSION['error']);
					}
				}else{
					$_SESSION['error'] = "Thêm không thành công";
					header('location:'.$_SERVER['HTTP_REFERER']);
					
				}
			}
			// Sửa loại tin
			// function suaLT($tenlt,$tenkhongdau,$idtl){
			// 	$m_sua = new M_loaitin();
			// 	$id_loaitin = $_GET['id_loaitin'];
			// 	$id_sua_lt = $m_sua->suaLoaiTin($id_loaitin,$tenlt,$tenkhongdau,$idtl);
			// 	if($id_sua_lt>0){
			// 		$_SESSION['success'] = "Thêm thành công";
			// 		header('location:index.php');
			// 		if(isset($_SESSION['erroredit'])){
			// 			unset($_SESSION['erroredit']);
			// 		}
			// 	}
			// }
			function suaLT($tenlt,$tenkhongdau,$idtl){
				$m_sua = new M_loaitin();
				$id_loaitin = $_GET['id_loaitin'];
				$id_sua_tl = $m_sua->suaLoaiTin($id_loaitin,$tenlt,$tenkhongdau,$idtl);
				if($id_sua_tl>0){
					$_SESSION['success'] = "Thêm thành công";
					header('location:index.php');
					if(isset($_SESSION['erroredit'])){
						unset($_SESSION['erroredit']);
					}
				}
			}
			// Xóa loại tin
			function DeleteLT($idLT){
				$m_xoa = new M_loaitin();
				$idLT = $_GET['idLT'];

				$id_lt = $m_xoa->xoaLoaiTin($idLT);
			}

		}
?>