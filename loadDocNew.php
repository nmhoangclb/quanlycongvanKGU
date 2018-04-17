<?php include_once "connections.php"; ?>
    
    <?php
		echo '<div class="doc-new">';
        //Văn bản mới cập nhật
        echo "<span style='color:red'>Văn bản mới cập nhật:</span>";
        echo "<marquee>";
        $query_number_row = "SELECT * FROM congvan";
        $result_number_row = mysqli_query($conn, $query_number_row);
        $last_row ="SELECT * FROM congvan,taptin where idcongvan=(select max(idcongvan) from congvan) AND congvan.mataptin = taptin.id";
        $number_row = mysqli_num_rows($result_number_row);
        $result_last_row = mysqli_query($conn, $last_row);
        $row_last = mysqli_fetch_array($result_last_row);
        $document_new = "Số hiệu: ".$row_last['soHieu']." - Nội dung: ".$row_last['noiDung']." - Ngày ký: ".$row_last['ngayVanBan'];
        echo "<span style='color:blue'><a href='detail.php?id=".$row_last['idcongvan']."'>".$document_new."</a></span>";
        echo "</marquee>";        
    	echo '</div>';
	?>
    
    
