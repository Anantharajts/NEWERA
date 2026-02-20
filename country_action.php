<?php
include('database.php');

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $countryname = $_POST["country"];
    echo $id = $_POST["id"];


    if ($id != 0) {

        $update = "UPDATE `country` SET `Country`='$countryname' WHERE Id=$id";
        if(!mysqli_query($con, $update)) {
            die("not updated");
        }

    } else {
        $stmt = "SELECT `Id`,`Country` FROM `country` WHERE `Country`='$countryname'";
        

        $data = mysqli_query($con, $stmt);

        if (mysqli_num_rows($data) > 0) {
                echo "<script>alert('Already Exist')</script>";
                die("Exist");
        } else {

            $insert = "INSERT INTO `country`(`Country`) VALUES ('$countryname')";
            var_dump($insert);

            if (mysqli_query($con, $insert)) {

            } else {
                die ("country not add");
            }
        }
    }

    header('location:country_add_section.php');
}
