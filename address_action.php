<?php
include('database.php');

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST["first"];
    $phonenumber = $_POST["phone"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $citytown = $_POST["city"];
    $zipcode = $_POST["zipcode"];
    $userid = $_POST["userid"];

    $stment = "SELECT `Id` FROM `shipping_info` WHERE `FirstName`='$first_name' AND `PhoneNumber`='$phonenumber' AND `Lid`=$userid  AND `Address`='$address'";
    var_dump($stment);
    $data = mysqli_query($con, $stment);
    if (mysqli_num_rows($data) > 0) {

        echo "<script>alert('Already Exsist')</script>";
        echo "<script>window.location.href='address_add_section.php'</script>";
    } else {
        $insert = "INSERT INTO `shipping_info`(`Lid`, `FirstName`, `PhoneNumber`, `Address`, `Country`, `State`, `City/Town`, `ZipCode`) 
                   VALUES ('$userid','$first_name','$phonenumber','$address','$country','$state','$citytown','$zipcode')";
        var_dump($insert);

        if (mysqli_query($con, $insert)) {
            echo "<script>window.location.href='address_add_section.php'</script>";
        } else {
            echo "not insert";
        }
    }
}
