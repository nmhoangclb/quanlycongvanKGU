	<?php session_start(); ?>
	<?php// required(); ?>

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
	<link rel="stylesheet" type="text/css" href="css/menuleft.css"/>
	<link rel="stylesheet" type="text/css" href="css/formupdate.css"/>
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

			<!-- Kết nối CSDL -->
			<?php include 'connections.php'	;  ?>

	<?php 
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			// print_r ($id);
			 $sql = "SELECT * FROM congvan WHERE idcongvan=".$id;
			 $result= mysqli_query($con, $sql);
			 while ($row = mysqli_fetch_array($result)){ ?>


	<div>
		
		<div id="content">
			<div class="table">
		    	<form class="updateform" action="upload.php" method="post" enctype="multipart/form-data" >
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
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM hinhthucvanban');
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
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM coquanbanhanh');
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
		    					<td>
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
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM loaivanban');
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
		    						$result = mysqli_query($con, "SELECT id,Name FROM linhvuc ORDER BY id DESC");
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
								<input type="button" onclick="gotoback()" value="Quay lại" ><td>
									<script>
										function gotoback() {
										    window.location.assign("admin.php")
										}
									</script>
							</tr>
		    			</tbody>

		    		</table>
					

				</form>
				<!-- Đóng kết nối -->
				<?php mysqli_close($con); ?>
		    </div>
	<!-- End: content -->

	</div>
	</div>
		

	<?php
	 }
		
	}

		else{ ?>



		<div id="content">
			<div class="table">
		    	<form class="updateform" action="upload.php" method="post" enctype="multipart/form-data" >
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
				                    $con = mysqli_connect('localhost', 'root', '','quanlycongvan');
				                    mysqli_set_charset($con,"utf8");
				                    $result = mysqli_query($con, 'SELECT id,Name FROM hinhthucvanban');
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
				                    $result = mysqli_query($con, 'SELECT id,Name FROM coquanbanhanh');
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
		    					<td>
		    				</tr>
		    				

		    				<tr>
		    					<td><label>Loại văn bản </label></td>
		    					<td colspan="2"><select name="loaivanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    <?php	
				                    $result = "";
				                    $row = "";			                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM loaivanban');
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
		    						$result = mysqli_query($con, "SELECT id,Name FROM linhvuc ORDER BY id DESC");
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
								<input type="button" onclick="gotoback()" value="Quay lại" ><td>
									<script>
										function gotoback() {
										    window.location.assign("admin.php")
										}
									</script>
							</tr>
		    			</tbody>

		    		</table>
					

				</form>
				<!-- Đóng kết nối -->
				<?php mysqli_close($con); ?>
		    </div>
	<!-- End: content -->

	</div>

	<!-- End: container -->
	</div>


	<?php } ?>


	<!-- Start: footer -->
	<div id="footer">

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




	 