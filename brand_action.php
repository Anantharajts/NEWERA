<?php
include('database.php');

if (isset($_POST["b_addbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $brand = $_POST["brand"];
    $b_id = $_POST["bid"];

    if ($b_id != 0) {

        $update = "UPDATE `brand` SET `Name`='$brand' WHERE `Id`=$b_id";
        var_dump($update);
        if (mysqli_query($con, $update)) {

            echo "updated";
            header('location:brand_add_section.php');
        }

        else{
            echo "not updated";
        }

    } else {
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

}
