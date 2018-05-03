<?php
    /**
     * @param $fileName
     * @return mixed tra ve phan mo rong cua file
     */
    function getFileExtension ($fileName) {
    	return pathinfo($fileName)["extension"];
    }

    /**
     * @param $file // $_FILES["img"]
     * @param $path // './upload'
     * @param $allowType // array("jpg", "png")
     * @param $maxSize  // 3MB --> 3000000
     */
    function uploadFile($file, $path, $allowType, $maxSize) {
    	$fileName = $file['name'];
    	$ext = getFileExtension($fileName);
    	$fileSize = $file['size'];
    	$tmpFile = $file['tmp_name'];

    	$result = [
    		"error" => [],
    		"path" => ""
    	];


    	if ($fileSize > $maxSize) {
    		$result["error"][] = [
    			"msg" => "Kích thước file phải nhỏ hơn (" . ($maxSize / 1000000) . "MB)"
    		];
    	}

    	if (!in_array($ext, $allowType)) {
    		$result["error"][] = [
    			"msg" => "File không được cho phép. Chỉ hỗ trợ các định dạng 'doc', 'docx', 'rar', 'zip','pdf','xlsx', 'text'"
    		];
    	}

    	if(count($result["error"]) == 0) {
            //$fileName = time() . '_' . $fileName;  // time() 12248717644
    		$path = $path . '/' . $fileName;
    		if(move_uploaded_file($tmpFile, $path)) {
    			$result["path"] = $path;
    		}
    	}
    	return $result;
    }

    //upload file
    $folder_to_upload = './upload';
    $allowType = [ 'doc', 'docx', 'rar', 'zip','pdf','xlsx', 'text'];
    $maxSize  = 50000000;//1 megabyte = 1 000 000 bytes // tối đa 50mb

    if(isset($_POST['save'])) { 
    	if($_FILES['taptindinhkem']['error'] == 0){
    		$id = 0;
    		$mataptin = 0;
    		include_once "connections.php";
    		$result_congvan = mysqli_query($conn, "SELECT idcongvan,mataptin FROM congvan WHERE idcongvan =".$_POST['macongvan']);
    		$num_congvan = mysqli_num_rows($result_congvan);
    		if($num_congvan){
    			$row_congvan = mysqli_fetch_array($result_congvan);
    			$id = $row_congvan['idcongvan']; 
    			$mataptin = $row_congvan['mataptin'];
    			$upload_result = uploadFile($_FILES["taptindinhkem"], $folder_to_upload, $allowType, $maxSize);
    			if(count($upload_result["error"]) > 0 ) {
    				$error = "";
    				foreach($upload_result["error"] as $err) $error .= $err["msg"] . ". ";

    				echo '<div class="update-failed">

    				<strong>Tải lên lỗi!</strong> ' . $error . '
    				</div>';
						//header( "Refresh:3; url='admin.php'");
    				echo'<script>alert("Tải tập tin lên thất bại!");</script>';
    				echo "<script>
    				window.history.back();
    				</script>";
						//header("location:javascript://history.go(-1)");
    				exit;
    			} else {
					//get giá trị của form
    				include_once "connections.php";
    				$sohieu = $_POST['sohieu'];                  
    				$ngayvanban = $_POST['ngayvanban'];
    				$ngayhieuluc = $_POST['ngayhieuluc'];
    				$nguoiky = $_POST['nguoiky'];
    				$noidung = $_POST['noidung'];
    				$conhieuluc = $_POST['conhieuluc'];
    				$coquanbanhanh = $_POST['coquanbanhanh'];
    				$hinhthucvanban = $_POST['hinhthucvanban'];
    				$linhvuc = $_POST['linhvuc'];
    				$loaivanban = $_POST['loaivanban'];
					//update fileName trong db taptin
    				$ten_tap_tin = $upload_result["path"];
    				$ten_tap_tin = substr($ten_tap_tin, 9);
    				echo $sohieu."<br>".$ngayvanban."<br>".$ngayhieuluc."<br>".$nguoiky."<br>".$noidung."<br>".$conhieuluc."<br>".$coquanbanhanh."<br>".$hinhthucvanban."<br>".$linhvuc."<br>".$loaivanban."<br>".$ten_tap_tin."<br>".$id."<br>".$mataptin;
    				$update_File_Name = "UPDATE taptin SET Name = '".$ten_tap_tin. "' WHERE id =".$mataptin;
            		mysqli_query($conn,  $update_File_Name);//update file thành công
					//update record trong db congvan
            		$sql_update = "UPDATE congvan 
            		SET soHieu= '".$sohieu."' ,ngayVanBan='".$ngayvanban."',ngayHieuLuc='".$ngayhieuluc."',noiDung='".$noidung."',nguoiKy='".$nguoiky."',mataptin='".$mataptin."',conhieuluc='".$conhieuluc."',coquanbanhanh='".$coquanbanhanh."',hinhthucvanban='".$hinhthucvanban."',linhvuc='".$linhvuc."',loaivanban='".$loaivanban."' 
            		WHERE idcongvan = '".$id."'";
            		mysqli_query($conn,$sql_update);
            		mysqli_close($conn);
            		echo '<div class="update-success">
            		<strong>Tải lên thành công!</strong> File path: <pre>' . $upload_result["path"] . '</pre>						</div>';
            		echo "<script>alert('Tải lên thành công!');</script>";}
					echo '<script>window.location.assign("admin.php")</script>';
					//echo "<meta http-equiv='refresh' content='0;URL=\"admin.php\"'>";
            	}else{
            		echo'<script>alert("Sửa văn bản không thành công! Vui lòng thử lại");</script>';
            		echo "<script>
    						window.history.back();
						</script>";
            	}

            }else{
			//xử lý update congvan
            	$id = 0;
	    		$mataptin = 0;
	    		include_once "connections.php";
	    		$result_congvan = mysqli_query($conn, "SELECT idcongvan,mataptin FROM congvan WHERE idcongvan =".$_POST['macongvan']);
	    		$num_congvan = mysqli_num_rows($result_congvan);
	    		if($num_congvan){
    			$row_congvan = mysqli_fetch_array($result_congvan);
    			$id = $row_congvan['idcongvan']; 
    			$sohieu = $_POST['sohieu'];                  
				$ngayvanban = $_POST['ngayvanban'];
				$ngayhieuluc = $_POST['ngayhieuluc'];
				$nguoiky = $_POST['nguoiky'];
				$noidung = $_POST['noidung'];
				$conhieuluc = $_POST['conhieuluc'];
				$coquanbanhanh = $_POST['coquanbanhanh'];
				$hinhthucvanban = $_POST['hinhthucvanban'];
				$linhvuc = $_POST['linhvuc'];
				$loaivanban = $_POST['loaivanban'];				
				//update record trong db congvan
        		$sql_update = "UPDATE congvan 
        		SET soHieu= '".$sohieu."' ,ngayVanBan='".$ngayvanban."',ngayHieuLuc='".$ngayhieuluc."',noiDung='".$noidung."',nguoiKy='".$nguoiky."',conhieuluc='".$conhieuluc."',coquanbanhanh='".$coquanbanhanh."',hinhthucvanban='".$hinhthucvanban."',linhvuc='".$linhvuc."',loaivanban='".$loaivanban."' 
        		WHERE idcongvan = '".$id."'";
        		mysqli_query($conn,$sql_update);
        		mysqli_close($conn);        		
        		echo "<script>alert('Sửa thành công!');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=\"admin.php\"'>";
				}else{
					echo'<script>alert("Sửa không thành công! Vui lòng thử lại");</script>';
            		echo "<script>
    						window.history.back();
						</script>";
					}
            }
	} else {//nếu không có $post[save]
		header ("location: admin.php");
		exit;
	}

?>