<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesSuaCay.css" />
    <title>CẬP NHẬT CÂY TRỒNG</title>
</head>

<body>
    <header>
        <h1>CẬP NHẬT CÂY TRỒNG</h1>
    </header>

    <?php
        $tree_id = $_GET['id'];
        $tree_name = urldecode($_GET['name']);
    ?>

    <form name="sua" method="post" action="xulySuaCay.php">
        <table>
            <tr>
                <th>Thuộc tính</th>
                <th>Giá trị</th>
            </tr>
            <tr>
                <td> Tree ID </td>
                <td>
                    <input type="text" name="treeid" value="<?php echo $tree_id; ?>" disabled="disabled" />
                    <input type="hidden" name="tree_id" value="<?php echo $tree_id; ?>" />
                </td>
            </tr>
            <tr>
                <td> Tên cây </td>
                <td>
                    <input type="text" name="tree_name" value="<?php echo $tree_name; ?>" disabled="disabled" />
                </td>
            </tr>
            <tr>
                <td> Chiều cao </td>
                <td>
                    <input type="text" name="tree_height" value="" />
                </td>
            </tr>
            <tr>
                <td> Vị trí </td>
                <td>
                    <input type="text" name="tree_location" value="" />
                </td>
            </tr>
            <tr>
                <td> Chăm sóc </td>
                <td>
                    <input type="text" name="tree_care" value="" />
                </td>
            </tr>
            <tr>
                <td> Giá cả </td>
                <td>
                    <input type="text" name="tree_price" value="" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="luu" value="LƯU" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>