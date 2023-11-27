<?php
    session_start();
    if(isset($_POST["id"])){
        require("db/config.php");
        $id = $_POST["id"];
        $sql = "SELECT * FROM sanpham WHERE sp_id = ".$id;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row($result);
        if(!isset($_SESSION["cart"])){
            $cart = array();
            $cart[$id] = array(
                'name'=>$row[2],
                'price'=>$row[4],
                'image'=>$row[3]
            );
        }else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id, $cart)){
                $cart[$id] = array(
                    'name'=>$row[2],
                    'price'=>$row[4],
                    'image'=>$row[3]
                );
            }else{
                $cart[$id] = array(
                    'name'=>$row[2],
                    'price'=>$row[4],
                    'image'=>$row[3]
                );
            }
        }
        $_SESSION["cart"] = $cart;
        echo "<pre>";
        print_r($_SESSION["cart"]);
        die;
    }
?>
<!-- không được đụng vào -->