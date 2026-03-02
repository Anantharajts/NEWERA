<?php
include('database.php');

if (isset($_POST["b_addbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $brand = $_POST["brand"];


    $stment = "SELECT `Id` FROM `brand` WHERE `Name`='$brand'";
    var_dump($stment);
    $data = mysqli_query($con, $stment);
    if (mysqli_num_rows($data) > 0) {
        echo "already exist";
        header('location:brand_add_section.php');
    } else {
        $insert = "INSERT INTO `brand`( `Name`) VALUES ('$brand')";
        var_dump($insert);
        if (mysqli_query($con, $insert)) {
            echo "Insert";
            header('location:brand_add_section.php');
        } else {
            echo "Not Insert";
        }
    }

}
