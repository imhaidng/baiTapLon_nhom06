<?php
    require("db/config.php");

    //thêm mới dữ liệu
    if(isset($_POST["insert"])){
        $name = $_POST["name"];
        $status = $_POST["Status"];
        $sql = "insert into danhmuc(name, Status) values(N'$name',$status)";
        if (mysqli_query($conn, $sql)) {
            header("location:quantridanhmuc.php");
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    //thao tác xóa dữ liệu
    if(isset($_GET["task"]) && $_GET["task"] == "delete"){
        $id = $_GET["id"];
        echo $id;
        $sql = "delete from danhmuc where id=".$id;
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
    </head>
    <body>
        <div class="container">
            <a class="btn btn-danger" href="quantrisanpham.php">Trang quản trị sản phẩm</a>
            <h1 style="text-align:center;">Trang quản trị danh mục</h1>
            <div class="row">
                <form action="quantridanhmuc.php" method="post">
                    Nhập vào tên danh mục:
                    <input class="form-control" type="text" name="name" id="">
                    
                    <br>
                    Nhập vào trạng thái:
                    <!-- <input class="form-control" type="text" name="status" id=""> -->
                    <select class="form-control" name="Status" id="">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                    <br>
                    <input class="btn btn-primary" name="insert" type="submit" value="Thêm mới">
                </form>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                        // $i=1;
                        // while($i<10){
                        //     echo $i;
                        //     $i++;
                        // }
                        $sql = "select * from danhmuc order by id DESC";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$row["id"]."</td>";
                                echo "<td>".$row["name"]."</td>";
                                if($row["Status"] == 1){
                                    echo "<td>Hiển thị</td>";
                                }else{
                                    echo "<td>Ẩn</td>";
                                }
                                
                                echo "<td>";
                                echo "<a class='btn btn-warning' href='sua_danhmuc.php?task=update&id=".$row["id"]."'>Sửa</a>";
                                echo "<a class='btn btn-danger' href='quantridanhmuc.php?task=delete&id=".$row["id"]."'>Xóa</a>";
                                echo "</td>";
                                echo "</tr>";
                               
                            }
                        }
                        else{
                            echo "không có dữ liệu trong bảng";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </body>
</html>