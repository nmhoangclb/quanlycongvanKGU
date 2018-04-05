<?php session_start(); ?>
<?php 

<?php

  if(isset($_SESSION['user'])){
   //xử lý delete a row
  	

  	$con = mysqli_connect("localhost","root","","quanlycongvan") ;
			                /* check connection */
			                if (mysqli_connect_errno()) {
			                    printf("Connect failed: %s\n", mysqli_connect_error());
			                    exit();
			                }else{
			                	mysqli_set_charset($con,"utf8");
				                $sql = "DELETE FROM congvan WHERE id=".$id;
				                $result = mysqli_query($con, $sql);

				            }


  }else{
  	header(location:"index.php");
  	exit;
  }


 ?>