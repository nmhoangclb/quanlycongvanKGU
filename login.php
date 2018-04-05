<?php 
	session_start(); 
    include_once 'connection.php';
    

	
//Lấy thông tin từ form đăng nhập
	$taikhoan = mysqli_escape_string($con, $_POST['taikhoan']);
	$matkhau = mysqli_escape_string($con, $_POST['matkhau']);
	$hash_pw = sha1($matkhau);


	$query = "SELECT * FROM accounts WHERE userName = N'". $taikhoan . "' AND passWord = N'". $hash_pw."'";
	//$show = "SELECT * FROM congvan";

	$result = mysqli_query($con, $query);
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
	


	
	// if($check){
	// 	echo "Đăng nhập thành công";
	// 	echo "<table border='1' >
	// 				<tr>
	// 					<th>Số hiệu</th>
	// 					<th>Ngày lập</th>
	// 					<th>Trích yêu nội dung</th>
	// 					<th>Văn bản</th>
	// 					<th colspan=2>Thao tác</th>
	// 				</tr>";

	// 	while($row = mysqli_fetch_array($resulShow))
	// 	{
	// 		echo "<tr>
	// 				<td>".$row['soHieu']."</td>"
	// 				."<td>".$row['ngayVanBan']."</td>"
	// 				."<td>".$row['noiDung']."</td>"
	// 				."<td>".$row['tapTin']."</td>"
	// 				."<td><input type='image' src='edit.png' alt='edit.png' width='32' height='32'></td>"
	// 				."<td><input type='image' src='delete.png' alt='delete.png' width='32' height='32'></td>"."</tr>";
			
	// 	}


	// }
	// else {
	// 	echo "Đăng nhập thất bại";
	// }



//đóng kết nối database
	mysqli_close($con);




 ?>