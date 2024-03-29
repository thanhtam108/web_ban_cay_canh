<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesMuaCay.css">
    <title>Thông tin mua</title>
</head>

<body>
    <div class="container">
        <h1>Nhập thông tin giao hàng</h1>
        <form action="process_purchase.php" method="post">
            <input type="hidden" name="tree_id" value="<?php echo isset ($_GET['TREE_ID']) ? $_GET['TREE_ID'] : ''; ?>">
            <label for="name">Họ và tên khách hàng:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <input type="submit" value="Tiến tới thanh toán">
        </form>
    </div>
</body>

</html>