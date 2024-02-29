<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Xử lý Thêm cây</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
        }

        .error {
            color: red;
        }

        a {
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1> THÊM CÂY MỚI </h1>

    <?php
    include("Cay.php");
    $tree = new Cay();

    if (isset($_POST["them_cay"])) {
        $tree_name = $_POST["tree_name"];
        $tree_category = $_POST["tree_category"];
        $tree_height = $_POST["tree_height"];
        $tree_location = $_POST["tree_location"];                           
        $tree_care = $_POST["tree_care"];
        $tree_blossom_season = $_POST["tree_bls_sns"];
        $tree_pic = $_POST["tree_pic"];
        $tree_price = $_POST["tree_price"];

        if (
            empty($tree_name) || empty($tree_category) || empty($tree_height)
            || empty($tree_location) || empty($tree_care) || empty($tree_blossom_season)
            || empty($tree_price) || empty($tree_pic)
        ) {
            echo "<p class='error'>Lỗi dữ liệu bị trống! Vui lòng nhập đầy đủ thông tin.</p>";
        } else {
            $tree->them_Cay($tree_name, $tree_category, $tree_height, $tree_location, $tree_care, $tree_blossom_season, $tree_pic, $tree_price);
        }
    }
    ?>

    <form action="xulyThemCay.php" method="post">
        <table>
            <tr>
                <td>Tên cây:</td>
                <td><input type="text" name="tree_name"></td>
            </tr>
            <tr>
                <td>Loại cây:</td>
                <td><input type="text" name="tree_category"></td>
            </tr>
            <tr>
                <td>Chiều cao:</td>
                <td><input type="text" name="tree_height"></td>
            </tr>
            <tr>
                <td>Nơi trồng:</td>
                <td><input type="text" name="tree_location"></td>
            </tr>
            <tr>
                <td>Cách chăm sóc:</td>
                <td><input type="text" name="tree_care"></td>
            </tr>
            <tr>
                <td>Mùa nở hoa:</td>
                <td><input type="text" name="tree_bls_sns"></td>
            </tr>
            <tr>
                <td>Ảnh:</td>
                <td><input type="file" name="tree_pic"></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><input type="text" name="tree_price"></td>
            </tr>
            <tr>
                <td><input type="submit" name="them_cay" value="Thêm cây mới"></td>
                <td><input type="reset" value="Làm lại"></td>
            </tr>
        </table>
    </form>

    <h1 style='color:#03F; font-style:italic; font-weight:bold'> DANH SÁCH CÁC LOẠI CÂY HIỆN CÓ </h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên cây</th>
            <th>Loại cây</th>
            <th>Chiều cao</th>
            <th>Nơi trồng</th>
            <th>Cách chăm sóc</th>
            <th>Mùa nở hoa</th>
            <th>Giá</th>
            <th>Ảnh</th>
        </tr>

        <?php
        $stt = 1;
        $list_tree = $tree->danhSach_Cay();
        foreach ($list_tree as $item) {
            echo "<tr>";
            echo "<td>" . $stt . "</td>";
            $stt++;
            echo "<td>" . (isset($item['TREE_NAME']) ? $item['TREE_NAME'] : '') . "</td>";
            echo "<td>" . (isset($item['CATE_NAME']) ? $item['CATE_NAME'] : '') . "</td>";
            echo "<td>" . (isset($item['TREE_HEIGHT']) ? $item['TREE_HEIGHT'] : '') . "</td>";
            echo "<td>" . (isset($item['TREE_LOCATION']) ? $item['TREE_LOCATION'] : '') . "</td>";
            echo "<td>" . (isset($item['TREE_CARE']) ? $item['TREE_CARE'] : '') . "</td>";
            echo "<td>" . (isset($item['TREE_BLOSSOM_SEASON']) ? $item['TREE_BLOSSOM_SEASON'] : '') . "</td>";
            echo "<td>" . (isset($item['TREE_PRICE']) ? number_format($item['TREE_PRICE']) . " VNĐ" : '') . "</td>";
            echo "<td><img src='images/" . (isset($item['TREE_PIC']) ? $item['TREE_PIC'] : '') . "' alt='Tree Image'></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="danhsachCay.php"> Trở về </a>
</body>

</html>
