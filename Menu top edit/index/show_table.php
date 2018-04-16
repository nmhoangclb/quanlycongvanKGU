<?php
	include_once "connections.php";
?>

	<?php
    	echo '<div width="100%" id="show"></div>';
		$query = "SELECT * FROM congvan, taptin WHERE mataptin = taptin.id ";
		$result = mysqli_query($conn, $query);
		$content_table = "";
		
		$count = mysqli_num_rows($result);
		$limitPage = 10;
		$sumPage = 1 + ceil($count/$limitPage);
		echo '<div class="content" style="display: none;">';
		$listPage = "";
		for($p = 1; $p < $sumPage; $p++){
			$listPage .= '<b onclick="show('.$p.');">'.$p.'</b>';
			$content_table = '<div id="'.$p.'"><table class="documents"><tr><th>Số, ký hiệu</th><th>Ngày văn bản</th><th>Trích yếu nội dung</th><th>Toàn văn</th></tr>';
			$i = 0;
			while($i++ < $limitPage && $row = mysqli_fetch_array($result)){
				
				$row_content = "<tr>
						<td>".$row['soHieu']."</td>
						<td>".$row['ngayVanBan']."</td>
						<td>".$row['noiDung']."</td>
						<td><a href='./upload/".$row['Name']."'>".$row['Name']."</a></td>
					 </tr>";
				$content_table.=$row_content;	
				
				
			}
			$content_table .= '</table></div>';
			echo $content_table;
		}
		echo '</div>';
		echo $listPage;
	?>
    <?php mysqli_close($conn);?>


