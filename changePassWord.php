
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="doctitle" -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
      , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><?xml version="1.0" encoding="UTF-8" standalone="yes"?><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || '', table: table.innerHTML}
                var link = document.createElement("a");
                link.download = "congvan_export.xls";
                link.href = uri + base64(format(template, ctx));
                link.click();
            }
        })()

    </script>
<title>Đổi mật khẩu | Hệ thống quản lý công văn, văn bản</title>
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
                  <input type="text" class="txt-search" name="txt-search" id="txt-search" placeholder="Nhập từ khoá cần tìm ..." />
                  <input type="submit" class="btn-search" name="btn-search" id="btn-search" size="40" maxlength="40" value="Tìm kiếm" />
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
                    <input type="checkbox" checked />
                    <a href="#" data-toggle="dropdown">Tất cả văn bản</a>
                    <ul class="dropdown-menu">
                        <li><a href="nam2018.php">+ Năm 2018</a></li>
                        <li><a href="nam2017.php">+ Năm 2017</a></li>
                  	</ul>
                </li>
                <li class="dropdown">
                    <input type="checkbox" checked />
                    <a href="#" data-toggle="dropdown">Lĩnh vực</a>
                    <ul class="dropdown-menu">
                        <li><a href="yte.php">+ Y tế</a></li>
                        <li><a href="linhvuckhac.php">+ Các lĩnh vực khác</a></li>
                  	</ul>
                </li>
                <li class="dropdown" >
                    <input type="checkbox" checked />
                    <a href="#" data-toggle="dropdown">Cơ quan ban hành</a>
					<ul class="dropdown-menu">
                    	<li><a href="chinhphu.php">Chính phủ</a></li>
                        <li><a href="ubndtinh.php">UBND Tỉnh</a></li>
                        <li><a href="quochoi.php">Quốc hội</a></li>
                        <li><a href="soyte.php">Sở y tế</a></li>                    
					</ul>
                </li>
                <li class="dropdown">
                  <input type="checkbox" checked />
                  <a href="#" data-toggle="dropdown">Hình thức văn bản</a>
                  <ul class="dropdown-menu">
                    <li><a href="baocao.php">Báo cáo</a></li>
                    <li><a href="congvandieuhanh.php">Công văn điều hành</a></li>
                    <li><a href="nghiquyet.php">Nghị quyết</a></li>
                    <li><a href="giaymoi.php">Giấy mời</a></li>                    
                    <li><a href="thongbao.php">Thông báo</a></li>
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
    	<div class="footer-info">
            <ul>
                <li><a href="http://khoatttt.vnkgu.edu.vn/wps/portal">KHOA THÔNG TIN VÀ TRUYỀN THÔNG - TRƯỜNG ĐẠI HỌC KIÊN GIANG</a></li>
                <li>&copy <a href="https://fb.com/hoang10tn1">Nguyễn Minh Hoàng - A15TT</a></li>
                <li>Email: hoang1501106004@vnkgu.edu.vn | admin@quanlycongvankgu.tk</li>
                <li>Số điện thoại: 01656 987 140</li>
            </ul>
          </div>
          <div class="footer-counter">
          		<?php include_once 'counter/counter1.php'; ?>
                <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
                <script>
				// When the user scrolls down 20px from the top of the document, show the button
				window.onscroll = function() {scrollFunction()};
				
				function scrollFunction() {
					if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
						document.getElementById("myBtn").style.display = "block";
					} else {
						document.getElementById("myBtn").style.display = "none";
					}
				}
				
				// When the user clicks on the button, scroll to the top of the document
				function topFunction() {
					document.body.scrollTop = 0;
					document.documentElement.scrollTop = 0;
				}
				</script>
                
          </div>
    </div>
    <!--end footer-->
</div>

<!--end wrapper-->



</body>
<!-- InstanceEnd --></html>
