<html>
<header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
      , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><?xml version="1.0" encoding="UTF-8" standalone="yes"?><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || '', table: table.innerHTML}
                var link = document.createElement("a");
                link.download = "congvan_export.xls";
                link.href = uri + base64(format(template, ctx));
                link.click();
            }
        })()

    </script>
<title>Quên mật khẩu | Quản lý công văn, văn bản</title>
<style>
	body {
		text-align:center;
		background:#CFDEEF;
		}
	.change {
		width: 1000;
		height: 480;
		margin: 50px auto;
		background:#999;
		border: #FFF;
		border-radius: 28px;
		-moz-border-radius: 28;
		-webkit-border-radius: 28;
		-ms-border-radius: 28;
		-o-border-radius: 28;
		}
	p {
		color:#FFF;
		text-align:center;
		font-size:25px;
		}
	h1 {
		color:#FFF;
		}
	.btnLogin {
		background-color: #0033CC; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border: #FFF;
		border-radius: 28px;
		-moz-border-radius: 28;
		-webkit-border-radius: 28;
		-ms-border-radius: 28;
		-o-border-radius: 28;

		}
	.btnLogin:hover {
		background-color: #4CAF50;
		color: white;
		border: #FFF;
		border-radius: 28px;
		-moz-border-radius: 28;
		-webkit-border-radius: 28;
		-ms-border-radius: 28;
		-o-border-radius: 28;
	}

}
</style>
</header>
<body>
<div class="change">
<?php
if (isset($_POST['confirm'])) {
	$email = $_POST['email'];
	$questionConfirm = "3";
	$answerConfirm = "dai hoc kien giang";
	$question = $_POST['questions'];
	$answer = $_POST['answer'];
	if ($questionConfirm === $question && $answerConfirm === $answer) {
		include_once "connections.php";
		$newPassWord = rand(100001, 999999);
		$newPassWord2 = sha1($newPassWord);
		$sql = "UPDATE accounts
			SET passWord = '$newPassWord2'
			WHERE id = '1' ";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<script>alert('Đổi mật khẩu thành công!');</script>";
		echo "<img src='images/forgot-password.png' width='250px' height='180px' />";
		echo "<h1>Lấy lại mật khẩu mới thành công!</h1>";
		echo "<p>Mật khẩu mới của bạn là: $newPassWord</p>";
		//goi thu vien
		include 'PHPMailer/class.smtp.php';
		include 'PHPMailer/class.phpmailer.php';
		$nFrom = "Hệ thống quản lý công văn, văn bản"; //mail duoc gui tu dau, thuong de ten cong ty ban
		$mFrom = 'nmhoangclb@gmail.com'; //dia chi email cua ban
		$mPass = 'Ho@ng0984'; //mat khau email cua ban
		$nTo = 'Quản trị viên'; //Ten nguoi nhan
		$mTo = "$email"; //dia chi nhan mail
		$mail = new PHPMailer();
		$body = "Bạn vừa thực hiện khôi phục lại mật khẩu bằng câu hỏi bảo mật. Mật khẩu mới của bạn là: $newPassWord  <br />Đăng nhập ngay <a href='http://www.quanlycongvankgu.tk/loginForm.php'>tại đây</a>"; // Noi dung email
		$title = 'Cấp lại mật khẩu mới Hệ thống quản lý công văn, văn bản'; //Tieu de gui mail
		$mail->IsSMTP();
		$mail->CharSet = "utf-8";
		$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.gmail.com"; // sever gui mail.
		$mail->Port = 465; // cong gui mail de nguyen
		// xong phan cau hinh bat dau phan gui mail
		$mail->Username = $mFrom; // khai bao dia chi email
		$mail->Password = $mPass; // khai bao mat khau
		$mail->SetFrom($mFrom, $nFrom);
		$mail->AddReplyTo('admin@quanlycongvankgu.tk', 'Admin'); //khi nguoi dung phan hoi se duoc gui den email nay
		$mail->Subject = $title; // tieu de email
		$mail->MsgHTML($body); // noi dung chinh cua mail se nam o day.
		$mail->AddAddress($mTo, $nTo);
		// thuc thi lenh gui mail
		if (!$mail->Send()) {
			echo '<p> Có lỗi trong quá trình gửi mail! Vui lòng thử lại!</p>';

		} else {

			echo "<p>Mật khẩu mới của bạn đã được gửi qua email: $email .<br /> Vui lòng kiểm tra và đăng nhập lại hệ thống!</p> ";
		}

	} else {
		echo '<script>alert("Đổi mật khẩu không thành công!");</script>';
		echo "<meta http-equiv='refresh' content='0;URL=\"resetPassWordForm.php\"'>";
	}

} else {
	echo '<script>window.location="index.php";</script>';
}

?>

<p><input type="button" value="Đăng nhập ngay" class="btnLogin" id="btnLogin" onClick="document.location.href='loginForm.php'" /></p>
</div>
</body>
</html>