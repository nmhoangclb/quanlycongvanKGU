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
				                 $sql = "SELECT * FROM congvan WHERE idcongvan=".$id;
				                 $result= mysqli_query($con, $sql);
				                 while ($row = mysqli_fetch_array($result)){
				                 	echo var_dump($row);

				}
							}
mysqli_close($con);
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
