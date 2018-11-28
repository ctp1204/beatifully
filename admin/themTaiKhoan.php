<?php
ob_start();
session_start();

include ('controller/c_tintuc.php');

$c_tintuc = new C_tintuc();

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
// Thêm Tài Khoản

    if( isset($_POST["btnThem"]) ){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($_POST["name"] == ''){
            $_SESSION['erroradd'] = "Nhập đầy đủ thông tin";
        }
        else{
            $themtk = $c_tintuc->themTK($name,$email,$password);
            unset($_SESSION['erroradd']);
            header('location:listTaiKhoan.php');
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
                        <h1 class="page-header">Danh Sách Tài Khoản</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Bảng Điều Khiển</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-file"></i>  <a href="./listTaiKhoan.php"> Tài Khoản</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Thêm Tài Khoản
                            </li>
                        </ol>
                        <?php
                            if(isset($_SESSION['erroradd'])){
                                echo "<div class ='alert alert-danger'>".$_SESSION['erroradd']."</div>";
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thêm Tài Khoản</div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="">
                                <table align="center" class="table">
                                    <div>
                                        <label for="TenTL">Họ Và Tên: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" id="name" placeholder="Điền họ và tên" />
                                    </div>
                                    <div>
                                        <label for="TenTL">Tên Tài Khoản: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="email" id="email" placeholder="Điền tên tài khoản" />
                                    </div>
                                    <div>
                                        <label for="TenTL">Mật Khẩu: </label>
                                        <input type="password" class="form-control" aria-describedby="basic-addon1" name="password" id="password" placeholder="Điền tên tài khoản" />
                                    </div>
                                        </br>
                                    <div>
                                        <input type="submit" class="btn btn-info active" name="btnThem" id="btnThem" value="Thêm" />
                                    </div>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
          <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>

        </div>
        <!-- /#page-wrapper -->

        <?php
            include 'layout/footer.php';
        ?>
    </body>
    </html>