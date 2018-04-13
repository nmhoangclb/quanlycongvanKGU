<?php
	//kết nối database
	$conn = mysqli_connect("localhost","root","","quanlycongvan") ;
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
	mysqli_set_charset($conn,"utf8");
?>