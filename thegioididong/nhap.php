<!-- slide product -->
<!-- cái này là nháp -->
<section class="list-product-1" >
    <div class="container">
      <div class="list-product-1-content">
        <div class="list-product-1-content-title">
          <h2><b><i>Săn Sale Online</i></b></h2>
        </div>
        <?php
             $sql = 'SELECT * FROM sanpham WHERE cate_id = '.$_GET["id"];
             $result = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_array($result)){
        ?>
          <div class="list-product-1-content-series-item">
            <img src="<?php echo $row["image"] ?>" alt="">
              <li><?php echo $row["title"] ?></li>
              <li>Online giá rẻ</li>
              <li>Giá: <?php echo $row["giatien"] ?> <sup>VND</sup></li>
              <li>Quà tặng lên tới 500.000 <sup>đ</sup></li>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>