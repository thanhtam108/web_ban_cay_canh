<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>XỬ LÝ XÓA CÂY</title>
</head>

<body class="center">
	<?php
	include("Cay.php");
	$cay = new Cay();

	$tree_id = $_POST["TreeIDDelete"];

	$cay->xoa_Cay($tree_id);

	$cay->ngatKetNoi_MySQL();
	?>
	<p> <a href="danhsachCay.php"> Trở về </a> </p>
</body>

</html>