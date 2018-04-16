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
     * @param $maxSize  // 1MB --> 1000000
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
                "msg" => "Exceeded filesize limit (" . ($maxSize / 1000000) . "MB)"
            ];
        }

        if (!in_array($ext, $allowType)) {
            $result["error"][] = [
                "msg" => "File type not allowed"
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
    $folder_to_upload = 'upload';
    $allowType = [ 'doc', 'docx', 'rar', 'zip','pdf','xlsx', 'text'];
    $maxSize  = 50000000;//1 megabyte = 1 000 000 bytes // tối đa 50mb
	if(isset($_POST['save'] && $_POST['taptindinhkem'])){
		//upload file
		$upload_result = uploadFile($_FILES["taptindinhkem"], $folder_to_upload, $allowType, $maxSize);
				if(count($upload_result["error"]) > 0) {
					$error = "";
					foreach($upload_result["error"] as $err) $error .= $err["msg"] . ". ";			
					echo '<div class="update-failed">						  
						  <strong>Tải lên lỗi!</strong> ' . $error . '
						</div>';
						header( "Refresh:3; url='admin.php'");
						exit;
				} else {
					//get giá trị của form
					include_once "connections.php";	
					$id = 0;				
					$mataptin = 0;
					$result = mysqli_query($conn, "SELECT mataptin FORM congvan WHERE idcongvan =".$_POST['macongvan']);
					$num_id = mysqli_num_rows($result);
					if($num_id ){
						$row_id = mysqli_fetch_array($result);
						$mataptin = $row_id['mataptin'];
						$id = $row_id['idcongvan'];
					}
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
					//get fileName
					$ten_tap_tin = $upload_result["path"];
					$ten_tap_tin = substr($ten_tap_tin, 9);
					//Update fileName vào table taptin								
					$update_File_Name = "UPDATE taptin SET Name=".$ten_tap_tin. " WHERE id =".$mataptin;
					mysqli_query($conn,  $update_File_Name);
					//update congvan
					$sql_update_congvan	= "UPDATE congvan SET soHieu ='".$sohieu."', ngayVanBan ='".$ngayvanban."', ngayHieuLuc ='".$ngayhieuluc."', noiDung ='".$noidung."', nguoiKy ='".$nguoiky."', mataptin ='".$mataptin."', conhieuluc ='".$conhieuluc."', coquanbanhanh ='".$coquanbanhanh."', hinhthucvanban ='".$hinhthucvanban."', linhvuc ='".$linhvuc."', loaivanban ='".$loaivanban."' WHERE id='".$id."'";
					mysqli_query($conn, $sql_update_congvan);
					echo '<div class="update-success">					  
					  <strong>Tải lên thành công!</strong> File path: <pre>' . $upload_result["path"] . '</pre>		
					</div>';					
				}
		}//end if(isset($_POST['save'] && $_POST['taptindinhkem']))
		else{
			//upload file
		$upload_result = uploadFile($_FILES["taptindinhkem"], $folder_to_upload, $allowType, $maxSize);
				if(count($upload_result["error"]) > 0) {
					$error = "";
					foreach($upload_result["error"] as $err) $error .= $err["msg"] . ". ";			
					echo '<div class="update-failed">						  
						  <strong>Tải lên lỗi!</strong> ' . $error . '
						</div>';
						header( "Refresh:3; url='admin.php'");
						exit;
				} else {
					//get giá trị của form
					include_once "connections.php";
					$id = 0;
					$result = mysqli_query($conn, "SELECT mataptin FORM congvan WHERE idcongvan =".$_POST['macongvan']);
					$num_id = mysqli_num_rows($result);
					if($num_id ){
						$row_id = mysqli_fetch_array($result);
						$id = $row_id['idcongvan'];
					}
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
					
					//update congvan
					$sql_update_congvan	= "UPDATE congvan SET soHieu ='".$sohieu."', ngayVanBan ='".$ngayvanban."', ngayHieuLuc ='".$ngayhieuluc."', noiDung ='".$noidung."', nguoiKy ='".$nguoiky."', conhieuluc ='".$conhieuluc."', coquanbanhanh ='".$coquanbanhanh."', hinhthucvanban ='".$hinhthucvanban."', linhvuc ='".$linhvuc."', loaivanban ='".$loaivanban."' WHERE id='".$id."'";
					mysqli_query($conn, $sql_update_congvan);
					echo '<div class="update-success">					  
					  <strong>Tải lên thành công!</strong> File path: <pre>' . $upload_result["path"] . '</pre>		
					</div>';					
				}
			
			}