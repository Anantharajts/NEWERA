<?php
include('database.php');

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    echo $pro_id = $_POST["product_id"];
    echo $loginer_id = $_POST["customerid"];
    echo $cart_id = $_POST["cartid"];


    $stment2 = "SELECT `Id` FROM `add_to_cart` WHERE `Lid`=$loginer_id AND `Product_Id`=$pro_id";
    var_dump($stment2);
    $data = mysqli_query($con, $stment2);
    if (mysqli_num_rows($data) > 0) {
        echo "already exsist";

        $update = "UPDATE `add_to_cart` SET  `Count`=(`Count`+1) WHERE `Id`=$cart_id AND `Lid`=$loginer_id AND `Product_Id`=$pro_id";
        var_dump($update);
        if (mysqli_query($con,$update)) {
            echo "updated";
        } else {
            echo "updated error";
        }
    } else {
        $stment = "INSERT INTO `add_to_cart`(`Lid`, `Product_Id`) VALUES ($loginer_id,$pro_id)";
        var_dump($stment);
        if (mysqli_query($con, $stment)) {
            echo "insert";
        } else {
            echo "insert error";
        }
    }

    header('location:add_to_cart.php?prodacutid1='.$pro_id);
}
