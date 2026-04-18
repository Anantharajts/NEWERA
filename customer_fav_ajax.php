<?php
include('database.php');

$productid = isset($_GET['pid']) ? $_GET['pid'] : '';
$loginerid = isset($_GET['lid']) ? $_GET['lid'] : '';
$rowid = isset($_GET['w_rowid']) ? $_GET['w_rowid'] : '';


// $update = "UPDATE my_wishlist 
//            SET Favourite = IF(Favourite = 1, 0, 1) 
//            WHERE Id = $rowid";

// if (mysqli_query($con, $update)) {
//     echo "Favorite toggled";
// } else {
//     echo "Error updating";
// }


$query1 = "SELECT `Id` FROM `my_wishlist` WHERE IsDeleted=0  AND  `Lid`=$loginerid AND `Product_Id`=$productid";
// var_dump($query1);

$data = mysqli_query($con, $query1);
if (mysqli_num_rows($data) > 0) {
    echo "already add to fav";

    $query3 = "SELECT `Id` FROM `my_wishlist` WHERE `Favourite`=1 AND Id=$rowid";
     
    $data1 = mysqli_query($con, $query3);

    if (mysqli_num_rows($data1) > 0) {

        $update1 = "UPDATE `my_wishlist` SET `Favourite`=0 WHERE Id=$rowid";
        // var_dump($update1);
        if (mysqli_query($con, $update1)) {
            echo "Favourate deleted";
        }
    } else {

        $update = "UPDATE `my_wishlist` SET `Favourite`=1 WHERE Id=$rowid";
        // var_dump($update);
        if (mysqli_query($con, $update)) {
            echo "Favourate readded";
        }
    }
} else {
    $query = "INSERT INTO `my_wishlist` (`Lid`, `Product_Id`) VALUES ($loginerid,$productid)";
    // var_dump($query);
    if (!mysqli_query($con, $query)) {

        echo "error";
    }
}
