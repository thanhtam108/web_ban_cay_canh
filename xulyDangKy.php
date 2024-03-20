<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    if (empty($username) || empty($password) || empty($fullname) || empty($email) || empty($phone) || empty($address)) {
        echo "Vui lòng nhập đầy đủ thông tin.";
    } else {

        include "Cay.php";
        $tree = new Cay();
        $tree->ketNoi_MySQL();

        // Kiểm tra xem tên tài khoản đã tồn tại trong cơ sở dữ liệu chưa
        $check_query = "SELECT * FROM t_user WHERE USER_ID = '$username'";
        $check_result = mysqli_query($connect, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            echo "Tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác.";
        } else {
            // Thêm dữ liệu vào bảng t_user
            $insert_query = "INSERT INTO t_user (USER_ID, USER_PASSWORD, USER_NAME, USER_PHONE, USER_ADDRESS) 
                             VALUES ('$username', '$password', '$fullname', '$phone', '$address')";

            if (mysqli_query($connect, $insert_query)) {
                echo "Đăng ký tài khoản thành công.";
            } else {
                echo "Đã xảy ra lỗi: " . mysqli_error($conn);
            }
        }

        // Đóng kết nối
        $tree->ngatKetNoi_MySQL();
    }
}
?>
