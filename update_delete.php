<?php session_start(); ?>
<?php 



  if(isset($_SESSION['user'])){
   //xử lý delete a row
  	$id = $_GET['id'];

  	$con = mysqli_connect("localhost","root","","quanlycongvan") ;
			                /* check connection */
			                if (mysqli_connect_errno()) {
			                    printf("Connect failed: %s\n", mysqli_connect_error());
			                    exit();
			                }else{
			                	 mysqli_set_charset($con,"utf8");
			                	 
			                	 // print_r ($id);
				                 $sql = "DELETE FROM congvan WHERE idcongvan=".$id;
				                 mysqli_query($con, $sql);
				          	}
	mysqli_close($con);
	echo "<script type='text/javascript'>
		 	alert('Đã xoá thành công!');
		 	window.location.assign('admin.php');
 	</script>";

  }//end if check session
  else{
  	header('location: index.php');
  	exit;
  }//end else

  // 	<script type="text/javascript">
		//  	alert("Đã xoá thành công!");
		//  	window.location.assign("admin.php");
 	// </script>;
 ?>
