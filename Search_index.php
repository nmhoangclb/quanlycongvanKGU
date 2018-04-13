<?php
if(isset($_POST['btn-search'])){
	$search = $_POST['txt-search'];
	$sql_search = "
		SELECT *
		FROM congvan,taptin
		WHERE idcongvan = id AND idcongvan LIKE '%$search%' OR soHieu LIKE '%$search%' OR ngayVanBan LIKE '%$search%'OR noiDung LIKE '%$search%' 
		 ";
}
	//BƯỚC 1: KẾT NỐI CSDL
	include_once "connections.php";

	// BƯỚC 2: TÌM TỔNG SỐ RECORDS  SELECT count(congvan.id) as total FROM congvan, taptin WHERE congvan.mataptin = taptin.id
	$result = mysqli_query($conn, $sql_search);
	
	$total_records = mysqli_num_rows($result);

	// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 15;

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
	$result = mysqli_query($conn, $sql_search );
?>
<div>
	<?php 
    // PHẦN HIỂN THỊ VĂN BẢN
    // BƯỚC 6: HIỂN THỊ DANH SÁCH VĂN BẢN
    if($total_records){
                //Mở thẻ table và tbody
                echo "<table class='table-admin'>
                        <tr>
                            <th>Số, ký hiệu</th>
                            <th>Ngày văn bản</th>
                            <th>Trích yếu nội dung</th>
                            <th>Toàn văn</th>
                        </tr>";
                while ($row = mysqli_fetch_array($result)){
                    echo "	<tr>
                                <td>". $row['soHieu'] ."</td>
                                <td>". $row['ngayVanBan'] ."</td>
                                <td>". $row['noiDung'] ."</td>
                                <td><a href='./upload/".$row['Name']. "'>".  $row['Name'] ."</a></td>
                            </tr>";

                }
                //Đóng thẻ table và tbody
                echo "</table>"; 
            
            }
            else echo "<p>không có dữ liệu!</p>	";
    ?>
</div>
