<?php
include ('database.php');
class M_lienhe extends database
	{
		function getDanhSachLienHe(){
			$sql = "SELECT * FROM `lienhe` ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function xoaLienHe($idLH){
			$sql = "DELETE FROM lienhe WHERE id = $idLH"; 
			$this->setQuery($sql);
			$result = $this->execute(array($idLH));
		}
	}
?>