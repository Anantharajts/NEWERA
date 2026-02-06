<?php
include('database.php');

if(isset($_POST["loginbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

$username= $_POST["firstname"];
$email= $_POST["Email"];
$password= $_POST["password"];



// $insert="INSERT INTO `login`(`UserName`, `Emailid`, `Password`) VALUES ('$username','$email','$password')";
// var_dump($insert);
// if(mysqli_query($con,$insert)){
//     echo "inserted";
//     // header('location:login.php');
// }
// else{
//     echo "not inserted";
// }

}




?>