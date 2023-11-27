<!DOCTYPE html>
<?php
  require("db/config.php");
?>

<html lang="en">
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
    <!-- them 4 cai nay vao device -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
.mySlides {display:none;}
</style>
  </head>
  <body>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
        *{
            padding: 0;
            margin: 0;
        }
        body{
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: white;
            line-height: 1.15;
        }
        #wrapper{
            max-width: 1170px;
            margin: 0 auto;
        }
        .headline{
            text-align: center;
            margin: 40px 0px;
        }
        h3{
            font-size: 18px;
            color: #111;
            padding: 10px 20px;
            text-transform: uppercase;
            border: 1px solid #bebebe;
            display: inline-block;
            color: #555;
            font-weight: 600;
        }
        ul.products{
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        ul.products li{
            flex-basis: 25%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
            margin-bottom: 30px;
        }
        ul.products li img{
            max-width: 100%;
            height: auto;
        }
        ul.products li .product-top{
            position: relative;
            overflow: hidden;
        }
        ul.products li .product-top .product-thumb{
            display: block;
        }
        ul.products li:hover .product-top .product-thumb img{
            filter: opacity(80%);
        }
        ul.products li .product-top .product-thumb img{
            display: block;
        }
        ul.products li .product-top a.buy-now{
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            display: block;
            background-color: #446084;
            color: #fff;
            padding: 10px 0px;
            position: absolute;
            bottom: -36px;
            width: 100%;
            transition: 0.25s ease-in-out;
            opacity: 0.85;
        }
        ul.products li:hover a.buy-now{
            bottom: 0px;
        }
        ul.products li .product-info{
            padding: 10px 0px;
        }
        ul.products li .product-info a{
            display: block;
            text-decoration: none;
        }
        ul.products li .product-info a.product-cat{
            font-size: 11px;
            text-transform: uppercase;
            color: #9e9e9e;
            padding: 3px 0px;
        }
        ul.products li .product-info a.product-name{
            color: rgb(80, 127, 215);
            padding: 3px 0px;
        }
        ul.products li .product-info .product-price{
            color: #111;
            padding: 2px 0px;
            font-weight: 600;
        }
    </style>
    <header>
      <img src="khoanh/banner.png" alt="" />
    </header>

    <nav>
      <div class="container">
        <ul>
          <li>
            <a href=""><img src="khoanh/logo.png" alt="" /></a>
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
                <a href="cart.php?view=cart"><i class="fa-solid fa-cart-shopping"> cart</a></i>
              </button></a
            >
          </li>
          <li><a href="">Lịch Sử <br> Đơn Hàng</a></li>
          <li>
            <a href=""> <span class="btn-content"><span class="btn-top"></span></span> Mua Thẻ Online</a>
          </li>
          <li><a href="#">24h Công Nghệ</a></li>
          <li><a href="dangky.php">Đăng ký</a></li>
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
  </div>
</section>
<!-- slide -->
  <div class="slider">
    <div class="container">
      <div class="slider-content">
        <div class="slider-content-left">
            <div class="slider-content-left-top w3-content w3-section" >
              <img class="mySlides" src="khoanh/slide1.png" >
              <img class="mySlides" src="khoanh/slide2.png" >
              <img class="mySlides" src="khoanh/slide3.png" >
            </div>

        </div>
        <div class="slider-content-right">
          <li><a href=""><img src="khoanh/pic1.png" alt=""></a></li>
          <li><a href=""><img src="khoanh/pic2.png" alt=""></a></li>
          <li><a href=""><img src="khoanh/pic3.png" alt=""></a></li>
          <li><a href=""><img src="khoanh/pic4.png" alt=""></a></li>
        </div>
      </div>
    </div>
  </div>
  <div id="wrapper">
        <div class="headline">
            <h3>Sản phẩm mới cập nhật</h3>
        </div>
    </div>
    <ul class="products">
            <?php
              $sql = 'SELECT * FROM sanpham WHERE cate_id';
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){
            ?>
        <li>
            <div class="product-item">
                <div class="product-top">
                    <a href="" class="product-thumb">
                        <img src="<?php echo $row["image"] ?>" alt="">
                    </a>
                </div>
                <div class="product-info">
                    <a href="" class="product-name"><?php echo $row["title"] ?></a>
                    <div class="product-price">Giá: <?php echo $row["giatien"] ?><sup>VND</sup></div>
                </div>
            </div>
        </li>
            <?php
              }
            ?>
    </ul>    
    <script>
      var myIndex = 0;
      carousel();
      
      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
      }
      </script>
  </body>
</html>
