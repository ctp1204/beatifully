<?php
include ('database.php');
class M_loaitin extends database
	{
		// Hiển thị danh sách
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
		// Trang quản trị
		// Thêm Thể Loại
		function themLoaiTin($idtheloai,$tenlt,$tenkhongdau)
		{
			$sql = "INSERT INTO `loaitin`(`id`, `idTheLoai`, `Ten`, `TenKhongDau`) VALUES (NULL, '$idtheloai', '$tenlt', '$tenkhongdau')";
			$this->setQuery($sql);
			$result = $this->execute(array($idtheloai,$tenlt,$tenkhongdau));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		function getChiTietLoaiTin($idlt){
			$sql = "SELECT lt.id AS idLoaiTin, lt.Ten AS TenLoaiTin, lt.TenKhongDau AS TenKhongDau,tl.id AS idTheLoai, tl.Ten AS TenTheLoai FROM loaitin lt INNER JOIN theloai tl ON lt.idTheLoai = tl.id WHERE lt.id = $idlt";
			$this->setQuery($sql);
			return $this->loadRow(array($idlt));
		}
		function getChiTietTheLoai($idtl){
			$sql = "SELECT * FROM theloai WHERE id = $idtl";
			$this->setQuery($sql);
			return $this->loadRow(array($idtl));
		}
		// Sửa Thể Loại
		function suaLoaiTin($idlt,$tenlt,$tenkhongdau,$idtl)
		{
			$sql= "UPDATE `loaitin` SET `idTheLoai`= '$idtl',`Ten`='$tenlt',`TenKhongDau`='$tenkhongdau' WHERE `id`= '$idlt'";
			$this->setQuery($sql);
			$result = $this->execute(array($idlt,$tenlt,$tenkhongdau,$idtl));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		// Xóa Thể Loại
		function xoaLoaiTin($idLT)
		{
			$sql = "DELETE FROM loaitin WHERE id = $idLT"; 
			$this->setQuery($sql);
			$result = $this->execute(array($idLT));

		}
	}
?>