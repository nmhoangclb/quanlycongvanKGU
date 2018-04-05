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
            <li><a href="trangchu2.php">Trang chủ</a></li>
            <li><a href="admin.php">Trang quản trị</a></li>
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
	    	<!-- <p>
	        	<span>Tổng số văn bản: 10</span>
	            <input type="text" />
	            <input type="button" name="tbn_search" value="Tìm kiếm" />
	        
	        </p> -->
	        <?php
					// PHẦN XỬ LÝ PHP
			        // BƯỚC 1: KẾT NỐI CSDL
			        $con = mysqli_connect('localhost', 'root', '', 'quanlycongvan');
			        mysqli_set_charset($con,"utf8");
			 
			        // BƯỚC 2: TÌM TỔNG SỐ RECORDS  SELECT count(congvan.id) as total FROM congvan, taptin WHERE congvan.mataptin = taptin.id
			        $result = mysqli_query($con, 'SELECT count(congvan.id) as total FROM congvan, taptin WHERE congvan.mataptin = taptin.id');
			        $row = mysqli_fetch_assoc($result);
			        $total_records = $row['total'];
			 
			        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
			        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			        $limit = 10;
			 
			        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
			        // tổng số trang
			        $total_page = ceil($total_records / $limit);
			 
			        // Giới hạn current_page trong khoảng 1 đến total_page
			        if ($current_page > $total_page){
			            $current_page = $total_page;
			        }
			        else if ($current_page < 1){
			            $current_page = 1;
			        }
			 
			        // Tìm Start
			        $start = ($current_page - 1) * $limit;
			 
			        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
			        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
			        $result = mysqli_query($con, "SELECT * FROM congvan, taptin WHERE congvan.mataptin = taptin.id LIMIT $start, $limit");
			 
			        ?>
			        <div>
			            <?php 
			            // PHẦN HIỂN THỊ TIN TỨC
			            // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
			            if($total_records){
				                	//Tổng số văn bản
				                	echo "<p><span>Tổng số văn bản: </span>" .$total_records. "</p>";
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
			            ?>
			        </div>
			        <div class="pagination">
			           <?php 
			            // PHẦN HIỂN THỊ PHÂN TRANG
			            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
			 
			            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			            if ($current_page > 1 && $total_page > 1){
			                echo '<a href="phantrang.php?page='.($current_page-1).'">Prev</a> | ';
			            }
			 
			            // Lặp khoảng giữa
			            for ($i = 1; $i <= $total_page; $i++){
			                // Nếu là trang hiện tại thì hiển thị thẻ span
			                // ngược lại hiển thị thẻ a
			                if ($i == $current_page){
			                    echo '<span>'.$i.'</span> | ';
			                }
			                else{
			                    echo '<a href="phantrang.php?page='.$i.'">'.$i.'</a> | ';
			                }
			            }
			 
			            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
			            if ($current_page < $total_page && $total_page > 1){
			                echo '<a href="phantrang.php?page='.($current_page+1).'">Next</a> | ';
			            }
			            //đóng kết NỐI
			            mysqli_close($con);
			           ?>
	            
	            	
	      <!--   <p align="center">
	        	<a href="#">Trở lại</a>
	            <a href="#">1</a>
	            <a href="#">2</a>
	            <a href="#">3</a>
	            <a href="#">4</a>
	            <a href="#">5</a>
	            <a href="#">6</a>
	            <a href="#">7</a>
	            <a href="#">8</a>
	            <a href="#">9</a>
	            <a href="#">10</a>
	            <a href="#">Trang tiếp</a>
	        </p>
	     -->
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
