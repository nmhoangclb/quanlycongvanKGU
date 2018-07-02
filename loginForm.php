<?php ob_start();
session_start();?>

<?php

if (isset($_SESSION['user'])) {
	header('Location: admin.php');
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="vn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<title>Đăng nhập | Hệ thống quản lý công văn - văn bản</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        font-family: 'Varela Round', sans-serif;
    }
    .modal-login {
        color: #636363;
        width: 350px;
    }
    .modal-login .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-login .modal-header {
        border-bottom: none;
        position: relative;
        justify-content: center;
    }
    .modal-login h4 {
        text-align: center;
        font-size: 26px;
    }
    .modal-login  .form-group {
        position: relative;
    }
    .modal-login i {
        position: absolute;
        left: 13px;
        top: 11px;
        font-size: 18px;
    }
    .modal-login .form-control {
        padding-left: 40px;
    }
    .modal-login .form-control:focus {
        border-color: #00ce81;
    }
    .modal-login .form-control, .modal-login .btn {
        min-height: 40px;
        border-radius: 3px;
    }
    .modal-login .hint-text {
        text-align: center;
        padding-top: 10px;
    }
    .modal-login .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }
    .modal-login .btn {
        background: #00ce81;
        border: none;
        line-height: normal;
    }
    .modal-login .btn:hover, .modal-login .btn:focus {
        background: #00bf78;
    }
    .modal-login .modal-footer {
        background: #ecf0f1;
        border-color: #dee4e7;
        text-align: center;
        margin: 0 -20px -20px;
        border-radius: 5px;
        font-size: 13px;
        justify-content: center;
    }
    .modal-login .modal-footer a {
        color: #999;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
</head>
<body>
<div class="text-center">
</div>

<!-- Modal HTML -->
<div id="myModal" >
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đăng nhập hệ thống</h4>
            </div>
            <div class="modal-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" name="taikhoan" placeholder="Tài khoản" required="required">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" required="required">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Đăng nhập">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a href="resetPassWordForm.php">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>