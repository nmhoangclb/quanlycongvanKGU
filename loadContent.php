<?php  
echo "Test loadContent.php";
$con = mysqli_connect("localhost","root","","quanlycongvan") ;
                * check connection */
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }else{
				mysqli_set_charset($con,"utf8");
                $query = "SELECT * FROM congvan";
                $result = mysqli_query($con, $query);
                echo $result;
                $check = mysqli_fetch_row($result);
                echo $check;
                if($check){
                    while($row = mysql_fetch_array($result)){
                        echo "<tr><td>".$row['id']."</td></tr>";
                    }
                }else{
                    echo "Lỗi";
                }
                
         		  
      //             	echo "<table width='95%' border='1px solid' border-collapse='collapse' align='center'>
      //                   <thead>
      //                       <tr>
      //                           <th>Số, ký hiệu</th>
      //                           <th>Ngày văn bản</th>
      //                           <th>Trích yếu nội dung</th>
      //                           <th>Toàn văn</th>
      //                           <th>Thao tác</th>
      //                       </tr>
      //                   </thead>
      //                   <tbody>";
                      	
      //            	$row = mysqli_fetch_row($result);
	 				
	 				// echo "<tr>
	 				// <td>". $row['soHieu'] ."</td>
      //               <td>". $row['ngayVanBan'] ."</td>
      //               <td>". $row['noiDung'] ."</td>
      //               <td>". $row['taptin'] ."</td>
      //               <td>Thao tác</td>
      //               </tr>";
                        
      //            echo "</tbody>
      //   				</table>";


 ?>                   