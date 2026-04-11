<?php
include('database.php');

$productid = isset($_GET['pid']) ? $_GET['pid'] : '';
$loginerid = isset($_GET['lid']) ? $_GET['lid'] : '';

echo $productid;
echo $loginerid;


$query1 = "SELECT `Id` FROM `my_wishlist` WHERE `IsDeleted`=0";
var_dump($query1);

$data = mysqli_query($con,$query1);
if (mysqli_num_rows($data)>0) {
    echo "already add to fav";
} else {
    $query = "INSERT INTO `my_wishlist` (`Lid`, `Product_Id`) VALUES ($loginerid,$productid)";
    var_dump($query);
    if (mysqli_query($con, $query)) {

        echo 'add to fav';
    }
}
