<?php
ob_start();
session_start();
include ('controller/c_theloai.php');
$c_theloai = new c_theloai();
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
$idTL = $_GET['idTL'];

$delete = $c_theloai->DeleteTL($idTL);

header('location:listTheLoai.php')

?>