<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<script>
		function gotoback() {
		window.location.assign("admin.php");
		}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
	function done (){
		alert("Thay đổi mật khẩu thành công!");
		}
</script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->




</head>

<body>
<div  class="wrapper">
	<!--start header--> <!-- -->	
	<div class="header" id="header">
		<a href="index.php"><img src="images/logo.png" width="1000" height="140" alt="logo.png" /></a>
	<!-- InstanceBeginEditable name="MenuTop" -->
    	<!--Start menutop-->
		<div class="topnav">
          <a href="index.php">Trang chủ</a>
          <a href="admin.php">Trang quản trị</a>
          <a href="updateDoc.php">Thêm công văn</a>
          <a class="active" href="changePassWord.php">Đổi mật khẩu</a>
          <a href="logout.php">Đăng xuất</a>
          <!--start search form-->
            <div class="form-search">
                <form id="form-search" name="form1" method="get" action="">
                  <label>Tìm kiếm:</label>
                  <input type="text" name="txt-search" id="txt-search" />
                  <input type="submit" name="btn-search" id="btn-search" size="40" maxlength="40" value="Tìm kiếm" />
                </form>
            </div>  
        <!--end search form-->   
		</div>
        <!--end menutop-->
	<!-- InstanceEndEditable -->	
         
        
   	  
	</div>
    <!--end header-->
	<!--start content-->
    <div class="content">
    	<!--start menu left-->
    	<div class="Menu-left">
			<div class="container">  
              <ul>
              	<li class="dropdown">
                    <input type="checkbox" />
                    <a href="#" data-toggle="dropdown">Tất cả văn bản</a>
                    <ul class="dropdown-menu">
                        <li><a href="nam2018.php">+ Năm 2018</a></li>
                        <li><a href="nam2017.php">+ Năm 2017</a></li>
                  	</ul>
                </li>
                <li class="dropdown">
                    <input type="checkbox"/>
                    <a href="#" data-toggle="dropdown">Lĩnh vực</a>
                    <ul class="dropdown-menu">
                        <li><a href="yte.php">+ Y tế</a></li>
                        <li><a href="linhvuckhac.php">+ Các lĩnh vực khác</a></li>
                  	</ul>
                </li>
                <li class="dropdown" >
                    <input type="checkbox"/>
                    <a href="#" data-toggle="dropdown">Cơ quan ban hành</a>
					<ul class="dropdown-menu">
                        <li><a href="#">UBND Tỉnh</a></li>
                        <li><a href="#">Chính phủ</a></li>
                        <li><a href="#">Sở y tế</a></li>                    
					</ul>
                </li>
                <li class="dropdown">
                  <input type="checkbox" checked />
                  <a href="#" data-toggle="dropdown">Hình thức văn bản</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Văn bản chỉ đạo điều hành</a></li>
                    <li><a href="#">Nghị quyết</a></li>
                    <li><a href="#">Thông báo</a></li>
                    <li><a href="#">Giấy mời</a></li>
                  </ul>
                </li>
              </ul>
            </div>            		
        </div>
		<!--end menu left-->
        <!--star content right-->
		<div class="content-right">
		<!-- InstanceBeginEditable name="main-content" -->
        <p style="text-align: center;color: blue; font-size: 35px;">Thay đổi mật khẩu</p>
        <form action="changePassWord.php" method="post">
        <table class="table-change-pw">
        	<tr>
            	<td><label>Tên tài khoản:</label></td>
                <td><input type="text" name="username" id="username" size="50" maxlength="20" value="admin" /></td>
            </tr>
            <tr>
            	<td><label>Mật khẩu hiện tại:</label></td>
                <td><input type="password" name="oldpassword" id="oldpassword" size="50" maxlength="20" placeholder="Nhập mật khẩu cũ tại đây.." required autofocus="autofocus" /></td>
            </tr>
            <tr>
            	<td><label>Mật khẩu mới:</label></td>
                <td><input type="password" name="newpassword" id="newpassword" size="50" maxlength="20" placeholder="Nhập mật khẩu mới tại đây.." required /></td>
            </tr>
            <tr>
            	<td><label>Nhập lại mật khẩu mới:</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password" size="50" maxlength="20" placeholder="Nhập lại mật khẩu mới tại đây.." required /><span id='message'></span></td>
            </tr>
            <tr>
            	<td>
                	<input type="submit" name="change" value="Đổi mật khẩu" />
                	<input type="reset" name="reset" value="Reset" />
        			<input type="button" onclick="gotoback()" value="Quay lại" ></td>
                </td>
                
            </tr>
        </table>
        </form>
        <?php 
		include_once "connections.php";
		if(isset($_POST['change'])){
			$username = $_POST['username'];
			$oldpassword = $_POST['oldpassword'];
			$oldpassword = sha1($oldpassword);
			$newpassword = $_POST['newpassword'];
			$confirm_password = $_POST['confirm_password'];
			$sql = " SELECT * FROM accounts WHERE userName = '$username' AND passWord = '$oldpassword'";
			//echo "<p>username:$username</p> hihihihih <p>oldpass:$oldpassword</p><p>newpass:$newpassword</p>";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			$check = mysqli_num_rows($result);
			
			if($check && $confirm_password != $newpassword){
				echo'<script>alert("Mật khẩu mới không trùng nhau!");</script>';
				echo "<meta http-equiv='refresh' content='0;URL=\"changePassWord.php\"'>";
				}
			elseif($check && $confirm_password == $newpassword){
				$newpassword = sha1($newpassword);
				$queryChange = " UPDATE accounts
				SET passWord = '$newpassword' 
				WHERE userName = '$username'";
				mysqli_query($conn, $queryChange);
				echo'<script>alert("Bạn đã đổi tài khoản thành công!");</script>';
				}
			else{
				echo'<script>alert("Bạn đã nhập sai mật khẩu! Vui lòng nhập lại!");</script>';
				echo "<meta http-equiv='refresh' content='0;URL=\"changePassWord.php\"'>";
				}
		
		//echo $username."br".$oldpassword."br".$newpassword."br". $id."br".$check;
		}
		mysqli_close($conn);
		?>
		<!-- InstanceEndEditable -->
        </div>
        <!--end content right-->
    </div>
	<!--end content-->
    <!--start footer-->
    <div class="footer">
    	<ul>
        	<li>&copy <a href="https://fb.com/hoang10tn1">Nguyễn Minh Hoàng</a></li>
            <li>Đơn vị: Đại học Kiên Giang</li>
            <li>Email: hoang1501106004@vnkgu.edu.vn</li>
            <li>Số điện thoại: 01656 9871 140</li>
        </ul>
    </div>
    <!--end footer-->
</div>

<!--end wrapper-->



</body>
<!-- InstanceEnd --></html>
