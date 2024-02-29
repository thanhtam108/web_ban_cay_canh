<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XỬ LÝ CẬP NHẬT THÔNG TIN CÂY</title>
</head>

<body>
	<?php
			include ("cay.php");
			$tree = new Cay();
			
			if(isset($_POST["luu"])) {
				$tree_id = $_POST["tree_id"];
				$tree_height = $_POST["tree_height"];
				$tree_location = $_POST["tree_location"];
				$tree_care = $_POST["tree_care"];
				$tree_price = $_POST["tree_price"];
				if (
					empty($tree_id) || empty($tree_height) || empty($tree_location) 
					|| empty($tree_care) || empty($tree_price) ) {
						echo "<h1 styles=>Lỗi dữ liệu bị trống! Vui lòng nhập đầy đủ thông tin.</p>";
				} else {
					$tree->sua_Cay($tree_id, $tree_height, $tree_location, $tree_care, $tree_price);
			}
		}
		$tree->ngatKetNoi_MySQL();
	?> 
  <a href="danhsachCay.php"> Trở về </a> 
</body>
</html>