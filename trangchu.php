<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lí công văn</title>
<link rel="stylesheet" type="text/css" href="css/trangchu.css"/>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/menuleft.css"/>
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
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Trang quản trị</a></li>
            <li><a href="#">Danh mục</a>
              <ul id="submenu">
                <li><a href="#">Công văn điều hành</a></li>
                <li><a href="#">Thư mời</a></li>
                <li><a href="#">Kế hoạch</a></li>
              </ul>
            </li>
            <li><a href="#">Góp ý - Liên hệ</a></li>
            <li><a href="#">Giới thiệu</a></li>
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
			<?php 
			$con = mysqli_connect("localhost","root","","quanlycongvan") ;
            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }else{
            mysqli_set_charset($con,"utf8");
				if(isset($_GET['mySearch'])){
					$mysearch = $_GET['mySearch'];
					echo $mySearch;
					$query = "SELECT * FROM 'congvan' WHERE CONCAT('soHieu', 'ngayVanBan', 'noiDung') LIKE '%" .$mysearch ."%'";
					//print_r ($query);
					
						}
						//Đóng kết nối 
			            mysqli_close($con);
				
			 ?>
			<br/>
			<form class="search">
			  <div >
			  	<span>Tổng số văn bản: 10</span>
			    <input type="search" id="mySearch" name="mySearch" placeholder="Tìm kiếm ở đây...">
			    <input type="submit" name="btn_Search" value="Tìm kiếm">
			  </div>
			</form><br/>

			    <?php 
					$con = mysqli_connect("localhost","root","","quanlycongvan") ;
			                /* check connection */
		                if (mysqli_connect_errno()) {
		                    printf("Connect failed: %s\n", mysqli_connect_error());
		                    exit();
		                }else{
		                	mysqli_set_charset($con,"utf8");
			                $query = "SELECT * FROM congvan, taptin WHERE congvan.taptin = taptin.id";
			                $result = mysqli_query($con, $query);
			                $check = mysqli_num_rows($result);
				            if($check){
			                	//Mở thẻ table và tbody
			                	echo "<table width='90%' border='1px solid' align='center'>
						                        <thead>
						                            <tr>
						                                <th>Số, ký hiệu</th>
						                                <th>Ngày văn bản</th>
						                                <th>Trích yếu nội dung</th>
						                                <th>Toàn văn</th>
						                                
						                            </tr>
						                        </thead>
						                        <tbody>";
			                	while ($row = mysqli_fetch_array($result)){
			                		//print_r($row);
			                		//Load data table từ table congvan va taptin
						            echo "	<tr>
							 				<td>". $row['soHieu'] ."</td>
						                    <td>". $row['ngayVanBan'] ."</td>
						                    <td>". $row['noiDung'] ."</td>
						                    <td><a href='#'>".  $row['Name'] ."</a></td>
						                    
						                    </tr>";

			                	}
			                	//Đóng thẻ table và tbody
			                	echo "	</tbody>
		        						</table>"; 
			        			
				                }
				                else echo "không có dữ liệu!";

			                }
			                //Đóng kết nối 
			                mysqli_close($con);


	 			?>
	            
	            	
	   
	     
	    </div>
<!-- End: content -->

</div>

<!-- End: container -->
</div>





<!-- Start: footer -->
<div id="footer">
	<span>&copy Nguyễn Minh Hoàng</span><br/>
    <span>Địa chỉ: Trường Đại Học Kiên Giang</span><br/>
    <span>Điện thoại: 01656 987 140</span><br/>
    <span>Email: hoang1501106004@vnkgu.edu.vn</span><br/>
</div>
<!-- End: footer -->

</div>
<!-- End: wrapper -->



</body>
</html>
