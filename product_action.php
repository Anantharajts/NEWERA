<?php

include('database.php');

if (isset($_POST["productbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $pr_name = $_POST["productname"];
    $brand = $_POST["brand"];
    $description = $_POST["desscription"];
    $image = $_POST["image"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $status = $_POST["p_status"];
    $category = $_POST["category"];



    $stment = $con->prepare("SELECT `Id` FROM `product_add` WHERE `Name`=? AND `BrandId`=?");
    $stment->bind_param('si', $pr_name, $brand);
    $stment->execute();
    $result = $stment->get_result();
    if ($result->num_rows > 0) {
        echo "already exist";
        header('location:product_add_section.php');
    } else {

        $insert = $con->prepare("INSERT INTO `product_add`(`Name`, `BrandId`, `Description`, `Image`, `Price`, `Quantity`, `Status`, `CategoryId`) VALUES (?,?,?,?,?,?,?,?)");
        $insert->bind_param('sissdiii', $pr_name, $brand, $description, $image, $price, $quantity, $status, $category);
        if ($insert->execute()) {
            echo "inserted";
            header('location:product_add_section.php');
        } else {
            echo "error on insert";
        }

    }


}


?>