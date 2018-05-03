<?php  session_start(); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="doctitle" -->
<link rel="stylesheet" type="text/css" href="css/style-table.css"/>
<title>Văn bản năm 2017 | Hệ thống quản lý công văn, văn bản</title>
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
    	<?php
		
	  if(isset($_SESSION['user'])){ ?>
      
	    <div class="topnav">
          <a  href="index.php">Trang chủ</a>
          <a class="active" href="admin.php">Trang quản trị</a>
          <a href="updateDoc.php">Thêm công văn</a>
          <a href="changePassWord.php">Đổi mật khẩu</a>
          <a href="logout.php">Đăng xuất</a>
          <!--start search form-->
            <div class="form-search">
                <form id="form-search" name="form1" method="get" action="search_admin_nam2017.php">
                  <label>Tìm kiếm:</label>
                  <input type="text" name="txt-search" id="txt-search" />
                  <input type="submit" name="btn-search" id="btn-search" size="40" maxlength="40" value=" Tìm " />
                </form>
            </div>  
        <!--end search form-->   
		</div>
        <!--end menutop-->
		
		<?php
	  }else{
	  	?>
		<div class="topnav">
          <a class="active" href="index.php">Trang chủ</a>
          <a href="admin.php">Trang quản trị</a>
          <a href="#contact.php">Liên hệ</a>
          <a href="#about.php">Giới thiệu</a>
          <!--start search form-->
            <div class="form-search">
                <form id="form-search" name="form1" method="get" action="search_index_nam2017.php">
                  <label>Tìm kiếm:</label>
                  <input type="text" name="txt-search" id="txt-search" />
                  <input type="submit" name="btn-search" id="btn-search" size="40" maxlength="40" value=" Tìm " />
                </form>
            </div>  
        <!--end search form-->   
		</div>
        <!--end menutop-->
		<?php
	  }
	?>
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
        <?php 
			 if(isset($_SESSION['user'])){include_once "Table_admin_nam2017.php";}
			 else{
				 include_once "Table_index_nam2017.php";
				 } 
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
                <li>Số điện thoại: 01656 9871 140</li>
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
