<?php
    require("db/config.php");
    session_start();
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = $_POST['matkhau'];
        $diachi = $_POST['diachi'];
        $sql_dangky = mysqli_query($conn,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            header("location:cart.php");
            echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
            $_SESSION['dangky'] = $tenkhachhang;
        }
    }

?>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="main.css" />
        <link rel="icon" href="khoanh/logoshopee.png" />
        <link
        rel="stylesheet"
        href="./font/fontawesome-free-6.2.0-web/css/all.min.css"
        />
        <link rel="icon" href="khoanh/logotggd.jpg" />
        <title>Mobile World</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            table.dangky tr td {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <p>Dăng ký thành viên</p>
        <!-- cho css ở đây -->
        <form action="" method="POST">
        <table class="dangky" border="1" width="50%" style="borde-collapse: collapse;" >
            <tr>
                <td>Họ và Tên</td>
                <td><input type="text" size="50" name="hovaten"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" size="50" name="email"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" size="50" name="dienthoai"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" size="50" name="diachi"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" size="50" name="matkhau"></td>
            </tr>
            <tr>
                <td><input type="submit" name="dangky" value="Đăng ký"></td>
                <td><a href="dangnhap.php">Đăng nhập</a></td>
            </tr>
        </table>
        </form>
    </body>
</html>