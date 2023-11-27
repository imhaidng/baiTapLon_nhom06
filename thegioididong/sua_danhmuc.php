<?php
    //include("db/config.php");
    //cách 2
    require("db/config.php");
    
    //thao tác sửa dữ liệu
    if(isset($_POST["update"])){
        $name = $_POST["name"];
        $status = $_POST["status"];
        $id = $_POST["id"];
        $sql = "update danhmuc set name = N'$name',Status = $status where id=".$id;
        if (mysqli_query($conn, $sql)) {
            header("location:quantridanhmuc.php");
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
            <h1 style="text-align:center">Chỉnh sửa danh mục</h1>
            <div class="row">
                <form class="col-6" action="sua_danhmuc.php" method="post">
                    
                    <?php
                        if(isset($_GET["task"]) && $_GET["task"]=="update")
                        {
                            $cate_id = $_GET["id"];
                            $sql = "select * from danhmuc where id = $cate_id";
                            //echo $sql;
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
        
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                                    echo "Nhập tên danh mục:";
                                    echo "<input value='".$row["name"]."' class='form-control' type='text' name='name'>";
                                    //echo "<input class='form-control' type='text' name='title'>";                    
                                    echo "Nhập vào trạng thái";
                                    echo "<input value='".$row["Status"]."' class='form-control' type='text' name='status'>";
                                }
                            }
                        }
                    ?>
                    
                    <input type="submit" name="update" value="Chỉnh sửa" class="btn btn-primary">
                    <a class="btn btn-danger" href="quantridanhmuc.php">Hủy</a>
                </form>
            </div>
            <!--bảng nội dung tin tức-->
            
        </div>
    </body>
</html>