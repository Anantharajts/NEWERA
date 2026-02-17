<?php
session_start();
include('database.php');

if(isset($_POST["loginbtn"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

$username= $_POST["username"];
$password= $_POST["password"];


$stment="SELECT `Id`,`Usertype` FROM `login` WHERE `UserName`='$username'  AND `Password`=$password";
var_dump($stment);

$data=mysqli_query($con,$stment);
if(mysqli_num_rows($data)>0){
    $result=mysqli_fetch_assoc($data);

    $_SESSION["Id"] = $result["Id"];
    $_SESSION["Usertype"] = $result["Usertype"];

    if($_SESSION["Usertype"]== 1 || $_SESSION["Usertype"]== 3 ){
        echo "hi";
        header('location:admin.php');
    }

    elseif($_SESSION["Usertype"]== 2){
        // echo "hi' i am customer";
        header('location:customer.php');
    }
}

}

?>