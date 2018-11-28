<?php
session_start();
include ('controller/c_lienhe.php');
$c_lienhe = new C_lienhe();
$lienhe = $c_lienhe->loaitin();

$menu = $lienhe['menu'];
//print_r($tintuc);

// Thêm tin tức

    if( isset($_POST["btnThem"]) ){

        $hovaten = $_POST["hovaten"];
        $email = $_POST["email"];
        $sdt = $_POST["sdt"];
        $tinnhan = $_POST["tinnhan"];
        if($_POST["hovaten"] == ''){
            $_SESSION['erroradd'] = "Nhập đẩy đủ tên để liên hệ với chúng tôi";
        }
        else{
            $lienhe = $c_lienhe->ThemLH($hovaten,$email,$sdt,$tinnhan);
            unset($_SESSION['erroradd']);
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
            <!-- menu -->
            <?php
                include 'menu.php';
            ?>
            <!-- end menu -->

            <div class="col-md-9" id="datasearch">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">

                        <h4><b>Liên Hệ</b></h4>
                    </div>
                    <div class="row">
                    <div class="panel panel-default">
                        <?php
                            if(isset($_SESSION['erroradd'])){
                                echo "<div class ='alert alert-danger'>".$_SESSION['erroradd']."</div>";
                            }else{
                                echo "<script>alert('Gửi liên hệ thành công. Chung tôi sẽ phản hồi bạn sau vài phút')</script>";
                            }
                        ?>
                        <div class="panel-heading">Liên Hệ Với Chúng Tôi</div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="">
                                <table align="center" class="table">
                                    <div>
                                        <label for="TenTL">Họ Và Tên: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="hovaten" id="hovaten" placeholder="Điền họ và tên" />
                                    </div>
                                    <div>
                                        <label for="TenTL">E-mail: </label>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="email" id="email" placeholder="Điền email đang sử dụng" />
                                    </div>
                                    <div>
                                        <label for="TenTL">Số Điện Thoại: </label>
                                        <input type="integer" class="form-control" aria-describedby="basic-addon1" name="sdt" id="sdt" placeholder="Điền số điện thoại" />
                                    </div>
                                    <div>
                                        <label for="TenTL">Tin Nhắn: </label>
                                        <textarea class="form-control" aria-describedby="basic-addon1" name="tinnhan" id="tinnhan" placeholder="Điền nội dung cần liên hệ"></textarea>
                                    </div>
                                        </br>
                                    <div>
                                        <input type="submit" class="btn btn-info active" name="btnThem" id="btnThem" value="Gửi Liên Hệ" />
                                    </div>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                    <!-- Pagination -->
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
