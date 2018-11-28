<?php
    include 'controller/c_user.php';

$c_user = new C_user();

if(isset($_POST['dangky'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['passwordAgain'];
    if($password == $repassword){
        $user = $c_user->dangkyTK($name,$email,$password);
    }else{
        $_SESSION['error'] = "Vui lòng nhập mật khẩu đúng mật khẩu";
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

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<div class ='alert alert-danger'>".$_SESSION['error']."</div>";
                    }
                ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form method="POST" action="#">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<center><button type="submit" name="dangky" class="btn btn-success">Đăng ký
							</button></center>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
    <!--Footer-->
    <?php
        include 'footer1.php';
    ?>
    <!--End Footer-->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>
    <style>
        .row.carousel-holder {
            margin-bottom: 12px;
            margin-top: 12px;
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
