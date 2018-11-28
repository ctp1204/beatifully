<?php
ob_start();
session_start();
include ('controller/c_tintuc.php');
$c_tintuc = new C_tintuc();
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
$idTT = $_GET['idTT'];

$delete = $c_tintuc->DeleteTT($idTT);

header('location:listTinTuc.php')

?>