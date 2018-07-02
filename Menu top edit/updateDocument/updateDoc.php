<?php session_start(); ?>
	<?php

	  if(isset($_SESSION['user'])){
	    // header('Location: admin.php');
	    // exit();
	  }else{
	  	header('Location: LoginForm.php');
	  	exit();
	  }
	 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="doctitle" -->
<link rel="stylesheet" type="text/css" href="css/style-update.css"/>
<script>
		function gotoback() {
		window.location.assign("admin.php");
		}
</script>
<!-- include jquery.min.js -->
<script src="./js/jquery.min.js"></script>
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
<title>Untitled Document</title>

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
          <a  href="index.php">Trang chủ</a>
          <a href="admin.php">Trang quản trị</a>
          <a  class="active" href="updateDoc.php">Thêm công văn</a>
          <a href="changePassWord.php">Đổi mật khẩu</a>
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
        <!-- Kết nối CSDL -->
			<?php include_once 'connections.php';  ?>

	<?php
		$num = 0;
		$result = null;
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$result = mysqli_query($conn, "SELECT * FROM congvan, taptin WHERE idcongvan=".$_GET['id'] . " AND congvan.mataptin = taptin.id");
			$num = mysqli_num_rows($result);
		}
		
		if ($num){
			//$id = $_GET['id'];
			// print_r ($id);
			//$sql = "SELECT * FROM congvan WHERE idcongvan=".$id;
			//$result= mysqli_query($conn, "SELECT * FROM congvan WHERE idcongvan=".$_GET['id']);
				
			 $row = mysqli_fetch_array($result)  ?>
             	<p style="text-align: center;color: blue; font-size: 35px;">Sửa công văn, văn bản</p>
		    	<form class="table-update-form" action="update.php" method="post" enctype="multipart/form-data" >
		    		<table class="table-form">

		    				<tr>
		    					<td><span style="color:#F00">* </span><label>Số, ký hiệu </label></td>
		    					<td colspan="2"><input type='text' name='sohieu' size="60" maxlength="20" value="<?php echo $row['soHieu']; ?>"  required></td>
		    				</tr>
		    				<tr>
		    					<td><span style="color:#F00">* </span><label>Trích yếu nội dung </label></td>
		    					<td colspan="2"><textarea rows="3" cols="61" name="noidung" maxlength="145"  required><?php echo $row['noiDung']; ?></textarea></td>
		    				</tr>
		    				<tr>
		    					<td><span style="color:#F00">* </span><label>Ngày ban hành </label></td>
		    					<td colspan="2"><input id="ngayvanban" type="date"  name="ngayvanban" value="<?php echo $row['ngayVanBan']; ?>" required></td>
		    					
		    				</tr>
		    				<tr>
		    					<td><span style="color:#F00">* </span><label>Ngày có hiệu lực </label></td>
		    					<td colspan="2"><input id="ngayhieuluc" type="date"  name="ngayhieuluc" value="<?php echo $row['ngayHieuLuc']; ?>" required></td>
		    				</tr>
		    				<tr>
		    					<td><span style="color:#F00">* </span><label>Hình thức văn bản </label></td>
		    					<td colspan="2">
									
									<input id='hinhthucvanban' type="hidden" value="<?php echo $row['hinhthucvanban']?>">
									
		    						<select id ="listhinhthucvanban" name="hinhthucvanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,NameHTVB FROM hinhthucvanban');
				                    while ($row2 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row2[id]'>" .$row2[NameHTVB]."</option>";
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
		    					<td><span style="color:#F00">* </span><label>Cơ quan ban hành </label></td>
		    					<td colspan="2">
									
									<input id='coquanbanhanh' type="hidden" value="<?php echo $row['coquanbanhanh']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listcoquanbanhanh" name="coquanbanhanh" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,NameCQBH FROM coquanbanhanh');
				                    while ($row3 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row3[id]'>" .$row3[NameCQBH]."</option>";
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
		    					<td><span style="color:#F00">* </span><label>Loại văn bản </label></td>
		    					<td colspan="2">
									
									<input id='loaivanban' type="hidden" value="<?php echo $row['loaivanban']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listloaivanban" name="loaivanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($conn, 'SELECT id,NameLVB FROM loaivanban');
				                    while ($row4 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row4[id]'>" .$row4[NameLVB]."</option>";
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
		    					<td><span style="color:#F00">* </span><label>Lĩnh vực </label></td>
		    					<td colspan="2">
		    					<?php
		    						$result = mysqli_query($conn, "SELECT id,NameLV FROM linhvuc ORDER BY id DESC");
				                    while ($row5 = mysqli_fetch_assoc($result)) {
				                    
				                    	echo "<input type='radio' checked=True  name='linhvuc' value='"?> <?php echo $row5["id"]. "' />" ;
				                    	echo $row5["NameLV"];
				                    	
				                	};
				                 ?></td>
				             
		    				</tr>
                            <tr>
                                <td><label>Người ký </label></td>
                                <td colspan="2"><input type='text' name='nguoiky' size="60" maxlength="50" value="<?php echo $row['nguoiKy'];?>"></td>
                            </tr>
		    				<tr>
		    					<td><span style="color:#F00">* </span><label>File đính kèm </label></td>
								<td colspan="2">
                                <?php
                                	if(empty($row['Name'])){
                                		echo '<input type="file" name="taptindinhkem">';
									} else {
										echo $row['Name'].', chọn file khác nếu muốn thay thế <br><input type="file" name="taptindinhkem">';
									}
								?>
                                </td>
		    				</tr>
                            <input type="hidden" name="macongvan" value="<?php echo $_GET['id'];?>" >
		    				<tr class="button-form">
								<td colspan="2"><input type="submit" name="save" value="Sửa">
								
								<input type="button" onclick="gotoback()" value="Quay lại" >
								</td>
		    				</tr>

		    		</table>
					
				</form>

	<?php
	 
		
	}

		else{ ?>
        
        
		<p style="text-align: center;color: blue; font-size: 35px;">Thêm công văn, văn bản</p>
<form class="table-upload-form" action="upload.php" method="post" enctype="multipart/form-data" >
    <table class="table-form">

            <tr>
                <td><span style="color:#F00">* </span><label>Số, ký hiệu </label></td>
                <td colspan="2"><input type='text' name='sohieu' size="60" maxlength="20" placeholder='Số hiệu, ký hiệu nhập vào đây...' required autofocus="autofocus"></td>
            </tr>
            <tr>
                <td><span style="color:#F00">* </span><label>Trích yếu nội dung </label></td>
                <td colspan="2"><textarea rows="3" cols="61" name="noidung" maxlength="145" placeholder="Nhập trích nội dung vào đây..." required></textarea></td>
            </tr>
            <tr>
                <td><span style="color:#F00">* </span><label>Ngày ban hành </label></td>
                <td colspan="2"><input id="ngayvanban" type="date"  name="ngayvanban" value="" required></td>
                <!-- <td colspan="2"><input type='text' name='ngaybanhanh' size="60" placeholder='Ngày ban hành nhập vào đây...' required></td> -->
            </tr>
            <tr>
                <td><span style="color:#F00">* </span><label>Ngày có hiệu lực </label></td>
                <td colspan="2"><input id="ngayhieuluc" type="date"  name="ngayhieuluc" value="" required></td>
            </tr>
            <tr>
                <td><span style="color:#F00">* </span><label>Hình thức văn bản </label></td>
                <td colspan="2"><select name="hinhthucvanban" required>
                    <option value=''>-----Chọn-----</option>
                    <?php
                    include_once "connections.php";
                    $result = mysqli_query($conn, 'SELECT id,NameHTVB FROM hinhthucvanban');
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='$row[id]'>" .$row[NameHTVB]."</option>";
                    }

                    ?>
                </select></td>
            </tr>
            
            <tr>
                <td><span style="color:#F00">* </span><label>Cơ quan ban hành </label></td>
                <td colspan="2"><select name="coquanbanhanh" required>
                    <option value=''>-----Chọn-----</option>
                    <?php	                    
                    $result = mysqli_query($conn, 'SELECT id,NameCQBH FROM coquanbanhanh');
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='$row[id]'>" .$row[NameCQBH]."</option>";
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
                <td><span style="color:#F00">* </span><label>Loại văn bản </label></td>
                <td colspan="2"><select name="loaivanban" required>
                    <option value=''>-----Chọn-----</option>
                    <?php		                    
                    $result = mysqli_query($conn, 'SELECT id,NameLVB FROM loaivanban');
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='$row[id]'>" .$row[NameLVB]."</option>";
                    }

                    ?>
                </select></td>
            </tr>
            
            <tr>
                <td><span style="color:#F00">* </span><label>Lĩnh vực </label></td>
                <td colspan="2">
                <?php
                    $result = mysqli_query($conn, "SELECT id,NameLV FROM linhvuc ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($result)) {
                    
                        echo "<input type='radio' checked=True  name='linhvuc' value='"?> <?php echo $row["id"]. "' />" ;
                        echo $row["NameLV"];
                        
                    }; 
                 ?></td>
                <!-- </td>
                <td colspan="2"><input type="radio" name="linhvuc" checked>Khác
                <input type="radio" name="linhvuc" checked>Y tế</td> -->
            </tr>
            <tr>
                <td><label>Người ký </label></td>
                <td colspan="2"><input type='text' name='nguoiky' size="60" maxlength="50" placeholder="Nhập họ và tên người ký" ></td>
            </tr>
            <tr>
                <td><span style="color:#F00">* </span><label>File đính kèm </label></td>
                <td colspan="2">
                	<input type="file" name="taptindinhkem" id="myFile" required>
                    <!--<span id="filePatch"></span>
					<script>
                        var x = document.getElementById("myFile").value;
                        document.getElementById("filePatch").innerHTML = x;
                    </script>-->
                	
                </td>
            </tr>
            <tr class="button-form">
                <td colspan="2"><input type="submit" name="save" value="Thêm">
                <input type="reset" name="reset" value="Làm mới">
                <input type="button" onclick="gotoback()" value="Quay lại" ></td>									
            </tr>
        

    </table>
	</form> <?php } mysqli_close($conn);?>
		
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
