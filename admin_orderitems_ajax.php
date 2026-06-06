<?php
include('database.php');

$statusid = isset($_GET['status_id']) ? (int) $_GET['status_id'] : 0;
$rowid = isset($_GET['rowid']) ? (int) $_GET['rowid'] : 0;
$pay_status = isset($_GET['pay_status']) ? (int) $_GET['pay_status'] : 0;


$update = "UPDATE `checkout` SET `Payment_Status`='$pay_status',`Order_Status`='$statusid' WHERE `Id`='$rowid'";
var_dump($update);
if (mysqli_query($con, $update)) {
    echo "updated";
    // echo "<script>window.location.href='admin_orderitems_page.php'</script>";
} else {
    echo "update error";
}
