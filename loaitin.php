<?php
session_start();
include ('controller/c_tintuc.php');
$c_tintuc = new C_tintuc();
$tintucs = $c_tintuc->loaitin();
$tintuc = $tintucs['danhmuctin'];
$menu = $tintucs['menu'];
$title=$tintucs['title'];
$alias = $tintucs ['alias'];
$thanh_phantrang = $tintucs['thanh_phantrang'];
//print_r($tintuc);
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
        <div class="row">
            <!-- menu -->
            <?php
                include 'menu.php';
            ?>
            <!-- end menu -->

            <div class="col-md-9" id="datasearch">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <small><?=$mn->Ten?> >> <?=$title->Ten?></small>

                        <h4><b><?=$title->Ten?></b></h4>
                    </div>
                    <?php
                    foreach ($tintuc as $tin) {
                       ?>
                       <div class="row-item row">
                        <div class="col-md-3">

                            <a href="chitiet.php?loai_tin=<?=$alias->TenKhongDau?>&alias=<?=$tin->TieuDeKhongDau?>&id_tin=<?=$tin->id?>">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$tin->Hinh?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?=$tin->TieuDe?></h3>
                            <p><?=$tin->TomTat?></p>
                            <a class="btn btn-primary" href="chitiet.php?loai_tin=<?=$alias->TenKhongDau?>&alias=<?=$tin->TieuDeKhongDau?>&id_tin=<?=$tin->id?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                       <?php
                    }
                    ?>

                    <!-- Pagination -->
                    <center><div class="thanh_phantrang"><?=$thanh_phantrang?></div></center>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

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
        
        $(document).ready(function(){
            $("#btnSearch").click(function(){
                var keyword = $('#txtSearch').val();
                $.post("timkiem.php",{tukhoa:keyword},function(data){
                    $('#datasearch').html(data);
                })
            })
        })

    </script>
</body>

</html>
