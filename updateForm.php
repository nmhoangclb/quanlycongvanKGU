
			<!-- Kết nối CSDL -->
			<?php include 'connections.php'	;  ?>

	<?php 
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			// print_r ($id);
			 $sql = "SELECT * FROM congvan WHERE idcongvan=".$id;
			 $result= mysqli_query($con, $sql);
			 while ($row = mysqli_fetch_array($result)){ ?>


	<div>
		
		<div id="content">
			<div class="table">
		    	<form class="table-update-form" action="upload.php" method="post" enctype="multipart/form-data" >
		    		<table class="table-form">

						<thead>
							<tr>
								<td colspan="3" style="text-align: center;color: blue; font-size: 35px;">Sửa công văn, văn bản</td>
							</tr>

						</thead>




		    			<tbody>

		    				<tr>
		    					<td><label>Số, ký hiệu </label></td>
		    					<td colspan="2"><input type='text' name='sohieu' size="60" maxlength="20" value="<?php echo $row['soHieu']; ?>"  required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Trích yếu nội dung </label></td>
		    					<td colspan="2"><textarea rows="3" cols="61" name="noidung" maxlength="145"  required><?php echo $row['noiDung']; ?></textarea></td>
		    				</tr>
		    				<tr>
		    					<td><label>Ngày ban hành </label></td>
		    					<td colspan="2"><input id="ngaybanhanh" type="date"  name="ngaybanhanh" value="<?php echo $row['ngayVanBan']; ?>" required></td>
		    					
		    				</tr>
		    				<tr>
		    					<td><label>Ngày có hiệu lực </label></td>
		    					<td colspan="2"><input id="ngayhieuluc" type="date"  name="ngayhieuluc" value="<?php echo $row['ngayVanBan']; ?>" required></td>
		    				</tr>
		    				<tr>
		    					<td><label>Hình thức văn bản </label></td>
		    					<td colspan="2">
									
									<input id='hinhthucvanban' type="hidden" value="<?php echo $row['hinhthucvanban']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listhinhthucvanban" name="hinhthucvanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM hinhthucvanban');
				                    while ($row2 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row2[id]'>" .$row2[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#hinhthucvanban').val();
									$('#listhinhthucvanban').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Cơ quan ban hành </label></td>
		    					<td colspan="2">
									
									<input id='coquanbanhanh' type="hidden" value="<?php echo $row['coquanbanhanh']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listcoquanbanhanh" name="coquanbanhanh" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM coquanbanhanh');
				                    while ($row3 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row3[id]'>" .$row3[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#coquanbanhanh').val();
									$('#listcoquanbanhanh').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				<tr>
		    					<td>
		    						<label>Văn bản còn hiệu lực </label>
		    					</td>
		    					<td colspan="2">
												<input type="hidden" name="conhieuluc" value='0' >
												<input type="checkbox" name="conhieuluc" value='1' checked>
		    					</td>
		    				</tr>
		    				

		    				<tr>
		    					<td><label>Loại văn bản </label></td>
		    					<td colspan="2">
									
									<input id='loaivanban' type="hidden" value="<?php echo $row['loaivanban']?>">
									<!-- include jquery.min.js -->
									<script src="./js/jquery.min.js"></script>
		    						<select id ="listloaivanban" name="loaivanban" required>
				                    <option value=''>-----Chọn-----</option>
				                    
				                    
				                    <?php
				                    
				                    $result = mysqli_query($con, 'SELECT id,Name FROM loaivanban');
				                    while ($row4 = mysqli_fetch_assoc($result)) {

				                        echo "<option value='$row4[id]'>" .$row4[Name]."</option>";
				                    }
				                    
				                    ?>
					                </select>
					                <script>
									var x = $('#loaivanban').val();
									$('#listloaivanban').val(x);
									console.log(x);
									</script>
								</td>
		    				</tr>
		    				
		    				<tr>
		    					<td><label>Lĩnh vực </label></td>
		    					<td colspan="2">
		    					<?php 
		    						$result = "";
				                    $row = "";	
		    						$result = mysqli_query($con, "SELECT id,Name FROM linhvuc ORDER BY id DESC");
				                    while ($row = mysqli_fetch_assoc($result)) {
				                    
				                    	echo "<input type='radio' checked=True  name='linhvuc' value='"?> <?php echo $row["id"]. "' />" ;
				                    	echo $row["Name"];
				                    	
				                	};
				                 ?></td>
				             	<!-- </td>
		    					<td colspan="2"><input type="radio" name="linhvuc" checked>Khác
								<input type="radio" name="linhvuc" checked>Y tế</td> -->
		    				</tr>
		    				<tr>
		    					<td><label>File đính kèm </label></td>
								<td colspan="2"><input type="file" name="taptindinhkem" required></td>
		    				</tr>
		    				<tr class="button-form">
								<td colspan="2"><input type="submit" name="save" value="Phát hành">
								<input type="reset" name="reset" value="Reset">	
								<input type="button" onclick="gotoback()" value="Quay lại" >
								</td>
		    				</tr>
		    				<!-- <tr class="button-form">
		    					<td colspan="2"><input type="submit" name="save" value="Phát hành">
								<input type="reset" name="reset" value="Reset">
								<input type="button" onclick="gotoback()" value="Quay lại" ><td>
									
							</tr> -->
		    			</tbody>

		    		</table>
					

				</form>
				<!-- Đóng kết nối -->
				<?php mysqli_close($con); ?>
		    </div>
	<!-- End: content -->