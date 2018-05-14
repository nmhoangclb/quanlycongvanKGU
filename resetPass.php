<?php 
	if(isset($_POST['confirm'])){
		$questionConfirm = "3";
		$answerConfirm = "dai hoc kien giang";
		$question = $_POST['questions'];
		$answer = $_POST['answer'];
		if($questionConfirm === $question && $answerConfirm === $answer){
			include_once "connections.php";
			$newPassWord = rand(100001,999999);
			$newPassWord2 = sha1($newPassWord);
			$sql = "UPDATE accounts
			SET passWord = '$newPassWord2'
			WHERE id = '1' ";
			mysqli_query($conn,$sql);
			mysqli_close($conn);			
			echo "<script>alert('Đổi mật khẩu thành công! Mật khẩu mới là: $newPassWord');</script>";
			echo "Mật khẩu mới là: $newPassWord";
			
			}
		else {
			echo'<script>alert("Đổi mật khẩu không thành công!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=\"resetPassWord.php\"'>";
		}
			
		}
	else 
		echo'<script>window.location="index.php";</script>';
?>
<br />
<input type="button" value="Đăng nhập ngay" class="btnLogin" id="btnLogin" 
onClick="document.location.href='loginForm.php'" />