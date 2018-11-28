<?php
include ('model/m_tintuc.php');
include ('controller/convert.php');
include ('model/pager.php');
/**
* 
*/
	class C_tintuc
		{
			function count(){
				$m_tintuc = new M_tintuc();
				$countTheLoai = $m_tintuc->getCountTheLoai();
				$countLoaiTin = $m_tintuc->getCountLoaiTin();
				$countTinTuc = $m_tintuc->getCountTinTuc();
				
				return array('countTheLoai'=>$countTheLoai,'countLoaiTin'=>$countLoaiTin,'countTinTuc'=>$countTinTuc);
			}

			function getDanhSach(){
				$m_tintuc = new M_tintuc();
				$dstheloai = $m_tintuc->getDanhSachTheLoai();
				$dsloaitin = $m_tintuc->getDanhSachLoaiTin();
				$dstintuc = $m_tintuc->getDanhSachTinTuc();
				$dstaikhoan = $m_tintuc->getTaiKhoan();
				

				return array('dsloaitin'=>$dsloaitin,'dstheloai'=>$dstheloai,'dstintuc'=>$dstintuc,'dstaikhoan'=>$dstaikhoan);
			}
			function chitietTinTuc(){
				$id_tintuc = $_GET['id_tintuc'];
				$m_tintuc = new M_tintuc();
				$getIdTinTuc = $m_tintuc->getChiTietTinTuc($id_tintuc);
				return array('getIdTinTuc'=>$getIdTinTuc);
			}
			// Thêm tin tức
			function themTT($tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt){
				$m_them_tt = new M_tintuc();
				$id_them_tt = $m_them_tt->themTinTuc($tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt);
				if($id_them_tt>0){
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
			// Sửa tin tức
			function suaTT($tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt){
				$m_sua_tt = new M_tintuc();
				$id_tintuc = $_GET['id_tintuc'];
				$id_sua_tt = $m_sua_tt->suaTinTuc($id_tintuc,$tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt);
				if($id_sua_tt>0){
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
			// Thêm tài khoản
			function themTK($name,$email,$password){
				$m_them = new M_tintuc();
				$id_themtk = $m_them->themTaiKhoan($name,$email,$password);
				if($id_themtk>0){
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
			// Xóa tin tức
			function DeleteTT($idTT){
				$m_xoa = new M_tintuc();
				$idTT = $_GET['idTT'];

				$id_tt = $m_xoa->xoaTinTuc($idTT);
			}

		}
?>