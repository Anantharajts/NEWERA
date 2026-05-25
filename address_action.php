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
    $edit = $_POST['rowid'];
    $userid = $_POST["userid"];


    if ($edit != 0) {

        $update = "UPDATE `shipping_info` SET `FirstName`='$first_name',`PhoneNumber`='$phonenumber',`Address`='$address',`Country`='$country',`State`='$state',`City/Town`='$citytown',`ZipCode`='$zipcode'
             WHERE `Id`='$edit' AND `Lid`='$userid'";
        var_dump($update);
        if (mysqli_query($con, $update)) {
            echo "<script>alert('Your Address Changed')</script>";
            echo "<script>window.location.href='address_add_section.php'</script>";
        }
    } else {
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
}
