<?php
$num = intval(str_replace(" ", "", file_get_contents("a.txt")));
file_put_contents("a.txt", $num + 1);
$a = file_get_contents("a.txt");
echo "<span class='visit'>Tổng số lượt truy cập:" . $a . "</span>";

date_default_timezone_set('Asia/Ho_Chi_Minh');
$datenow = date('d-m-Y H:i:s');
echo "<span class='visit'>Ngày: " . $datenow . "</span>";

?>