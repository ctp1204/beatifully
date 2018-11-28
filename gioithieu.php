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

                        <h4><b>Giới Thiệu</b></h4>
                    </div>
                    <div class="row">
                    <h3>Sắc Đẹp Bác Sĩ Nhỏ Mang Lại Vẻ Đẹp Vĩnh Hằng</h3>

<p>Phụ nữ sinh ra vốn dĩ là một kiệt tác của tạo hóa tuy nhiên vẻ đẹp của bản thân chúng ta dễ bị mai mọt theo thời gian, yếu tố ngoại cảnh của bộn bề của cuộc sống mà chúng ta quên hoặc ít có cơ hội chăm sóc bản thân mình. Sắc Đẹp – Bác Sĩ Nhỏ với những chuyên viên kiến thức chuyên môn hàng đầu của BSN sẽ tư vấn và chọn mỹ phẩm tốt nhất trong việc khôi phục làm đẹp và tái tạo da.</p>
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
