<?php
include('database.php');


if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

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
    echo $Gpay;





}
