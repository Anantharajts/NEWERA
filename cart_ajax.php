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
    } else {

        $loginerid = $_POST["loginerid"];

        $stment = "SELECT A.`Id` AS rowid,(`Count`* `price`) AS subtotal,P.Price AS p_price FROM `add_to_cart` AS A 
                         INNER JOIN `product_add` AS P ON P.Id = A.Product_Id
                         WHERE A.IsDeleted=0 AND A.Lid=$loginerid";

        // var_dump($stment);
        $d1 = mysqli_query($con, $stment);
        if (mysqli_num_rows($d1) > 0) {

            $subtotal = 0;


            while ($_result = mysqli_fetch_assoc($d1)) {

                $subtotal += $_result["subtotal"];
                $delivery = $subtotal < 3000 ? "50" : "0";
            }

            $total = $subtotal + $delivery;

            echo json_encode([
                "subtotal" => $subtotal,
                "delivery" => $delivery,
                "total" => $total
            ]);
        }
    }
} else {
    echo "error";
}
