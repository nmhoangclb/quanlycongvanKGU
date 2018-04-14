<?php 
session_start();

session_destroy();
//header('location: index.php');
echo'<script>alert("Bạn đã đăng xuất thành công!");</script>';
echo "<meta http-equiv='refresh' content='0;URL=\"index.php\"'>";
 ?>