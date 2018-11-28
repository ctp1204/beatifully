<?php
ob_start();
session_start();

include ('controller/c_loaitin.php');

$c_loaitin = new C_loaitin();
$getds = $c_loaitin->getDanhSach();
$getchitietLoaiTin = $c_loaitin->chitietLoaiTin();
// $getchitietTheLoai = $c_loaitin->chitietTheLoai();
// $getIdTheLoai = $getchitietTheLoai['getIdTheLoai'];
$getIdLoaiTin = $getchitietLoaiTin['getIdLoaiTin'];
$dstheloai = $getds['dstheloai'];

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
// Sửa loại tin

    if( isset($_POST["btnSua"]) ){
        $tentl = $_POST["tentl"];
        $tenlt = $_POST["tenlt"];
        $tenkhongdau = changeTitle($tenlt);
        $tenloaitin = $getIdLoaiTin->TenLoaiTin;
        if($_POST["tenlt"] == $tenloaitin){
            $_SESSION['erroredit'] = "Bị trùng tên thể loại củ";
        }
        else{
            $sualt = $c_loaitin->suaLT($tenlt,$tenkhongdau,$tentl);
            unset($_SESSION['erroredit']);
            header('location:listLoaiTin.php');
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
                            <li>
                                <i class="fa fa-fw fa-file"></i>  <a href="./listLoaiTin.php"> Loại Tin</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Sửa Loại Tin
                            </li>
                        </ol>
                        <?php
                            if(isset($_SESSION['erroredit'])){
                                echo "<div class ='alert alert-danger'>".$_SESSION['erroredit']."</div>";
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sửa Loại Tin</div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="">
                                <table align="center" class="table">
                                    <div>
                                        <label for="TenTL">Tên Thể Loại: </label>
                                        <select class="form-control" aria-describedby="basic-addon1" name="tentl" id="tentl">
                                                <option value="<?=$getIdLoaiTin->idTheLoai?>"><?=$getIdLoaiTin->TenTheLoai?></option>
                                                <?php
                                                foreach ($dstheloai as $dstl) {
                                                    ?>
                                                    <option value="<?=$dstl->id?>"><?=$dstl->Ten?></option>
                                                    <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="TenTL">Tên Loại Tin: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="tenlt" id="tenlt" value="<?=$getIdLoaiTin->TenLoaiTin?>" />
                                    </div>
                                        </br>
                                    <div>
                                        <input type="submit" class="btn btn-info active" name="btnSua" id="btnSua" value="Sửa" />
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
        <!-- /#page-wrapper -->

        <?php
            include 'layout/footer.php';
        ?>