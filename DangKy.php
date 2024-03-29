<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesDangKy.css">
    <title>Đăng ký tài khoản</title>
</head>

<body>

    <body class="signup-body">
        <div class="signup-container">
            <h2>Đăng ký tài khoản</h2>
            <form action="xulyDangKy.php" method="post" class="signup-form">
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label><br>
                    <input type="text" id="username" name="username" required><br>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu:</label><br>
                    <input type="password" id="password" name="password" required><br>
                </div>

                <div class="form-group">
                    <label for="fullname">Họ và tên:</label><br>
                    <input type="text" id="fullname" name="fullname" required><br>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại:</label><br>
                    <input type="tel" id="phone" name="phone" required><br>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ:</label><br>
                    <textarea id="address" name="address" rows="4" required></textarea><br>
                </div>

                <div class="form-group">
                    <input type="submit" value="Đăng ký">
                </div>
            </form>
        </div>
    </body>

</html>