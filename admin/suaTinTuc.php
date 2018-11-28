<?php
ob_start();
session_start();

include ('controller/c_tintuc.php');

$c_tintuc = new C_tintuc();

$getds = $c_tintuc->getDanhSach();
$getChiTietTin = $c_tintuc->chitietTinTuc();

$dsloaitin = $getds['dsloaitin'];
$getIdTinTuc = $getChiTietTin['getIdTinTuc'];
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

// Thêm tin tức

    if( isset($_POST["btnSua"]) ){

        $target_dir = "./public/image/tintuc/";
        $target_file = $target_dir+($_FILES["fileToUpload"]["name"]);
        $Hinh = $_FILES["fileToUpload"]["name"];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $tentd = $_POST["tentd"];
        $tentieude = $getIdTinTuc->TieuDeTin;
        $tenkhongdau = changeTitle($tentd);
        $tomtat = $_POST["tomtat"];
        $noidung = $_POST["noidung"];
        $tinnoibat = $_POST["tinnoibat"];
        $tenloaitin = $_POST["tenloaitin"];
        if($_POST["tentd"] == '$tentieude'){
            $_SESSION['erroradd'] = "Nhập đầy đủ thông tin";
        }
        else{
            $suatt = $c_tintuc->suaTT($tentd,$tenkhongdau,$tomtat,$noidung,$Hinh,$tinnoibat,$tenloaitin);
            unset($_SESSION['erroradd']);
            header('location:listTinTuc.php');
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
                        <h1 class="page-header">Danh Sách Tin Tức</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Bảng Điều Khiển</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="./listTinTuc.php"> Tin Tức</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Tin Tức
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
                        <div class="panel-heading">Thêm Tin Tức</div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
                                <table align="center" class="table">
                                    <div>
                                        <label for="TenTL">Tiêu Đề: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="tentd" id="tentd" value="<?=$getIdTinTuc->TieuDeTin?>" />
                                    </div>
                                    <div>
                                        <label for="TenTL">Tóm Tắt: </label>
                                        <textarea type="text" class="form-control" aria-describedby="basic-addon1" name="tomtat" id="tomtat" placeholder="Điền tóm tắt"><?=$getIdTinTuc->TomTatTin?></textarea>
                                    </div>
                                    <div>
                                        <label for="TenTL">Nội Dung: </label>
                                        <textarea name="noidung" id="noidung"><?=$getIdTinTuc->NoiDungTin?></textarea>
                                        <script>CKEDITOR.replace('noidung');</script>
                                    </div>
                                   <div>
                                        <label for="TenTL">Hình Ảnh: </label>
                                        <label for="fileToUpload"></label>
                                        <input type="file" name="fileToUpload" id="fileToUpload" />
                                        <img id="hinh-anh-sua" src="public/image/tintuc/<?=$getIdTinTuc->HinhTin?>"/>
                                        <?=$getIdTinTuc->HinhTin?>
                                    </div>
                                    <div>
                                        <label for="TenTL">Tin Nổi Bật: </label>
                                        </br>
                                        <label>
                                          <input <?php if($getIdTinTuc->NoiBatTin == 1) echo "checked='checked'" ?> type="radio" name="tinnoibat" value="1" id="tinnoibat_0" />
                                          Tin Nổi Bật</label>
                                        <br />
                                        <label>
                                          <input <?php if($getIdTinTuc->NoiBatTin == 0) echo "checked='checked'" ?> type="radio" name="tinnoibat" value="0" id="tinnoibat_1" />
                                          Tin Thường</label>
                                    </div>
                                    <div>
                                        <label for="TenTL">Tên Loại Tin: </label>
                                        <select class="form-control" aria-describedby="basic-addon1" name="tenloaitin" id="tenloaitin">
                                            <option value="<?=$getIdTinTuc->idLoaiTin?>"><?=$getIdTinTuc->TenLoaiTin?></option>
                                            <?php
                                            foreach ($dsloaitin as $dslt) {
                                                ?>
                                                <option value="<?=$dslt->id?>"><?=$dslt->Ten?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
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
