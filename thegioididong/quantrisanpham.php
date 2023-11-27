<?php
    //include("db/config.php");
    //cách 2
    require("db/config.php");
    if(isset($_POST["insert"])){
        $cate_id = $_POST["cate_id"];
        $title = $_POST["title"];
        $giatien = $_POST["giatien"];
        $status = $_POST["status"];
        $target_dir = "upload/";
        // Đường dẫn file sẽ được upload lên server
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        //echo $target_file;
        //biến kiểm tra điều kiện (đúng định dạng ko, có quá kích cỡ file, file đó đã tồn tại trên server hay chưa)
        $uploadOk = 1;
        //lấy ra định dạng file upload ví dụ pdf, png, vvv
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //echo $FileType;
        //kiểm tra xem có đúng định dạng file ảnh hay không
        // Allow certain file formats
        if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
            && $FileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) 
        {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } else 
        {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
              
                $sql_insert = "insert into sanpham(cate_id,title, image,giatien,status) values($cate_id,N'$title','$target_file',N'$giatien',$status)";
                if (mysqli_query($conn, $sql_insert)) {
                    header("location:quantrisanpham.php");
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
        }      
    }
    //thao tác xóa dữ liệu
    if(isset($_GET["task"]) && $_GET["task"] == "delete"){
        $sp_id = $_GET["id"];
        //echo $cate_id;
        $sql = "delete from sanpham where sp_id=".$sp_id;
        if (mysqli_query($conn, $sql)) {
            header("location:quantrisanpham.php");
            echo "Delete record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
?>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    </head>
    <body>
        <div class="container" style="margin-bottom:300px;">
        <a class="btn btn-danger" href="quantridanhmuc.php">Trang quản trị danh mục</a>
            <h1 style="text-align:center">Trang quản trị sản phẩm</h1>
            <!--thêm mới tin tức-->
            <div class="row">
                <form class="col-6" action="quantrisanpham.php" method="post" enctype="multipart/form-data">
                    Chọn danh mục tin tức:
                    <select class="form-control" name="cate_id" id="">
                        <?php
                            $sql = "select * from danhmuc order by id DESC";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
        
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                                }
                            }
                        ?>
                        
                    </select>
                    <br/>
                    Nhập tiêu đề:
                    <input class="form-control" type="text" name="title" id="">
                    <br>
                    Chọn ảnh đại diện:
                    <input class="form-control" type="file" name="img" id="">
                    <br>
                    Nhập vào giá tiền:
                    <input class="form-control" type="text" name="giatien" id="">
                    <br>
                    Nhập trạng thái:
                    <input class="form-control" type="text" name="status" id="">
                    <br>
                    <input class="btn btn-primary" type="submit" name="insert" value="Thêm mới">
                    <br>
                    Nhập tiêu đề:
                    <input class="form-control" type="text" name="search" id="">
                    <br>
                    <input type="submit" value="Tìm kiếm" name="btn_search" class="btn btn-danger">
                </form>
            </div>
            <!--bảng nội dung tin tức-->
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <th>Danh mục</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Giá tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                        $sql = "";
                        if(isset($_POST["btn_search"])){
                            $search = $_POST["search"];
                            $sql = "select * from sanpham where title like '%$search%' order by sp_id DESC";
                        }
                        else
                        {
                            $sql = "select * from sanpham order by sp_id DESC";
                        }
                        
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
    
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<tr>";
                                echo "<td>".$row["cate_id"]."</td>";
                                echo "<td>".$row["title"]."</td>";
                                echo "<td><img width='300px;' src='".$row["image"]."'></td>";
                                echo "<td>".$row["giatien"]."</td>";
                                if($row["status"] == 1){
                                    echo "<td>Hiển thị</td>";
                                }
                                else{
                                    echo "<td>Ẩn</td>";
                                }
                                
                                echo "<td>";
                                echo "<a class='btn btn-warning' href='sua.php?task=update&id=".$row["sp_id"]."'>Sửa</a>";
                                echo "<a class='btn btn-danger' href='quantrisanpham.php?task=delete&id=".$row["sp_id"]."'>Xóa</a>";
                                echo "</td>";
                                echo "</tr>";
                                
                            }
                        } 
                        else 
                        {
                            echo "0 results";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </body>
</html>