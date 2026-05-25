<?php
include('database.php');


if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $totalamount = $_POST["totalamount"];
    $customerid = $_POST["customerid"];
    $addressid = $_POST["a_ddress_details"];
    $payment_methodid = $_POST["radioDefault"];
    echo $payment_methodid;

    //....credit_card.........//

    $card_holder_na = $_POST["card_holder_name"];
    $card_number = $_POST["cardnumber"];
    $card_expiry = $_POST["expiredate"];
    $card_cvv = $_POST["cvv"];

    $creditcard = $card_holder_na . " " . $card_number . " " . $card_expiry . " " . $card_cvv;
    // echo $creditcard;

    //.........paypal.........//

    $paypal_id = $_POST["upi_paypal"];
    $paypal_user = $_POST["paypal_holder"];

    $paypal = $paypal_id . " " . $paypal_user;
    // echo $paypal;

    //.........phone pay.........//

    $phonepay_id = $_POST["phonepay"];
    $phonepay_user = $_POST["phonepayholder"];

    $phone_pay = $phonepay_id . " " . $phonepay_user;
    // echo $phone_pay;

    //.........Gpay.........//

    $gpay_id = $_POST["Gpay"];
    $gpay_user = $_POST["Gpay_holder"];

    $Gpay = $gpay_id . " " . $gpay_user;
    // echo $Gpay;

    //.............................[multi_payment_checking]................................

    $paymentdetails = "";

    if ($payment_methodid == 1) {
        $paymentdetails = $creditcard;
    } elseif ($payment_methodid == 2) {
        $paymentdetails = $paypal;
    } elseif ($payment_methodid == 4) {
        $paymentdetails = $phone_pay;
    } elseif ($payment_methodid == 5) {
        $paymentdetails = $Gpay;
    } elseif ($payment_methodid == 7) {
        $cashondelivery = "Cash on delivery";
        $paymentdetails = $cashondelivery;
    }

    //...........................query..............................

    $insert = "INSERT INTO `checkout`(`Lid`, `AddressId`, `TotalAmount`, `PaymentMethod`, `PaymentDetails`) VALUES ('$customerid','$addressid','$totalamount','$payment_methodid','$paymentdetails')";
    var_dump($insert);
    if (mysqli_query($con, $insert)) {

        $checkoutid = mysqli_insert_id($con);

        $stment = "SELECT A.`Id`, A.`Lid`, A.`Product_Id`,`Count`,P.Price AS price,(`Count`* price) AS total FROM `add_to_cart` AS A 
                   INNER JOIN `product_add` AS P ON P.Id = A.Product_Id
                   WHERE A.`IsDeleted`=0";
        var_dump($stment);

        $data = mysqli_query($con, $stment);
        if (mysqli_num_rows($data) > 0) {
            while ($_result = mysqli_fetch_assoc($data)) {
                $product_id = $_result['Product_Id'];
                $l_id = $_result['Lid'];
                $count = $_result['Count'];
                $price = $_result['price'];
                $total_price = $_result['total'];

                $inser_2 = "INSERT INTO `order_items`(`CheckoutId`, `ProductId`, `Price`, `Count`, `TotalPrice`) VALUES ('$checkoutid','$product_id','$price','$count','$total_price')";
                var_dump($inser_2);
                if (mysqli_query($con, $inser_2)) {
                    echo "orderitems inserted";

                    $update = "UPDATE `add_to_cart` SET `IsDeleted`=1 WHERE Lid=$l_id";
                    if (mysqli_query($con, $update)) {
                        echo "deleted";
                    }
                } else {
                    echo "orderitems insert error!";
                }
            }
        } else {
            echo "select query error!";
        }

        echo "<script>window.location.href='payment_success_page.php?userid=$customerid'</script>";
        echo "<script>window.location.href='payment_success_page.php?checkoutid=$checkoutid'</script>";
    } else {
        echo "insert error";
    }
}
