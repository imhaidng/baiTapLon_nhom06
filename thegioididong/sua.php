<?php
    //include("db/config.php");
    //cách 2
    require("db/config.php");
    
    //thao tác sửa dữ liệu
    if(isset($_POST["update"])){
        //$cate_id = $_GET["id"];
        //echo $cate_id;
        $title = $_POST["title"];
        $giatien = $_POST["giatien"];
        $status = $_POST["status"];
        $sp_id = $_POST["sp_id"];
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
        }else{
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){

                $sql = "update sanpham set  title = N'$title',giatien = N'$giatien',image = '$target_file', status = $status where sp_id=".$sp_id;
                if (mysqli_query($conn, $sql)) {
                    header("location:quantrisanpham.php");
                    echo "Delete record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }else {
                echo "Sorry, there was an error uploading your file.";
            }
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
            <h1 style="text-align:center">Chỉnh sửa giá sản phẩm</h1>
            <!--thêm mới tin tức-->
            <div class="row">
                <form class="col-6" action="sua.php" method="post" enctype="multipart/form-data">
                    
                    <?php
                        if(isset($_GET["task"]) && $_GET["task"]=="update")
                        {
                            $cate_id = $_GET["id"];
                            $sql = "select * from sanpham where sp_id = $cate_id";
                            //echo $sql;
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
        
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<input type='hidden' name='sp_id' value='".$row["sp_id"]."'>";
                                    echo "Nhập tên:";
                                    echo "<input value='".$row["title"]."' class='form-control' type='text' name='title'>";
                                    echo "Nhập giá:";
                                    echo "<input value='".$row["giatien"]."' class='form-control' type='text' name='giatien'>";
                                    echo "Chon anh:";
                                    echo "<input value='".$row["image"]."' class='form-control' type='file' name='img'>";
                                    //echo "<input class='form-control' type='text' name='title'>";                    
                                    echo "Nhập vào trạng thái";
                                    echo "<input value='".$row["status"]."' class='form-control' type='text' name='status'>";
                                }
                            }
                        }
                    ?>
                    
                    <input type="submit" name="update" value="Chỉnh sửa" class="btn btn-primary">
                    <a class="btn btn-danger" href="quantrisanpham.php">Hủy</a>
                </form>
            </div>
            <!--bảng nội dung tin tức-->
            
        </div>
    </body>
</html>