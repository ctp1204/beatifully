<?php
ob_start();
session_start();

include ('controller/c_theloai.php');

$c_theloai = new C_theloai();
$theloai = $c_theloai->chitietTheLoai();
$getIdTheLoai = $theloai['getIdTheLoai'];
//$getds = $c_tintuc->getDanhSach();
//$dstheloai = $getds['dstheloai'];

//print_r($getIdTheLoai);


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
// Thêm thể loại

    if( isset($_POST["btnSua"]) ){
        $tentl = $_POST["tentl"];
        $tenkhongdau = changeTitle($tentl);
        $tentheloai = $getIdTheLoai->Ten;
        if($_POST["tentl"] == $tentheloai){
            $_SESSION['erroredit'] = "Bị trùng tên thể loại củ";
        }
        else{
            $suatl = $c_theloai->suaTL($tentl,$tenkhongdau);
            unset($_SESSION['erroredit']);
            header('location:listTheLoai.php');
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
                                <i class="fa fa-fw fa-file"></i>  <a href="./listTheLoai.php"> Thể Loại</a>
                            </li>
                            
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Sửa Thể Loai 
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
                        <div class="panel-heading">Sửa Thể Loại</div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="">
                                <table align="center" class="table">
                                    <div>
                                        <label for="TenTL">Tên Thể Loại: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="tentl" id="tentl" value="<?=$getIdTheLoai->Ten?>" />
                                    </div>
                                        </br>
                                    <div>
                                        <input type="submit" class="btn btn-info active" name="btnSua" id="btnThem" value="Sửa" />
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