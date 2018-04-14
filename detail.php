<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<!-- InstanceBeginEditable name="doctitle" -->
<link rel="stylesheet" type="text/css" href="css/style-detail.css"/>
<title>Quản lý công văn - Chi tiết văn bản</title>
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
          <a class="active" href="#detail">Chi tiết văn bản</a>
          <a href="#contact.php">Liên hệ - Góp ý</a>
          <a href="#about.php">Giới thiệu</a>
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
        <?php 
		if(isset($_GET['id'])){
		   //xử lý get id a row
			$id = $_GET['id'];
		
			include_once "connections.php";
			$sql = "SELECT * FROM congvan, hinhthucvanban, linhvuc, coquanbanhanh, taptin WHERE congvan.hinhthucvanban = hinhthucvanban.id AND congvan.linhvuc = linhvuc.id AND congvan.coquanbanhanh = coquanbanhanh.id AND congvan.mataptin = taptin.id AND idcongvan=".$id;
			$result =mysqli_query($conn, $sql);
			$check = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			if($check){ ?>
            	<p style="text-align: center;color: blue; font-size: 35px;">Chi tiết công văn, văn bản</p>
            	<table class="detail">
                    <tr>
                        <td class="col1">Số hiệu</td>
                        <td class="col2"><?php echo $row['soHieu']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Trích yếu nội dung</td>
                        <td class="col2"><?php echo $row['noiDung']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Ngày ban hành</td>
                        <td class="col2"><?php echo $row['ngayVanBan']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Ngày có hiệu lực</td>
                        <td class="col2"><?php echo $row['ngayVanBan']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Hình thức văn bản</td>
                        <td class="col2"><?php echo $row['NameHTVB']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Lĩnh vực</td>
                        <td class="col2"><?php echo $row['NameLV']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Cơ quan ban hành</td>
                        <td class="col2"><?php echo $row['NameCQBH']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Người ký duyệt</td>
                        <td class="col2"><?php echo $row['nguoiKy']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Download</td>
                        <td class="col2"><?php echo "<a href='upload/".$row['Name']."'>".$row['Name']."</a>"; ?></td>
                    </tr>
                </table>
			<?php
				
			}
									
			mysqli_close($conn);
			
		
		  }//end if 
		  else{
			header('location: index.php');
			exit;
		  }
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
