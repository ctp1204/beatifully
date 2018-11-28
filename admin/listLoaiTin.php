<?php
ob_start();
session_start();
include ('controller/c_loaitin.php');

$c_loaitin = new C_loaitin();
$getds = $c_loaitin->getDanhSach();

$dsloaitin = $getds['dsloaitin'];
//print_r($dsloaitin);


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
?>
<!DOCTYPE html>
<html lang="en"><head>

    <?php
        include 'layout/head.php';
    ?>

</head>

<body style="">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php
            	include 'layout/header.php';
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                include 'layout/menu.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Loại Tin</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Bảng Điều Khiển</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Loại Tin
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <tr>
                    <td><table class="table table-bordered table-striped">
                      <thead>
                        <tr class="menu-table">
                            <th scope="col">ID</th>
                            <th scope="col">Tên Loại Tin</th>
                            <th scope="col">Tên Loại Tin Không Dấu</th>
                            <th scope="col">ID Thể Loại</th>
                            <th scope="col">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dsloaitin as $dslt) {
                                
                        ?>
                        <tr>
                            <td><?=$dslt->id?></td>
                            <td><?=$dslt->Ten?></td>
                            <td><?=$dslt->TenKhongDau?></td>
                            <td><?=$dslt->idTheLoai?></td>
                            <td><a class="btn btn-info active" href="suaLoaiTin.php?id_loaitin=<?=$dslt->id?>">Sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            -
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa không ? ')" href="xoaLoaiTin.php?idLT=<?=$dslt->id?>">Xóa <i class="fa fa-trash-o" aria-hidden="true"></i></a>              </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table></td>
                </tr>
                </div>
          <!-- /.row -->

            <?php
                include 'layout/footer.php';
            ?>
