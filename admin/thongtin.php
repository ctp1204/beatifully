<?php
ob_start();
session_start();
include ('controller/c_tintuc.php');
$c_tintuc = new C_tintuc();
$count = $c_tintuc->count();

$countTheLoai = $count['countTheLoai'];
$countLoaiTin = $count['countLoaiTin'];
$countTinTuc = $count['countTinTuc'];
//print_r($countTinTuc);


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
                        <h1 class="page-header">
                            Thông tin Website
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Thông tin Website
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info-circle"></i>  <strong>Website Tin Tức 24h</strong> Chào mừng <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link"><?=$_SESSION['user_name']?></a> đến với website của chúng tôi.
                        </div>
                        <ol class="breadcrumb">
                            <li class="active">
                                Ngày nay, website tin tức được xem là mô hình có tính phổ biến và đa dạng nhất bởi khả năng cập nhật đa dạng và xuất bản thông tin nhanh. Vì vậy, Thiết Kế Website Tin Tức rất phù hợp với các cơ quan, tổ chức muốn xây dựng cho mình một trang web để đưa tin tức tiếp cận người dùng internet,… Website tin tức cung cấp đầy đủ các tính năng cơ bản của một website như: quản lý quảng cảo, hỗ trợ tìm kiếm, thống kê, hệ thống bình chọn,…không giới hạn về kí tự, số lượng bài viết hay thời điểm đăng tải. Bên cạnh đó, trang web tin tức có tốc độ truy cập nhanh và rất thuận tiện cho người tìm kiếm.</br></br>
                            Để có được một trang web tin tức chuyên nghiệp nhất, nhiều ưu điểm nhất hãy đến với Bigweb của chúng tôi. Với đội ngũ lập trình viên giàu kinh nghiệm, và nỗ lực vươn tới vị trí của những công ty thiết kế web hàng đầu Việt Nam. Bigweb xin cam kết đem đến cho khách hàng một website tin tức ấn tượng về giao diện, hoàn hảo về chức năng cũng như phát triển những tính năng và ứng dụng mới dành diêng cho web tin tức:</br></br>
                                Tối ưu hóa cơ sở dữ liệu.
                                Giải pháp bộ nhớ đệm cho web tin tức khi có số lượng lớn người truy cập cùng một lúc.
                                Website được sử dụng các công nghệ trong thiết kế và code để load nhanh và tăng tính linh hoạt cho website.
                                Có hệ thống quản trị website chuyên nghiệp và đa chức năng nhằm giúp doanh nghiệp có thể thay đổi nội dung website, cập nhật thông tin mới, chỉnh sửa hoặc xóa.
                                Hệ quản trị có sự phân quyền để một doanh nghiệp chuyên nghiệp có thể phân công nhiệm vụ cập nhật tin tức theo chức năng.
                                Tích hợp tool editor cho phép người quản trị cập nhật nội dung ngay trên website mà không cần sử dụng thêm công cụ nào khác.
                                Cho phép người đọc đăng ký thành viên để chia sẻ thông tin, viết bài…
                            </li>
                        </ol>
                    </div>
                </div>

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
