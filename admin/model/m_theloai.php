<?php
include ('database.php');
class M_theloai extends database
	{
		// Hiển thị danh sách
		function getDanhSachTheLoai(){
			$sql = "SELECT * FROM `theloai` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		// Trang quản trị
		// Thêm Thể Loại
		function themTheLoai($tentl,$tenkhongdau)
		{
			$sql = "INSERT INTO `theloai` (`id`, `Ten`, `TenKhongDau`) VALUES (NULL, '$tentl', '$tenkhongdau')";
			$this->setQuery($sql);
			$result = $this->execute(array($tentl,$tenkhongdau));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}

		function getChiTietTheLoai($id){
			$sql = "SELECT * FROM theloai WHERE id = $id";
			$this->setQuery($sql);
			return $this->loadRow(array($id));
		}
		// Sửa Thể Loại
		function suaTheLoai($idtl,$tentl,$tenkhongdau){
			$sql= "UPDATE theloai SET Ten = '$tentl', TenKhongDau = '$tenkhongdau' WHERE id = $idtl";
			$this->setQuery($sql);
			$result = $this->execute(array($idtl,$tentl,$tenkhongdau));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
		
		// Xóa Thể Loại

		function xoaTheLoai($idTL)
		{
			$sql = "DELETE FROM theloai WHERE id = $idTL"; 
			$this->setQuery($sql);
			$result = $this->execute(array($idTL));

		}
	}
?>