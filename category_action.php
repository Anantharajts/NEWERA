<?php
include('database.php');

if (isset($_POST["cate_addbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST["category"];
    $cateid = $_POST["cate_id"];


    if ($cateid != 0) {

        $update = "UPDATE `category` SET `Name`='$category' WHERE `Id`=$cateid";
        var_dump($update);
        if (mysqli_query($con, $update)) {
            echo "update";
            header('location:category_add_section.php');
        } else {
            echo "not update";
        }
    } else {
        $stment = "SELECT `Id` FROM `category` WHERE `Name`='$category'";
        // var_dump($stment);
        $data = mysqli_query($con, $stment);
        if (mysqli_num_rows($data) > 0) {
            echo "already exist";
            header('location:category_add_section.php');
        } else {
            $insert = "INSERT INTO `category`( `Name`) VALUES ('$category')";
            // var_dump($insert);

            if (mysqli_query($con, $insert)) {
                echo "Insert";
                header('location:category_add_section.php');
            } else {
                echo "not insert";
            }
        }
    }
}
