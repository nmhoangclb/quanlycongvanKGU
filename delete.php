<?php session_start(); ?>
<?php
  if(isset($_SESSION['user'])){  	
	if (is_numeric($_GET['id'])){
	include_once "connections.php";

		
            $sql = "DELETE FROM congvan WHERE idcongvan=".$_GET['id'];
            mysqli_query($conn, $sql);	
            mysqli_close($conn);
            echo "<script>
                alert('Đã xoá thành công!');
				window.history.back();</script>               
            	";
				// window.location.assign('admin.php');
			

	}
	}//end if check session
  else{
  	header('location: index.php');
  	exit;
  }
?>
 