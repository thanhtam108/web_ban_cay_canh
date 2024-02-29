<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesDangNhap.css" />
    <title>Đăng nhập</title>
</head>

<body class="login-body">
    <div class="login-container">
        <h2>Đăng nhập</h2>
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
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        <p> <a href="Trangchu.php"> Trở về trang chủ </a> </p>
    </div>
</body>

</html>