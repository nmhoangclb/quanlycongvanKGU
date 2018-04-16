
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
    ?>
    <?php

    //upload file
    $folder_to_upload = './upload';
    $allowType = [ 'doc', 'docx', 'rar', 'zip','pdf','xlsx', 'text'];
    $maxSize  = 50000000;//1 megabyte = 1 000 000 bytes // tối đa 50mb

    $upload_result = uploadFile($_FILES["taptindinhkem"], $folder_to_upload, $allowType, $maxSize);
    if(count($upload_result["error"]) > 0) {
        $error = "";
        foreach($upload_result["error"] as $err) $error .= $err["msg"] . ". ";

        echo '<div class="update-failed">
              
              <strong>Tải lên lỗi!</strong> ' . $error . '
            </div>';
            header( "Refresh:3; url='admin.php'");
            exit;
    } 
	else {
        echo '<div class="update-success">
              
              <strong>Tải lên thành công!</strong> File path: <pre>' . $upload_result["path"] . '</pre>
			  <script>alert('Tải lên thành công!');</script>

            </div>';
		
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
            //Insert fileName vào table taptin
            $ten_tap_tin = $upload_result["path"];
            $ten_tap_tin = substr($ten_tap_tin, 9);
			
            $insert_File_Name = "INSERT INTO taptin ( Name ) VALUES ('" .$ten_tap_tin. "')";
            mysqli_query($conn,  $insert_File_Name);
            //Xử lý mã tập tin
            $sql_select_id = "SELECT id FROM taptin WHERE ( Name ) = ('" .$ten_tap_tin. "')";
            $result_taptin = mysqli_query($conn, $sql_select_id );
            $row_taptin = mysqli_fetch_array($result_taptin);
            $mataptin = $row_taptin['id'];
			//in ra gia tri
            /*echo "<p>$sohieu</p>";
			echo "<p>$ngayvanban</p>";
			echo "<p>$ngayhieuluc</p>";
			echo "<p>$noidung</p>";
			echo "<p>$nguoiky</p>";
			echo "<p>$mataptin</p>";
			echo "<p>$conhieuluc</p>";
			echo "<p>$coquanbanhanh</p>";
			echo "<p>$hinhthucvanban</p>";
			echo "<p>$linhvuc</p>";
			echo "<p>$loaivanban</p>";*/



			
            //Đưa giá trị vào db
            $sql_insert_congvan = "INSERT INTO `congvan`(`soHieu`, `ngayVanBan`, `ngayHieuLuc`, `noiDung`, `nguoiKy`, `mataptin`, `conhieuluc`, `coquanbanhanh`, `hinhthucvanban`, `linhvuc`, `loaivanban`) 
VALUES ( '$sohieu', '$ngayvanban', '$ngayhieuluc' , '$noidung', '$nguoiky', '$mataptin', '$conhieuluc', '$coquanbanhanh', '$hinhthucvanban', '$linhvuc', '$loaivanban')";
            mysqli_query($conn, $sql_insert_congvan);
			
			
            mysqli_close($conn);	
		echo'<script>alert("Thêm văn bản thành công!");</script>';
		echo "<meta http-equiv='refresh' content='0;URL=\"admin.php\"'>";	
		//header( "Refresh:0; url='admin.php'");
        exit;
	}
           
     ?>

     