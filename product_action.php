<?php

include('database.php');

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $pr_name = $_POST["productname"];
    $rowid = $_POST["updateid"];
    $brand = $_POST["brand"];
    $description = $_POST["desscription"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $status = $_POST["p_status"];
    $category = $_POST["category"];

    $path = "";

    if ($_FILES["image"]["name"] != "") {
        $im_path = $_FILES["image"]["name"];
        $target = "assets/IMG/product_img/";
        // var_dump($_FILES["image"]);
        $bookimage = basename($_FILES["image"]["name"]);
        $path = $target . $bookimage;
    } else {
        $im_path = $_POST["bookimg"];
    }


    if ($rowid != 0) {

        $update = $con->prepare("UPDATE `product_add` SET `Name`=?,`BrandId`=?,`Description`=?,
                      `Image`=?,`Price`=?,`Quantity`=?,`Status`=?,`CategoryId`=? WHERE Id=?");

        $update->bind_param('sissdiiii', $pr_name, $brand, $description, $im_path, $price, $quantity, $status, $category, $rowid);
        if ($update->execute()) {
            if ($_FILES["image"]["name"] != "") {

                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                    echo "Not Uploaded";
                    exit;
                }
            }

            echo "<script>window.location.href='product_table.php'</script>";
        } else {
            echo "error on updation";
        }
    } else {
        $stment = $con->prepare("SELECT `Id` FROM `product_add` WHERE `Name`=? AND `BrandId`=? AND `CategoryId`=? AND `Price`=?");
        $stment->bind_param('siid', $pr_name, $brand, $category, $price);
        $stment->execute();
        $result = $stment->get_result();
        if ($result->num_rows > 0) {
            echo "already exist";
            echo "<script>window.location.href='product_table.php'</script>";
        } else {

            $insert = $con->prepare("INSERT INTO `product_add`(`Name`, `BrandId`, `Description`, `Image`, `Price`, `Quantity`, `Status`, `CategoryId`) VALUES (?,?,?,?,?,?,?,?)");
            $insert->bind_param('sissdiii', $pr_name, $brand, $description, $bookimage, $price, $quantity, $status, $category);
            if ($insert->execute()) {
                echo "inserted";
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                    echo "Uploaded";
                }
                echo "<script>window.location.href='product_table.php'</script>";
            } else {
                echo "error on insert";
            }
        }
    }
}
