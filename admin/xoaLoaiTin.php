<?php
ob_start();
session_start();
include ('controller/c_loaitin.php');
$c_loaitin = new C_loaitin();
//print_r($dstheloai);


// Kiểm tra phân quyền đăng nhập
if(!isset($_SESSION['user_name'])){
	header('location:../index.php');
}else{
	if(isset($_SESSION['id_group']) == true){
		$id_group = $_SESSION['id_group'];
		if($id_group == '0'){
			header('location:../index.php');
		}
	}
}
$idLT = $_GET['idLT'];
$delete = $c_loaitin->DeleteLT($idLT);
header('location:listLoaiTin.php')

?>