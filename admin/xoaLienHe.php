<?php
ob_start();
session_start();
include ('controller/c_lienhe.php');
$c_lienhe = new C_lienhe();
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
$idLH = $_GET['idLH'];

$delete = $c_lienhe->DeleteLH($idLH);

header('location:listLienHe.php')

?>