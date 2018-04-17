<?php ob_start(); session_start(); ?>

<?php

  if(isset($_SESSION['user'])){
    header('Location: admin.php');
  }
  ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<title>Website Quản lý công văn, văn bản</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.congvanlogo {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.matkhau {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.matkhau {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Đăng nhập - Quản lý công văn, văn bản</h2>



<form action="login.php" method="POST">
  <div class="imgcontainer">
    <img src="images/congvanlogo.png" alt="congvanlogo.png" class="congvanlogo">
  </div>

  <div class="container">
    <label for="taikhoan"><b>Tài khoản</b></label>
    <input type="text" placeholder="Nhập tài khoản" name="taikhoan" required>

    <label for="matkhau"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="matkhau" required>
        
    <button type="submit">Đăng nhập</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Lưu mật khẩu
    </label>
  </div>

	<div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="window.history.go(-1)">Quay lại</button>
    <span class="matkhau"><a href="quenmatkhau.html">Quên mật khẩu?</a></span>
  </div> 
</form>

</body>
</html>
