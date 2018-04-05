/*
 <?php 
if (isset($_POST['save']))
    {
        //Get thuộc tính
        $sohieu = 

        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['file']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['file']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
                // sleep(5);
                // header('location: admin.php');
                // exit;
                header( "Refresh:3; url='admin.php'");
                exit;
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'], './files/'.$_FILES['file']['name']);
                echo 'File Uploaded';
                
                //header('location: admin.php');
                header( "Refresh:3; url='admin.php'");
                exit;
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }





//Upload file

    <?php
 */