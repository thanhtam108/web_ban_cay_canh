<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Xử lý Thêm cây</title>
    <link rel="stylesheet" href="stylesXLThemCay.css">
</head>

<body>
    <a href="danhsachCay_admin.php"> Trở về </a>
    <header>
        <h1> THÊM CÂY MỚI </h1>
    </header>

    <?php
    include "Cay.php";
    $tree = new Cay();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tree_name = $_POST["tree_name"];
        $tree_category = $_POST["tree_category"];
        $tree_height = $_POST["tree_height"];
        $tree_location = $_POST["tree_location"];
        $tree_care = $_POST["tree_care"];
        $tree_blossom_season = $_POST["tree_bls_sns"];
        $tree_price = $_POST["tree_price"];

        if (isset($_FILES['tree_pic']) && $_FILES['tree_pic']['error'] === UPLOAD_ERR_OK) {
            $pic_name = $_FILES['tree_pic']['name'];
            $file_tmp_name = $_FILES['tree_pic']['tmp_name'];
            $file_size = $_FILES['tree_pic']['size'];
            $file_type = $_FILES['tree_pic']['type'];

            $upload_directory = "images/";
            $target_file = $upload_directory . basename($pic_name);

            if (move_uploaded_file($file_tmp_name, $target_file)) {
                echo "<p> Upload ảnh thành công <p>";
            } else {
                echo "Lỗi tải file ảnh lên.";
            }
        } else {
            echo "Lỗi! Không có file nào được tải lên!";
        }

        if (
            empty($tree_name) || empty($tree_category) || empty($tree_height)
            || empty($tree_location) || empty($tree_care)
            || empty($tree_blossom_season) || empty($tree_price)
        ) {
            echo "<p class='error'>Lỗi dữ liệu bị trống! Vui lòng nhập đầy đủ thông tin.</p>";
        } else {
            $tree->them_Cay($tree_name, $tree_category, $tree_height, $tree_location, $tree_care, $tree_blossom_season, $pic_name, $tree_price);
        }
    }
    ?>

    <form action="xulyThemCay.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên cây:</td>
                <td><input type="text" name="tree_name" required></td>
            </tr>
            <tr>
                <td>Loại cây:</td>
                <td>
                    <select name="tree_category" required>
                        <?php
                        $categories = $tree->danhSach_Loai();
                        foreach ($categories as $category) {
                            echo "<option value='" . $category['CATE_ID'] . "'>" . $category['CATE_NAME'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Chiều cao cây:</td>
                <td><input type="text" name="tree_height" required></td>
            </tr>
            <tr>
                <td>Nơi trồng cây:</td>
                <td><input type="text" name="tree_location" required></td>
            </tr>
            <tr>
                <td>Cách chăm sóc:</td>
                <td><input type="text" name="tree_care" required></td>
            </tr>
            <tr>
                <td>Mùa nở hoa:</td>
                <td><input type="text" name="tree_bls_sns" required></td>
            </tr>
            <tr>
                <td>Ảnh:</td>
                <td><input type="file" name="tree_pic" accept="image/*" required></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><input type="text" name="tree_price" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="them_cay" value="Thêm cây"></td>
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
    <a href="danhsachCay_admin.php"> Trở về </a>
</body>

</html>