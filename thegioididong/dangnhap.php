<!DOCTYPE html>
<?php
    session_start();
    require("db/config.php");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link rel="icon" href="logo/logotggd.jpg" />
    <title>Login To Ask</title>
  </head>
  <body>
    <div id="wrapper">
      <?php
        if(isset($_POST['dangnhap'])){
            $email = $_POST['email'];
            $matkhau = $_POST['password'];
            $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
            $row = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($row);
            if($count>0){
                $row_data = mysqli_fetch_array($row);
                $_SESSION['dangky'] = $row_data['tenkhachhang'];
                header("location:cart.php");
            }else{
                echo '<p style="color:red">Mật khẩu hoặc Email sai, vui lòng nhập lại. </p>';
            }     
        }
      ?>

      <form action="" method="POST" >
        <h3>Đăng nhập</h3>
        <!-- cho css ở đây -->
        <div class="form-group">
          <input type="text" name="email" required />
          <label for="">Email</label>
        </div>

        <div class="form-group">
          <input type="password" name="password" required />
          <label for="">Mật khẩu</label>
        </div>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
      </form>
    </div>
  </body>
</html>