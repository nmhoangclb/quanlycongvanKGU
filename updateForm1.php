<?php session_start(); ?>
<?php

  if(isset($_SESSION['user'])){
	// header('Location: admin.php');
	// exit();
  }else{
	 header('Location: admin.php');
	exit();
  }
 ?>
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
          <a class="active" href="index.php">Trang chủ</a>
          <a href="#admin.php">Trang quản trị</a>
          <a href="#contact.php">Liên hệ - Góp ý</a>
          <a href="#about.php">Giới thiệu</a>
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
                </li>
                <li class="dropdown">
                    <input type="checkbox" checked />
                    <a href="#" data-toggle="dropdown">Lĩnh vực</a>
                    <ul class="dropdown-menu">
                        <li><a href="yte.php">+ Y tế</a></li>
                        <li><a href="#">+ Các lĩnh vực khác</a></li>
                  	</ul>
                </li>
                <li class="dropdown" >
                    <input type="checkbox" checked />
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
        <?php include 'connections.php'	;  ?>

	<?php 
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			// print_r ($id);
			 $sql = "SELECT * FROM congvan WHERE idcongvan=".$id;
			 $result= mysqli_query($conn, $sql);
			 while ($row = mysqli_fetch_array($result)){ ?>


	
			<div class="table">
		    	<form class="table-update-form" action="upload.php" method="post" enctype="multipart/form-data" >
		    		<table class="table-form">

						<thead>
							<tr>
								<td colspan="3" style="text-align: center;color: blue; font-size: 35px;">Sửa công văn, văn bản</td>
							</tr>

						</thead>




		    			<tbody>

		    				<tr>
		    					<td><label>Số, ký hiệu </label></td>
		    					<td colspan="2"><input type='text' name='sohieu' size="60" maxlength="20" value="<?php echo $row['soHieu']; ?>"  required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Trích yếu nội dung </label></td>
		    					<td colspan="2"><textarea rows="3" cols="61" name="noidung" maxlength="145"  required><?php echo $row['noiDung']; ?></textarea></td>
		    				</tr>
		    				<tr>
		    					<td><label>Ngày ban hành </label></td>
		    					<td colspan="2"><input id="ngaybanhanh" type="date"  name="ngaybanhanh" value="<?php echo $row['ngayVanBan']; ?>" required></td>
		    					
		    				</tr>
		    				<tr>
		    					<td><label>Ngày có hiệu lực </label></td>
		    					<td colspan="2"><input id="ngayhieuluc" type="date"  name="ngayhieuluc" value="<?php echo $row['ngayVanBan']; ?>" required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Hình thức văn bản </label></td>
		    					<td colspan="2">
									
									<input id='hinhthucvanban' type="hidden" value="<?php echo $row['hinhthucvanban']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listhinhthucvanban" name="hinhthucvanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM hinhthucvanban');
				                    while ($row2 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row2[id]'>" .$row2[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#hinhthucvanban').val();
									$('#listhinhthucvanban').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Cơ quan ban hành </label></td>
		    					<td colspan="2">
									
									<input id='coquanbanhanh' type="hidden" value="<?php echo $row['coquanbanhanh']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listcoquanbanhanh" name="coquanbanhanh" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM coquanbanhanh');
				                    while ($row3 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row3[id]'>" .$row3[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#coquanbanhanh').val();
									$('#listcoquanbanhanh').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				<tr>
		    					<td>
		    						<label>Văn bản còn hiệu lực </label>
		    					</td>
		    					<td colspan="2">
												<input type="hidden" name="conhieuluc" value='0' >
												<input type="checkbox" name="conhieuluc" value='1' checked>
		    					</td>
		    				</tr>
		    				

		    				<tr>
		    					<td><label>Loại văn bản </label></td>
		    					<td colspan="2">
									
									<input id='loaivanban' type="hidden" value="<?php echo $row['loaivanban']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listloaivanban" name="loaivanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM loaivanban');
				                    while ($row4 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row4[id]'>" .$row4[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#loaivanban').val();
									$('#listloaivanban').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Lĩnh vực </label></td>
		    					<td colspan="2">
		    					<?php 
		    						$result = "";
				                    $row = "";	
		    						$result = mysqli_query($conn, "SELECT id,Name FROM linhvuc ORDER BY id DESC");
				                    while ($row = mysqli_fetch_assoc($result)) {
				                    
				                    	echo "<input type='radio' checked=True  name='linhvuc' value='"?> <?php echo $row["id"]. "' />" ;
				                    	echo $row["Name"];
				                    	
				                	};
				                 ?>
                                 </td>
				             	<!-- </td>
		    					<td colspan="2"><input type="radio" name="linhvuc" checked>Khác
								<input type="radio" name="linhvuc" checked>Y tế</td> -->
		    				</tr>
		    				<tr>
		    					<td><label>File đính kèm </label></td>
								<td colspan="2"><input type="file" name="taptindinhkem" required></td>
		    				</tr>
		    				<tr class="button-form">
								<td colspan="2"><input type="submit" name="save" value="Phát hành">
								<input type="reset" name="reset" value="Reset">	
								<input type="button" onclick="gotoback()" value="Quay lại" >
								</td>
		    				</tr>
		    				<!-- <tr class="button-form">
		    					<td colspan="2"><input type="submit" name="save" value="Phát hành">
								<input type="reset" name="reset" value="Reset">
								<input type="button" onclick="gotoback()" value="Quay lại" ><td>
									
							</tr> -->
		    			</tbody>

		    		</table>
					

				</form>
				
		    </div>
	<!-- End: content -->

	</div>
	</div>
		

	



		<div id="content">
			<div class="table">
		    	<form class="table-update-form" action="upload.php" method="post" enctype="multipart/form-data" >
		    		<table class="table-form">

						<thead>
							<tr>
								<td colspan="3" style="text-align: center;color: blue; font-size: 35px;">Thêm công văn, văn bản</td>
							</tr>

						</thead>

		    			<tbody>

		    				<tr>
		    					<td><label>Số, ký hiệu </label></td>
		    					<td colspan="2"><input type='text' name='sohieu' size="60" maxlength="20" placeholder='Số hiệu, ký hiệu nhập vào đây...' required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Trích yếu nội dung </label></td>
		    					<td colspan="2"><textarea rows="3" cols="61" name="noidung" maxlength="145" required></textarea></td>
		    				</tr>
		    				<tr>
		    					<td><label>Ngày ban hành </label></td>
		    					<td colspan="2"><input id="ngaybanhanh" type="date"  name="ngaybanhanh" value="2017-11-26" required></td>
		    					<!-- <td colspan="2"><input type='text' name='ngaybanhanh' size="60" placeholder='Ngày ban hành nhập vào đây...' required></td> -->
		    				</tr>
		    				<tr>
		    					<td><label>Ngày có hiệu lực </label></td>
		    					<td colspan="2"><input id="ngayhieuluc" type="date"  name="ngayhieuluc" value="2017-11-26" required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Hình thức văn bản </label></td>
		    					<td colspan="2"><select name="hinhthucvanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    <?php
				                    $conn = mysqli_connect('localhost', 'root', '','quanlycongvan');
				                    mysqli_set_charset($conn,"utf8");
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM hinhthucvanban');
				                    while ($row = mysqli_fetch_assoc($result)) {
				                        echo "<option value='$row[id]'>" .$row[Name]."</option>";
				                    }

				                    ?>
				                </select></td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Cơ quan ban hành </label></td>
		    					<td colspan="2"><select name="coquanbanhanh" required>
				                    <option value=''>-----Chọn-----</option>
				                    <?php	
				                    $result = "";
				                    $row = "";		                    
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM coquanbanhanh');
				                    while ($row = mysqli_fetch_assoc($result)) {
				                        echo "<option value='$row[id]'>" .$row[Name]."</option>";
				                    }

				                    ?>
				                </select></td>
		    				</tr>
		    				<tr>
		    					<td>
		    						<label>Văn bản còn hiệu lực </label>
		    					</td>
		    					<td colspan="2">
												<input type="hidden" name="conhieuluc" value='0' >
												<input type="checkbox" name="conhieuluc" value='1' checked>
		    					</td>
		    				</tr>
		    				

		    				<tr>
		    					<td><label>Loại văn bản </label></td>
		    					<td colspan="2"><select name="loaivanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    <?php	
				                    $result = "";
				                    $row = "";			                    
				                    $result = mysqli_query($conn, 'SELECT id,Name FROM loaivanban');
				                    while ($row = mysqli_fetch_assoc($result)) {
				                        echo "<option value='$row[id]'>" .$row[Name]."</option>";
				                    }

				                    ?>
				                </select></td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Lĩnh vực </label></td>
		    					<td colspan="2">
		    					<?php 
		    						$result = "";
				                    $row = "";	
		    						$result = mysqli_query($conn, "SELECT id,Name FROM linhvuc ORDER BY id DESC");
				                    while ($row = mysqli_fetch_assoc($result)) {
				                    
				                    	echo "<input type='radio' checked=True  name='linhvuc' value='"?> <?php echo $row["id"]. "' />" ;
				                    	echo $row["Name"];
				                    	
				                	};
				                 ?></td>
				             	<!-- </td>
		    					<td colspan="2"><input type="radio" name="linhvuc" checked>Khác
								<input type="radio" name="linhvuc" checked>Y tế</td> -->
		    				</tr>
		    				<tr>
		    					<td><label>File đính kèm </label></td>
								<td colspan="2"><input type="file" name="taptindinhkem" required></td>
		    				</tr>
		    				<tr class="button-form">
		    					<td colspan="2"><input type="submit" name="save" value="Phát hành">
								<input type="reset" name="reset" value="Reset">
								<input type="button" onclick="gotoback()" value="Quay lại" ></td>									
							</tr>
		    			</tbody>

		    		</table>
					

				</form>
				<!-- Đóng kết nối -->
				<?php mysqli_close($conn); ?>
		    
	<!-- End: content -->
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
