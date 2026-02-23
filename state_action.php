<?php
include('database.php');

if (isset($_POST["s_addbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $state = $_POST["state"];
    $country = $_POST["country"];
    $row_id = $_POST["eid"];

    if ($row_id != 0) {

        $update = "UPDATE `state` SET `CountryId`=$country,`State`='$state' WHERE `Id`=$row_id";
        // var_dump($update);

        if (!mysqli_query($con, $update)) {
           die("Something went wrong......!");
        } 
    } else {
        $stment = "SELECT `Id`, `CountryId`, `State` FROM `state` WHERE CountryId=$country  AND  State='$state'";
        // var_dump($stment);
        $data = mysqli_query($con, $stment);
        if (mysqli_num_rows($data) > 0) {
           die("Already Exsist");
        } else {
            $insert = "INSERT INTO `state`( `CountryId`,`State`) VALUES ($country,'$state')";

            // var_dump($insert);
            if (!mysqli_query($con, $insert)) {

                die("Something went wrong......!");
            } 
        }
    }

    header('location:state_add_section.php');
}
