<!DOCTYPE html>
<?php
  require("db/config.php");

?>
<html lang="en">
  <head>
  <?php session_start(); ?>
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
    <title>mobile world</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <style>
    .mySlides {display:none;}
    .text-center{
      text-align: center;
    }
    </style>
  </head>
  <body>
    <header>
      <img src="khoanh/banner.png" alt="" />
    </header>

    <nav>
      <div class="container">
        <ul>
          <li>
            <a href="index.php"><img src="khoanh/logo.png" alt="" /></a>
          </li>
          <li><h4>Tham khảo giá khuyến mãi tại</h4>
            <a href="">Lào Cai</a>
              <i class="fa-solid fa-sort-down"></i
            ></a>
          </li>
          <li>
            <input type="text" placeholder="Tìm kiếm..." /><i class="fa-solid fa-magnifying-glass"></i>
          </li>
          <li>
            <a href=""
              ><button>
                <i class="fa-solid fa-cart-shopping"> cart</i>
              </button></a
            >
          </li>
          <li><a href="">Lịch Sử <br> Đơn Hàng</a></li>
          <li>
            <a href=""> <span class="btn-content"><span class="btn-top"></span></span> Mua Thẻ Online</a>
          </li>
          <li><a href="#">24h Công Nghệ</a></li>
          <li><a href="#">Hỏi Đáp</a></li>
          <li><a href="#">Game App</a></li>
        </ul>
      </div>
    </nav>
<section class="menu-bar">
<div class="container">
        <?php
             $sql = "select * from danhmuc order by id DESC";
             $result = mysqli_query($conn,$sql);
        ?>
      <div class="menu-bar-content">
        <ul>
        <?php
            while($row = mysqli_fetch_array($result)){
        ?>
        <li></a><a href="device.php?quanly=danhmucsanpham&id=<?php echo $row['id']?>"></i><?php echo $row['name'] ?></a></li>
        <?php
            }
        ?>
      </ul>
    </div>
        
    <div class="menu-bar-content">
      <div class="row">
        <p>Giỏ hàng
          <?php
            if(isset($_SESSION['dangky'])){
              echo  'xin chào:'.'<span style="color:red" >'.$_SESSION['dangky'].'</span>';
            }
          ?>
        </p>
                <table class="table table-striped">
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Ảnh</th>
                      <th>Giá tiền</th>
                      <th>Thành tiền</th>
                    </tr>
                    
                    <?php
                      if(isset($_SESSION["cart"])){
                        $tongtien = 0;
                        foreach ($_SESSION["cart"] as $key => $value){
                          $thanhtien = $value["price"];
                          $tongtien+=$thanhtien;
                    ?>

                    <tr>
                    <td><?php echo $value["name"] ?></td>
                    <td><img width="50px" src="<?php echo $value["image"] ?>" alt=""></td>
                    <td><?php echo number_format($value["price"],0,',','.').'vnd'; ?></td>
                    <td><?php echo number_format($thanhtien,0,',','.').'vnd'; ?></td>

                    </tr>
                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan = "6"><p>Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnd'; ?> </p></td>
                      <div style="clear: both;" ></div>
                      <?php
                        if(isset($_SESSION['dangky'])){
                      ?>
                      <p><a href="thanhtoan.php">Đặt hàng</a></p>
                      <?php
                        }else{
                      ?>
                        <p><a href="dangky.php">Đăng ký đặt hàng</a></p>
                      <?php
                        }
                      ?>  
                    </tr>
                    <?php
                    } else {
                    ?>  
                    <tr>
                      <td colspan = "6"><p>Giỏ hàng trống</p></td>
                    </tr>
                    <?php
                      }
                    ?>
                </table>
            </div>
    </div>
  </div>
</body>
</html>