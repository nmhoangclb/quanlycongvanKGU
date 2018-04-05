<?php
//kết nối database
	$con = mysqli_connect("localhost","root","","quanlycongvan") ;
            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }else {
            	echo "conn succes ";
            }
?>