	<?php session_start(); ?>
	<?php

	  if(isset($_SESSION['user'])){
	    // header('Location: admin.php');
	    // exit();
	  }else{
	  	header('Location: login.html');
	  	exit();
	  }
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Quản lí công văn</title>
	<link rel="stylesheet" type="text/css" href="css/trangchu.css"/>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/menuleft.css"/>
	<link rel="stylesheet" type="text/css" href="css/gopy.css"/>
	</head>
	<body>
	<!-- Star: main -->
	<div class="wrapper" >
	<!-- Star: header -->

	<div id="header" class="header">
		<img src="images/logo.png" width="1000" height="auto" alt="logo" longdesc="images/logo.png" />
	</div>
	<!-- End: header -->

	<!-- Star: menu -->
	<div id="menu" class="menu">
	        <div class="dropdownmenu">
	          <ul>
	            <li><a href="index.php">Trang chủ</a></li>
	            <li><a href="admin.php">Trang quản trị</a></li>
	            <li><a href="updateFrom.php">Quản lí văn bản</a></li>
	            <li><a href="#">Góp ý - Liên hệ</a></li>
	            <li><a href="#">Giới thiệu</a></li>
	            <li><a href="logout.php">Đăng xuất</a></li>

	          </ul>
	          </div>
	</div>
	<!-- End: menu -->
	<!-- Star: container -->

	<div id="container" class="container">
	<!-- Star: left -->

		<div id="left" class="left">
			
			<!-- Table left -->
			<!-- 
			<table>
		    	<tr>
		        <td><img src="images/logoleft.jpg" width="195" height="auto" alt="logoleft" longdesc="images/logoleft.jpg" /></td>
		        </tr>
		        <tr>
		        <td><img src="images/logoleft2.jpg" width="195" height="auto" alt="logoleft2" longdesc="images/logoleft2.jpg" /></td>
		        </tr>
		        <tr>
		        	<td><iframe width="195" height="150" src="https://www.youtube.com/embed/dbtEGjSvqAc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
		        </tr>
		        <tr>
		        <td><img src="images/happynewyear.jpg" width="195" height="auto" alt="happynewyear" longdesc="images/happynewyear.jpg" /></td>
		        </tr>
		        <tr>
		        <td><img src="images/album2.png" width="195" height="135	" alt="album2" longdesc="images/album2.png" /></td>
		        </tr>
		        </tr>
		        <tr>
		        <td><img src="images/hopthu.jpg" width="195" height="135	" alt="hopthu" longdesc="images/hopthu.jpg" /></td>
		        </tr>

		    </table>
		    -->
		    <!-- category -->
		    
		    	<ul class="menuleft" id="menuleft">
		        	<li><a href="#">Tất cả văn bản</a></li>
		            <li><a href="#">Lĩnh vực</a>
		            	
		                	<li><a href="#">+ Y tế</a></li>
		                    <li><a href="#">+ Các lĩnh vực khác</a></li>
		                
		            </li>
		            <li><a href="#">Cơ quan ban hành</a>
		            	
		                	<li><a href="#">+ Quốc hội</a></li>
		                    <li><a href="#">+ Chính phủ</a></li>
		                    <li><a href="#">+ UBND tỉnh</a></li>
		                    <li><a href="#">+ Ban tổ chức</a></li>
		                    <li><a href="#">+ HĐND tỉnh</a></li>
		                    <li><a href="#">+ Văn phòng sở y tế</a></li>
		                
		            </li>
		            <li><a href="#">Hình thức văn bản</a>
		            	
		                    <li><a href="#">+ Luật</a></li>
		                    <li><a href="#">+ Pháp lệnh</a></li>
		                    <li><a href="#">+ Nghị định</a></li>
		                    <li><a href="#">+ Chỉ thị</a></li>
		                    <li><a href="#">+ Thông tư</a></li>
		                    <li><a href="#">+ Quyết định</a></li>
		                
		            </li>
		            
		        </ul>
		        
		    <!-- end category -->
		
		</div>

		<!-- End: left -->

	<!-- Star: content -->

		<div id="content">
			<div class="table">	    
			  	<table class="form-gop-y">
			  		<thead>
			  			<tr style="column-span: 2;">
			  				<p class="title-form-gop-y">Góp ý - Liên hệ</p>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<form action="mailto:someone@example.com" method="post" enctype="text/plain">
						<tr>
							<td>Tên người góp ý:</td>
							<td><input type="text" name="name"><td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input type="text" name="name"><td>
						</tr>
						<tr>
							<td>Nội dung góp ý:</td>
							<td><textarea rows="8" cols="80" ></textarea><td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="send" value="Gửi">
								<input type="reset" name="reset" value="Reset">
								<input type="button" onclick="gotoback()" value="Quay lại" ><td>
									<script>
										function gotoback() {
										    window.location.assign("admin.php")
										}
									</script>
							
							</td>
						</tr>

						</form>


			  		</tbody>




			  	</table>







			  
		    </div>
	<!-- End: content -->

	</div>

	<!-- End: container -->
	</div>





	<!-- Start: footer -->
	<div id="footer">
		<div class="info">

			<span><a href="#" class="uptop">Lên đầu trang</a></span><br/>
			<span>&copy Nguyễn Minh Hoàng</span><br/>
		    <span>Địa chỉ: Trường Đại Học Kiên Giang</span><br/>
		    <span>Điện thoại: 01656 987 140</span><br/>
		    <span>Email: hoang1501106004@vnkgu.edu.vn</span><br/>

		</div>
	</div>
	<!-- End: footer -->

	</div>
	<!-- End: wrapper -->



	</body>
	</html>




	 