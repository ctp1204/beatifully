<?php
include ('database.php');
class M_tintuc extends database
	{

		function getCountTheLoai(){
			$sql = "SELECT COUNT(id) as DemTL FROM theloai";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function getCountLoaiTin(){
			$sql = "SELECT COUNT(id) as DemLT FROM loaitin";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function getCountTinTuc(){
			$sql = "SELECT COUNT(id) as DemTT FROM tintuc";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function getDanhSachTheLoai(){
			$sql = "SELECT * FROM `theloai` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function getDanhSachLoaiTin(){
			$sql = "SELECT * FROM `loaitin` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function getDanhSachTinTuc(){
			$sql = "SELECT tt.*, tl.Ten AS TenTheLoai, lt.Ten AS TenLoaiTin FROM tintuc tt , theloai tl, loaitin lt WHERE lt.idTheLoai = tl.id AND tt.idLoaiTin = lt.id ORDER BY tt.id DESC LIMIT 0,20";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function getTaiKhoan(){
			$sql = "SELECT * FROM `users` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		
		function getDanhSachTL($idtl){
			$sql = "SELECT * FROM theloai WHERE id = $idtl"; 
			$this->setQuery($sql);
			$result = $this->execute(array($idtl));
		}
		// Trang quản trị
		// Thêm tin
		function themTinTuc($tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt){
			$sql = "INSERT INTO `tintuc`(`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `idLoaiTin`) VALUES (NULL,'$tentd','$tenkhongdau','$tomtat','$noidung','$hinh','$tinnoibat',$idlt)";
			$this->setQuery($sql);
			$result = $this->execute(array($tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		function getChiTietTinTuc($idtt){
			$sql = "SELECT tt.TieuDe AS TieuDeTin,tt.TieuDeKhongDau AS TieuDeKhongDauTin, tt.TomTat AS TomTatTin, tt.NoiDung AS NoiDungTin, tt.Hinh AS HinhTin, tt.NoiBat AS NoiBatTin,lt.id AS idLoaiTin, lt.Ten AS TenLoaiTin FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE tt.id = $idtt";
			$this->setQuery($sql);
			return $this->loadRow(array($idtt));
		}
		// Sửa tin tức
		function suaTinTuc($idtt,$tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt)
		{
			$sql = "UPDATE `tintuc` SET `TieuDe`='$tentd',`TieuDeKhongDau`='$tenkhongdau',`TomTat`='$tomtat',`NoiDung`='$noidung',`Hinh`='$hinh',`NoiBat`='$tinnoibat',`idLoaiTin`=$idlt WHERE `id`= $idtt";
			
			$this->setQuery($sql);
			$result = $this->execute(array($idtt,$tentd,$tenkhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$idlt));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		// Thêm tài khoản
		function themTaiKhoan($name,$email,$password)
		{
			//$sql = "INSERT INTO users(name,email,password) VALUES (?,?,?)";
			$sql = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `idGroup`) VALUES (NULL,?,?,?,0)";
			$this->setQuery($sql);
			$result = $this->execute(array($name,$email,md5($password)));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		
		// Xóa tin tức
		function xoaTinTuc($idTT)
		{
			$sql = "DELETE FROM tintuc WHERE id = $idTT"; 
			$this->setQuery($sql);
			$result = $this->execute(array($idTT));

		}
	}
?>