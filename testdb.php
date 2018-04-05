<?php 
$con = mysqli_connect("localhost","root","","quanlycongvan") ;
                /* check connection */
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }else{
                	mysqli_set_charset($con,"utf8");
	                $query = "SELECT * FROM congvan, taptin WHERE congvan.taptin = taptin.id";
	                $result = mysqli_query($con, $query);
	                $check = mysqli_num_rows($result);
	                if($check){
	                	//Mở thẻ table và tbody
	                	echo "<table width='95%' border='1px solid' border-collapse='collapse' align='center'>
				                        <thead>
				                            <tr>
				                                <th>Số, ký hiệu</th>
				                                <th>Ngày văn bản</th>
				                                <th>Trích yếu nội dung</th>
				                                <th>Toàn văn</th>
				                                <th>Thao tác</th>
				                            </tr>
				                        </thead>
				                        <tbody>";
	                	while ($row = mysqli_fetch_array($result)){
	                		print_r($row);
	                		//Load data table từ table congvan va taptin
				            echo "	<tr>
					 				<td>". $row['soHieu'] ."</td>
				                    <td>". $row['ngayVanBan'] ."</td>
				                    <td>". $row['noiDung'] ."</td>
				                    <td><a href='#'>".  $row['Name'] ."</a></td>
				                    <td>Thao tác</td>
				                    </tr>";

	                	}
	                	//Đóng thẻ table và tbody
	                	echo "	</tbody>
        						</table>"; 
        			
	                }
	                else echo "không có dữ liệu!";

                }
                //Đóng kết nối 
                mysqli_close($con);


 ?>