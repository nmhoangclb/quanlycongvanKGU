<?php
	//BƯỚC 1: KẾT NỐI CSDL
	include_once "connections.php";

	// BƯỚC 2: TÌM TỔNG SỐ RECORDS  SELECT count(congvan.id) as total FROM congvan, taptin WHERE congvan.mataptin = taptin.id
	$result = mysqli_query($conn, "SELECT count(idcongvan) as total FROM congvan, taptin WHERE congvan.mataptin = taptin.id AND hinhthucvanban = 3");
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

	// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH VĂN BẢN
	// Có limit và start rồi thì truy vấn CSDL lấy danh sách văn bản
	$result = mysqli_query($conn, "SELECT * FROM congvan, taptin, hinhthucvanban, coquanbanhanh WHERE hinhthucvanban = 3 AND congvan.mataptin = taptin.id AND congvan.hinhthucvanban = hinhthucvanban.id AND congvan.coquanbanhanh = coquanbanhanh.id ORDER BY ngayVanBan DESC LIMIT $start, $limit");//Desc giảm dần Asc tăng dần
	?>
<div>
	<?php 
    // PHẦN HIỂN THỊ VĂN BẢN
    // BƯỚC 6: HIỂN THỊ DANH SÁCH VĂN BẢN
    if($total_records){
				echo "<p><b>Tổng số văn bản: $total_records</b></p>";
                //Mở thẻ table và tbody
                echo "<table class='documents'>
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
					$timeFormat = date("m/d/Y", $time);
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
            
            }
            else echo "<p>không có dữ liệu!</p>";
    ?>
</div>
<div class="table-page">
   <?php 
    // PHẦN HIỂN THỊ PHÂN TRANG
    // BƯỚC 7: HIỂN THỊ PHÂN TRANG

    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1){
        echo '<a class="page-prev" href="congvandieuhanh.php?page='.($current_page-1).'">Trang trước</a>';
    }
    
    // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++){
        // Nếu là trang hiện tại thì hiển thị thẻ span
        // ngược lại hiển thị thẻ a
        if ($i == $current_page){
            echo '<span class="page-select">'.$i.'</span>';
        }
        else{
            echo '<a class="page-number" href="congvandieuhanh.php?page='.$i.'">'.$i.'</a>';
        }
    }

    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1){
        echo '<a class="page-next" href="congvandieuhanh.php?page='.($current_page+1).'">Trang sau</a>';
    }
    
   ?>
</div>
<?php
	//đóng kết NỐI
	mysqli_close($conn);
?>