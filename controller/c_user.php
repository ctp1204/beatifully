<?php
	session_start();
	include 'model/m_user.php';

	/**
	* 
	*/
	class C_user
	{
		
		function dangkyTK($name,$email,$password)
		{
			$m_user = new M_user();
			$id_user = $m_user->dangky($name,$email,$password);
			if($id_user>0){
				$_SESSION['success'] = "Đăng ký thành công";
				header('location:index.php');
				if(isset($_SESSION['error'])){
					unset($_SESSION['error']);
				}
			}else{
				$_SESSION['error'] = "Đăng ký không thành công. Email này đã được sử dụng";
				header('location:dangky.php');
				
			}
		}
		public function c_dangnhap($email,$password){
			$m_user = new M_user();
			$user = $m_user->dangnhap($email,$password);
			if($user == true){
				$_SESSION['user_name'] = $user->name;
				$_SESSION['id_group'] = $user->idGroup;
				$_SESSION['id_user'] = $user->id;
				header('location:index.php');
				if(isset($_SESSION['user_error'])){
					unset($_SESSION['user_error']);
				}
				if(isset($_SESSION['chua_dang_nhap'])){
					unset($_SESSION['chua_dang_nhap']);
				}
			}else{
				$_SESSION['user_error'] = "Sai thông tin đăng nhập";
				header('location:dangnhap.php');
			}
		}

		function dangxuat(){
			session_destroy();
			header('location:'.$_SERVER['HTTP_REFERER']);
		}	
	}
?>