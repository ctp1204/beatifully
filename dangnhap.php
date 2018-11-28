<?php
include 'controller/c_user.php';
$c_user = new C_user();
if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $c_user->c_dangnhap($email, md5($password));

    //print_r($user);die;
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

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION['user_error'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['user_error']."</div>";
                    }
                ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form method="POST" action="#">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<center><button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập
							</button></center>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

    <!--Footer-->
    <?php
        include 'footer1.php';
    ?>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>
    <style>
        .row.carousel-holder {
            margin-bottom: 95px;
            margin-top: 95px;
        }
        .panel-heading {
            text-align: center;
        }
        form {
            padding: 15px;
        }
    </style>
</body>

</html>
