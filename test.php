<?php
include "connections.php";
include "Pagination.php";
require ('DB_driver.php');
 
	// Tạo Mới Đối Tượng
	$DB = new DB_driver(); 
	$total = ($DB->get_list('select * from congvan'));
	var_dump ($total);

?>
<!--
//	$config = [
	'total' => 167, 
	'limit' => 7,
	'full' => false,
	'querystring' => 'trang'
	];
	$page = new Pagination($config);
	echo $page->getPagination();
	
-->