<?php
include('database.php');

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $countryname = $_POST["country"];



    $stmt = "SELECT `Id`,`Country` FROM `country` WHERE `Country`='$countryname'";
    var_dump($stmt);

    $data = mysqli_query($con, $stmt);

    if (mysqli_num_rows($data) > 0) {

        echo "already insert";
        // header('location:country_add_section.php');
    } else {

        $insert = "INSERT INTO `country`(`Country`) VALUES ('$countryname')";
        var_dump($insert);

        if (mysqli_query($con, $insert)) {
            echo "country add";
             header('location:country_add_section.php');
        } else {
            echo ("country not add");
        }
    }
}
