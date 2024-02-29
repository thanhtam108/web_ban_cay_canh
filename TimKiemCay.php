<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tìm kiếm cây cảnh</title>
</head>

<body style="background-color: #ccffcc; font-family: 'Arial', sans-serif; text-align: center; margin: 50px auto;">

    <form method="post" action="xulyTimKiemCay.php">
        <table cellpadding="10" style="border-collapse: collapse; width: 80%; margin: 0 auto; background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <tr>
                <td colspan="2">
                    <label style="color: #00C; font-weight: bold; font-size: 24px; display: block; text-align: center;">
                        TÌM CÂY CẢNH
                    </label>
                </td>
            </tr>
            <tr>
                <td align="right" style="padding-right: 10px;">Tên cây cảnh:</td>
                <td><input type="text" name="timten" style="padding: 8px; width: 80%;" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 20px;">
                    <input type="submit" name="tim" value="TÌM" style="background-color: #4CAF50; color: #fff; border: none; padding: 10px 20px; cursor: pointer;
                    font-size: 16px; margin-right: 10px;" />
                    <input type="reset" name="huy" value="HỦY" style="background-color: #ff6347; color: #fff; border: none; padding: 10px 20px; cursor: pointer;
                    font-size: 16px;" />
                </td>
            </tr>
        </table>
    </form>

</body>

</html>