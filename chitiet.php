<?php
session_start();
include ('controller/c_tintuc.php');
$c_tintuc = new C_tintuc();
$tin = $c_tintuc->chitietTin();
$chitietTin = $tin['chitietTin'];
$comment = $tin['comment'];
$relatednews = $tin['relatednews'];
$tinnoibat = $tin['tinnoibat'];
//print_r($comment);

if(isset($_POST['binhluan'])){
    if(isset($_SESSION['id_user'])){
        $id_user = $_SESSION['id_user'];
        $id_tin = $_POST['id_tin'];
        $noidung = $_POST['noidung'];
        $comment = $c_tintuc->themBinhLuan($id_user,$id_tin,$noidung);
    }
    else{
        $_SESSION['chua_dang_nhap'] = "Vui lòng đăng nhập để thêm bình luận";
    }
}
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

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$chitietTin->TieuDe?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="public/image/tintuc/<?=$chitietTin->Hinh?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August <?=$chitietTin->updated_at?></p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?=$chitietTin->TomTat?></p>
                <p><?=$chitietTin->NoiDung?></p>
            
                <hr>

                <!-- Blog Comments -->
                <?php
                    if(isset($_SESSION['chua_dang_nhap'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['chua_dang_nhap']."</div>";;
                    }
                ?>
                
                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" method="POST" action="#">
                        <input type="hidden" name="id_tin" value="<?=$chitietTin->id?>">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                    foreach ($comment as $cmt) {
                        ?>
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <?php
                                        if(isset($cmt->idGroup)){
                                            $id_group_cmt = $cmt->idGroup;
                                            if($id_group_cmt == '0'){
                                                ?>
                                                <img id="icon-hinh" class="media-object" src="public\image\member.png" style="width: 50px;" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img id="icon-hinh" class="media-object" src="public\image\admin.png" style="width: 50px;" alt="">
                                                <?php
                                            }
                                        }
                                    ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?php
                                        if(isset($cmt->idGroup)){
                                            $id_group_cmt = $cmt->idGroup;
                                            if($id_group_cmt == '0'){
                                                ?>
                                                <small><?=$cmt->name?> [Thành Viên]</small>
                                                <?php
                                            }else{
                                                ?>
                                                <small><?=$cmt->name?> [Quản Trị Viên]</small>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                </h4>
                                <?=$cmt->created_at?>
                                <?=$cmt->NoiDung?>
                            </div>
                        </div>
                        <?php
                    }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        <?php
                            foreach ($relatednews as $related) {
                                ?>
                                <!-- item -->
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">
                                        <a href="chitiet.php?loai_tin=<?=$related->TenKhongDau?>&alias=<?=$related->TieuDeKhongDau?>&id_tin=<?=$related->id?>">
                                            <img class="img-responsive" src="public/image/tintuc/<?=$related->Hinh?>" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="chitiet.php?loai_tin=<?=$related->TenKhongDau?>&alias=<?=$related->TieuDeKhongDau?>&id_tin=<?=$related->id?>"><b><?=$related->TieuDe?></b></a>
                                    </div>
                                    <div class="break"></div>
                                </div>
                                <!-- end item -->
                                <?php
                            }
                        ?>
                        

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    <?php
                        foreach ($tinnoibat as $tnb) {
                            ?>
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="chitiet.php?loai_tin=<?=$tnb->TenKhongDau?>&alias=<?=$tnb->TieuDeKhongDau?>&id_tin=<?=$tnb->id?>">
                                        <img class="img-responsive" src="public/image/tintuc/<?=$tnb->Hinh?>" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="chitiet.php?loai_tin=<?=$tnb->TenKhongDau?>&alias=<?=$tnb->TieuDeKhongDau?>&id_tin=<?=$tnb->id?>"><b><?=$tnb->TieuDe?></b></a>
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

</body>

</html>
