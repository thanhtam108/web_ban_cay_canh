<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesDanhSach.css" />
    <title>HIỂN THỊ BẢNG CÂY</title>
</head>

<body>
    <header>
        <div id="user-greeting">
            <?php echo "Xin chào <b>" . $_SESSION["username"] . "</b>"; ?>
        </div>
        <div id="logout-btn">
            <a href='xulyDangXuat.php'>Thoát</a>
        </div>
    </header>

    <h1>DANH SÁCH CÁC LOẠI CÂY</h1>

    <table>
        <tr>
            <th>STT</th>
            <th>Mã cây</th>
            <th>Tên cây</th>
            <th>Loại cây</th>
            <th>Chiều cao</th>
            <th>Vị trí trồng</th>
            <th>Cách chăm sóc</th>
            <th>Mùa cây nở hoa</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Các thao tác</th>
        </tr>
        <?php
        include "Cay.php";
        $tree = new Cay();
        $list_tree = $tree->danhSach_Cay();
        $i = 1;
        foreach ($list_tree as $item) {
            echo "<tr>";
            echo "<td align='center'>" . $i . "</td>";
            $i++;
            echo "<td>" . (isset ($item['TREE_ID']) ? $item['TREE_ID'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_NAME']) ? $item['TREE_NAME'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_CATEGORY_ID']) ? $item['TREE_CATEGORY_ID'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_HEIGHT']) ? $item['TREE_HEIGHT'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_LOCATION']) ? $item['TREE_LOCATION'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_CARE']) ? $item['TREE_CARE'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_BLOSSOM_SEASON']) ? $item['TREE_BLOSSOM_SEASON'] : '') . "</td>";
            echo "<td>" . (isset ($item['TREE_PRICE']) ? $item['TREE_PRICE'] : '') . " VNĐ" . "</td>";
            echo "<td><img width=200px height=200px src='images/" . $item["TREE_PIC"] . "'></td>";
            echo "<td>";
            ?>
            <form action="MuaCay.php" method="get">
                <input type="hidden" name="id" value="<?php echo $item['TREE_ID']; ?>">
                <input type="hidden" name="name" value="<?php echo urlencode($item['TREE_NAME']); ?>">
                <input type="submit" name="mua" value="MUA CÂY">
            </form>
            <?php
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>