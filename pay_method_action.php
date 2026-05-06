<?php
include('database.php');

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $payment = $_POST["payment"];

    

    $stment = "SELECT `Id` FROM `payment_method_add` WHERE `Paymenrt_Method`='$payment'";
    var_dump($stment);
    $data = mysqli_query($con, $stment);
    if (mysqli_num_rows($data) > 0) {
        echo "Already Exsist";
        echo "<script>window.location.href='payment_method_add.php'</script>";
    } else {
        $insert = "INSERT INTO `payment_method_add`( `Paymenrt_Method`) VALUES ('$payment')";
        var_dump($insert);
        if (mysqli_query($con, $insert)) {
            echo "Insert";
            echo "<script>window.location.href='payment_method_add.php'</script>";
        }
    }
}
