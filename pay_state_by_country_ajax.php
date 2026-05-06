<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $c_id = $_POST["cid"] ?? "";

    $state_q = "SELECT `Id`, `State` FROM `state` WHERE `CountryId`=$c_id";
    // var_dump($state_q);

    $data4 = mysqli_query($con, $state_q);
    echo '<option value=' . '"0"' . '>' . 'Select State' . '</option>';
    if (mysqli_num_rows($data4) > 0) {

        while ($_result = mysqli_fetch_assoc($data4)) {

            $state_value = $_result["Id"];
            $state = $_result["State"];

            echo '<option value=' . '"' . $state_value . '"' . '>' . $state . '</option>';
        }
    }
} else {
    echo "error";
}
