
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/templates.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- InstanceBeginEditable name="doctitle" -->
<link rel="stylesheet" type="text/css" href="css/style-table.css"/>
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
<title>Các lĩnh vực khác | Hệ thống quản lý công văn, văn bản</title>
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
          <a href="admin.php">Trang quản trị</a>
          <a href="contact.php">Liên hệ</a>
          <a href="about.php">Giới thiệu</a>
          <!--start search form-->
            <div class="form-search">
                <form id="form-search" name="form1" method="get" action="search_index_linhvuckhac.php">
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
        <?php
	include "connections.php";
	
	if(isset($_GET['btn-search'] )){
		$search = $_GET['txt-search'];
		$sql_search = " SELECT DISTINCT idcongvan, soHieu, ngayVanBan, noiDung, Name 
	FROM congvan, taptin	
	WHERE congvan.mataptin= taptin.id AND linhvuc = 2 AND ( soHieu LIKE '%$search%' OR ngayVanBan LIKE '%$search%' OR noiDung LIKE '%$search%' OR Name LIKE '%$search%') ";
		$result = mysqli_query($conn, $sql_search);
		$row = mysqli_fetch_assoc($result);
		$total_records = mysqli_num_rows($result);
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
	
		// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH VĂN BẢN
		// Có limit và start rồi thì truy vấn CSDL lấy danh sách văn bản
		$result = mysqli_query($conn, "SELECT DISTINCT idcongvan, soHieu, ngayVanBan, noiDung, Name, NameCQBH, NameHTVB
	FROM congvan, taptin,hinhthucvanban,coquanbanhanh 	
	WHERE linhvuc = 2 AND congvan.mataptin = taptin.id AND congvan.hinhthucvanban = hinhthucvanban.id AND congvan.coquanbanhanh = coquanbanhanh.id AND ( soHieu LIKE '%$search%' OR ngayVanBan LIKE '%$search%' OR noiDung LIKE '%$search%' OR Name LIKE '%$search%' )  ORDER BY ngayVanBan DESC LIMIT $start, $limit");//Desc giảm dần Asc tăng dần
		// PHẦN HIỂN THỊ VĂN BẢN
		// BƯỚC 6: HIỂN THỊ DANH SÁCH VĂN BẢN
		if($total_records){
				echo "<p><b>Tổng số văn bản: $total_records</b></p>";
				//Mở thẻ table và tbody
				echo "<table class='documents' id='documents'>
						<tr>
							<th>Số, ký hiệu</th>
                            <th>Ngày văn bản</th>
							<th>Cơ quan ban hành</th>
							<th>Hình thức văn bản</th>
                            <th>Trích yếu nội dung</th>
                            <th>Toàn văn</th>
						</tr>";
				while ($row = mysqli_fetch_array($result)){
					$time = strtotime($row['ngayVanBan']);
					$timeFormat = date("d/m/Y", $time);
					echo "	<tr>
								<td>". $row['soHieu'] ."</td>							
                                <td>". $timeFormat."</td>
								<td>". $row['NameCQBH']."</td>
								<td>". $row['NameHTVB']."</td>
								<td><a href='detail.php?id=".$row['idcongvan']."'>".$row['noiDung']."</a></td>
								<td><a href='./upload/".$row['Name']. "'>".  $row['Name'] ."</a></td>
							</tr>";
		
				}
				//Đóng thẻ table và tbody
				echo "</table>";
  ?>
                
<!--Phân trang-->
                
<div class="table-page">
		   <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
        
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a class="page-prev" href="search_index_linhvuckhac.php?page='.($current_page-1).'&txt-search='.$search.'&btn-search=Tìm+kiếm'.'">Trang trước</a>';
            }
            
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span class="page-select">'.$i.'</span>';
                }
                else{
                    echo '<a class="page-number" href="search_index_linhvuckhac.php?page='.$i.'&txt-search='.$search.'&btn-search=Tìm+kiếm'.'">'.$i.'</a>';
                }
            }
        
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a class="page-next" href="search_index_linhvuckhac.php?page='.($current_page+1).'&txt-search='.$search.'&btn-search=Tìm+kiếm'.'">Trang sau</a>';
            }
            
           ?>
</div>
<?php
	//đóng kết NỐI
	mysqli_close($conn);

?>  
           <?php 
			}
			else echo "<p>Không tìm thấy văn bản với từ khoá ' $search ' ! Thử tìm kiếm lại với từ khoá khác !</p>";?>           
 <?php

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
