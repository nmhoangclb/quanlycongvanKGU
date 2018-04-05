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
    ?>
    <?php
//                    echo "<pre class='text-left'>";
//                    var_dump($_FILES);
//                    echo "</pre>";
    //upload file
    $folder_to_upload = './upload';
    $allowType = [ 'doc', 'docx', 'rar', 'zip','pdf','xlsx', 'text'];
    $maxSize  = 50000000;//1 megabyte = 1 000 000 bytes // tối đa 50mb

    $upload_result = uploadFile($_FILES["taptindinhkem"], $folder_to_upload, $allowType, $maxSize);
    if(count($upload_result["error"]) > 0) {
        $error = "";
        foreach($upload_result["error"] as $err) $error .= $err["msg"] . ". ";

        echo '<div class="update-failed">
              
              <strong>Error!</strong> ' . $error . '
            </div>';
            header( "Refresh:3; url='admin.php'");
            exit;
    } else {
        echo '<div class="update-success">
              
              <strong>Tải lên thành công!</strong> File path: <pre>' . $upload_result["path"] . '</pre>

            </div>';
            //get giá trị của form
            $con = mysqli_connect('localhost', 'root', '', 'quanlycongvan');
            mysqli_set_charset($con,"utf8");
            $sohieu = $_POST['sohieu'];                  
            $ngaybanhanh = $_POST['ngaybanhanh'];
            $noidung = $_POST['noidung'];
            //Insert fileName vào table taptin
            $ten_tap_tin = $upload_result["path"];
            $ten_tap_tin = substr($ten_tap_tin, 9);
                //echo $ten_tap_tin;

            $insert_File_Name = "INSERT INTO taptin ( Name ) VALUES ('" .$ten_tap_tin. "')";
            mysqli_query($con,  $insert_File_Name);
            //Xử lý mã tập tin
            $sql_select_id = "SELECT id FROM taptin WHERE ( Name ) = ('" .$ten_tap_tin. "')";
            $result_taptin = mysqli_query($con, $sql_select_id );
            $row_taptin = mysqli_fetch_array($result_taptin);
            $mataptin = $row_taptin['id'];

            $ngayhieuluc = $_POST['ngayhieuluc'];
            $hinhthucvanban = $_POST['hinhthucvanban'];
            $coquanbanhanh = $_POST['coquanbanhanh'];
            $conhieuluc = $_POST['conhieuluc'];
            $loaivanban = $_POST['loaivanban'];
            $linhvuc = $_POST['linhvuc'];
            $linhvuc = substr($linhvuc, 1);
            
            // echo $mataptin."<br>".$sohieu."<br>".$noidung."<br>".$ngaybanhanh."<br>".$ngayhieuluc."<br>".$hinhthucvanban."<br>".$coquanbanhanh."<br>".$conhieuluc."<br>".$loaivanban."<br>".$linhvuc;

            //Đưa giá trị vào db
            
            
            $sql_insert_congvan ='INSERT INTO congvan ( soHieu, ngayVanBan, noiDung, mataptin, conhieuluc, coquanbanhanh, hinhthucvanban, linhvuc, loaivanban) VALUES ("'.$sohieu.'","'.$ngaybanhanh.'","'.$noidung.'","'.$mataptin.'","'.$conhieuluc.'","'.$coquanbanhanh.'","'.$hinhthucvanban.'","'.$linhvuc.'","'.$loaivanban.'")';
            mysqli_query($con, $sql_insert_congvan);
            mysqli_close($con);

            header( "Refresh:3; url='admin.php'");
            exit;
    }


                        

                        

                        
                        

     ?>

     