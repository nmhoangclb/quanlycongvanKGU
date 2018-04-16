<?php session_start(); ?>
<?php
  if(isset($_SESSION['user'])){  	
	if (is_numeric($_GET['id'])){
	include_once "connections.php";

		echo '<script>
        var r = confirm("Bạn có thực sự muốn xoá ?");
        if (r == true) {';
		
            $sql = "DELETE FROM congvan WHERE idcongvan=".$_GET['id'];
            mysqli_query($conn, $sql);	
            mysqli_close($conn);
            echo "
                alert('Đã xoá thành công!');
				window.history.back();               
            	";
				// window.location.assign('admin.php');
			
                   
        echo "} else {
            window.history.back();
        }
        </script>	";

	}
	}//end if check session
  else{
  	header('location: index.php');
  	exit;
  }
?>
 