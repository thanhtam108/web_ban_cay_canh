<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesThemCay.css" />
    <title>Thêm Cây</title>
</head>

<body>
    <h1> THÊM CÂY MỚI </h1>
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
                        include "Cay.php";
                        $tree = new Cay();
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
</body>

</html>