<?php 
	session_start(); 
	  if(isset($_SESSION['user'])){
	    header('Location: admin.php');
		exit();
	  }
	
    include_once "connections.php";
    

	
//Lấy thông tin từ form đăng nhập
	$taikhoan = mysqli_escape_string($conn, $_POST['taikhoan']);
	$matkhau = mysqli_escape_string($conn, $_POST['matkhau']);
	
	$hash_pw = sha1($matkhau);


	$query = "SELECT * FROM accounts WHERE userName = '". $taikhoan . "' AND passWord = '". $hash_pw."'";
	//$show = "SELECT * FROM congvan";

	$result = mysqli_query($conn, $query);
	$check = mysqli_num_rows($result);
	//$resulShow = mysqli_query($con, $show);

	if($check){

		while($row = mysqli_fetch_array($result)){
		$_SESSION['user'] = "admin";
				}
		header('Location: admin.php');
	}else{
		echo'<script>alert("Bạn đã nhập sai tài khoản hoặc mật khẩu! Vui lòng đăng nhập lại!");</script>';
		header('Location: login.html');
		}
	
//đóng kết nối database
	mysqli_close($conn);




 ?>