<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nội dung công văn, văn bản</title>
</head>

<body>
	<?php 
	if(isset($_GET['file'])){
		$file = $_GET['file'];
		}
	
	
	?>
	<embed src="upload/<?php echo $file; ?>" type="application/pdf" width="100%" height="620px" />
</body>
</html>