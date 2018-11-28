<?php
ob_start();
session_start();
include ('controller/c_theloai.php');

$c_theloai = new C_theloai();
$getdstl = $c_theloai->getDanhSachTL();
$dstheloai = $getdstl['dstheloai'];
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
                        <h1 class="page-header">Danh Sách Thể Loại</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Bảng Điều Khiển</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Thể Loại
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
                            <th scope="col">Tên Thể Loại</th>
                            <th scope="col">Tên Thể Loại_Không Dấu</th>
                            <th scope="col">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dstheloai as $dstl) {
                                
                        ?>
                        <tr>
                            <td><?=$dstl->id?></td>
                            <td><?=$dstl->Ten?></td>
                            <td><?=$dstl->TenKhongDau?></td>
                            <td><a class="btn btn-info active" href="suaTheLoai.php?id_theloai=<?=$dstl->id?>">Sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            -
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa không ? ')" href="xoaTheLoai.php?idTL=<?=$dstl->id?>">Xóa <i class="fa fa-trash-o" aria-hidden="true"></i></a>              
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table></td>
                </tr>
                </div>
          <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <script src="public/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="public/js/plugins/morris/raphael.min.js"></script>
    <script src="public/js/plugins/morris/morris.min.js"></script>
    <script src="public/js/plugins/morris/morris-data.js"></script>
</body></html>
