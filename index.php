<?php
session_start();
include ('controller/c_tintuc.php');
$c_tintuc = new C_tintuc();
$noi_dung = $c_tintuc->index();

$slide = $noi_dung['slide'];
$menu = $noi_dung['menu'];
//print_r($menu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head.php';
    ?>

</head>
<body>

    <!-- Navigation -->
    <?php
        include 'header.php';
    ?>
    <!-- Page Content -->
    <div class="container">
        <!-- slider -->
        <?php
            include 'slider.php';
        ?>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <!-- menu -->
            <?php
                include 'menu.php';
            ?>
            <!-- end menu -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
                    </div>

                    <div class="panel-body">
                        <?php
                            foreach ($menu as $mn) {
                                ?>
                                <!-- item -->
                                <div class="row-item row">
                                    <h3>
                                        <a href="#"><?=$mn->Ten?></a> |
                                        <?php
                                        $loaitin = explode(',', $mn->LOAITIN);
                                        foreach ($loaitin as $loai) {
                                            list($id,$ten,$tenkhongdau)=explode(':', $loai)
                                            ?>
                                            <small><a href="loaitin.php?alias=<?=$tenkhongdau?>&id_loai=<?=$id?>"><i><?=$ten?></i></a>/</small>
                                            <?php
                                        }
                                        ?>
                                    </h3>
                                    <div class="col-md-12 border-right">
                                        <div class="col-md-3">
                                            <a href="chitiet.php?loai_tin=<?=$tenkhongdau?>&alias=<?=$mn->TieuDeTinKhongDau?>&id_tin=<?=$mn->idTin?>">
                                                <img class="img-responsive" src="public/image/tintuc/<?=$mn->HinhTin?>" alt="">
                                            </a>
                                        </div>

                                        <div class="col-md-9">
                                            <h3><?=$mn->TieuDeTin?></h3>
                                            <p><?=$mn->TomTatTin?></p>
                                            <a class="btn btn-primary" href="chitiet.php?loai_tin=<?=$tenkhongdau?>&alias=<?=$mn->TieuDeTinKhongDau?>&id_tin=<?=$mn->idTin?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>

                                    </div>

                                    <div class="break"></div>
                                </div>
                                <!-- end item -->
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
    <!-- Footer -->
    <?php
        include 'footer1.php';
    ?>
    <?php
        include 'scrollTop.php';
    ?>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>

    <script>
function myFunction() {
    var elmnt = document.getElementById("myDIV");
    elmnt.scrollLeft = 50;
    elmnt.scrollTop = 10;
}
</script>
</body>

</html>
