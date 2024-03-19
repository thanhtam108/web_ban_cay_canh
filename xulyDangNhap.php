<?php
session_start();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesDangNhap.css" />
    <title>XỬ LÝ ĐĂNG NHẬP</title>
</head>

<body>
    <?php

    $tendn = $_POST["username"];
    $mk = $_POST["password"];
    include ("Cay.php");
    $tree = new Cay();

    if (isset ($_POST["submit"])) {
        $tree->ketNoi_MySQL();
        $sql = "SELECT * FROM t_user WHERE USER_ID = '$tendn' AND USER_PASSWORD = '$mk' ";
        $kq = mysqli_query($connect, $sql);

        if (mysqli_num_rows($kq) == 0) {
            ?>
            <form name="dangnhap" class="login-form" action="xulyDangNhap.php" method="post">
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
            </form>
            <p> <a href="Trangchu.php"> Trở về trang chủ </a> </p>
            <?php
        } else {
            if ($tendn == 'admin') {
                $_SESSION["username"] = $tendn;
                header("location:danhsachCay_admin.php");
            } else {
                $_SESSION["username"] = $tendn;
                header("location:danhsachCay_user.php");
            }
        }
    }
    ?>
</body>

</html>