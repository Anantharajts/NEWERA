<?php
include('database.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $count = $_POST["input_2"] ?? "";
    $rowid = $_POST["row_id2"] ?? "";
    $type = $_POST["type"] ?? "";



    if ($type == 1) {
        $update = "UPDATE `add_to_cart` SET `Count`= $count WHERE `Id`=$rowid";

        var_dump($update);
        $data = mysqli_query($con, $update);
        if (mysqli_num_rows($data) > 0) {
            echo "count value is increased";
        }
    }
    else{
        echo "error alert";
    }
}
