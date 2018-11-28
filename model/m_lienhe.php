<?php
include ('database.php');
class M_lienhe extends database
	{
		function getDanhSachLienHe(){
			$sql = "SELECT * FROM `lienhe` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		//Menu
		function getMenu()
		{
			$sql = "SELECT tl.*, GROUP_CONCAT(Distinct lt.id,':',lt.Ten,':',lt.TenKhongDau) AS LOAITIN, tt.id as idTin, tt.TieuDe as TieuDeTin, tt.Hinh as HinhTin, tt.TomTat as TomTatTin, tt.TieuDeKhongDau as TieuDeTinKhongDau FROM theloai tl INNER JOIN loaitin lt ON lt.idTheLoai = tl.id INNER JOIN tintuc tt ON tt.idLoaiTin=lt.id GROUP BY tl.id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		// Thêm liên hệ
		function ThemLienHe($ten,$email,$sdt,$tinnhan){
			$sql = "INSERT INTO `lienhe`(`id`, `Ten`, `Email`, `SoDienThoai`, `TinNhan`) VALUES (NULL,'$ten','$email','$sdt','$tinnhan')";
			$this->setQuery($sql);
			$result = $this->execute(array($ten,$email,$sdt,$tinnhan));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}
		}
	}
?>