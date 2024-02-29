<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
    </style>
    <title> XỬ LÝ TÌM KIẾM CÂY </title>
</head>

<body>
    <?php
    include("Cay.php");
    $tree = new Cay();

    if (isset($_POST["tim"])) {
        $ten = $_POST["timten"];

        if (empty($ten)) {
            echo "Nhập dữ liệu chưa hợp lệ!";
        } else {
            $tree->ketNoi_MySQL();

            echo "<h1 style='color:blue; font-weight:bold'> KẾT QUẢ TÌM KIẾM </h1>";
            echo "<table border='1'>";
            echo "<tr style='font-weight:bold' align='center'>";
            echo "<td>";
            echo "STT";
            echo "</td>";
            echo "<td>";
            echo "Mã cây";
            echo "</td>";
            echo "<td>";
            echo "Tên cây";
            echo "</td>";
            echo "<td>";
            echo "Loại cây";
            echo "</td>";
            echo "<td>";
            echo "Chiều cao";
            echo "</td>";
            echo "<td>";
            echo "Vị trí";
            echo "</td>";
            echo "<td>";
            echo "Chăm sóc";
            echo "</td>";
            echo "<td>";
            echo "Mùa nở hoa";
            echo "</td>";
            echo "<td>";
            echo "Giá cây"; // Adjusted to include the "TREE_PRICE" field
            echo "</td>";
            echo "<td>";
            echo "Hình ảnh"; // Adjusted to include the "TREE_PIC" field
            echo "</td>";
            echo "</tr>";

            $stt = 1;
            $list_tree = $tree->lay_Cay($ten);
            if (count($list_tree) > 0) {
                foreach ($list_tree as $item) {
                    echo "<tr>";
                    echo "<td align='center'>";
                    echo $stt;
                    $stt++;
                    echo "</td>";
                    echo "<td align='center'>";
                    echo $item["TREE_ID"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_NAME"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["CATE_NAME"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_HEIGHT"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_LOCATION"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_CARE"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_BLOSSOM_SEASON"];
                    echo "</td>";
                    echo "<td>";
                    echo $item["TREE_PRICE"];
                    echo "</td>";
                    echo "<td>";
                    echo "<td><img width=200px height=200px src='images/" . $item["TREE_PIC"] . "'></td>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9' align='center'><h2 style='font-weight:bold;'>KHÔNG CÓ CÂY TÊN $ten</h2></td></tr>";
            }


            echo "</table>";
            $tree->ngatKetNoi_MySQL();
        }
    }
    ?>
    <p> <a href="Trangchu.php"> Trở về trang chủ </a> </p>
    <p> <a href="DangNhap.php"> Đăng nhập </a> </p>
</body>

</html>