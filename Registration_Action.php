<?php
include('database.php');

if(isset($_POST["sign_up"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

//...............login............................    
$username=$_POST["username"];
$password=$_POST["password"];
//..............registration......................
$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$phone=$_POST["phone"];
$whatsapp=$_POST["whatsapp"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$address=$_POST["address"];
$email=$_POST["email"];
$country=$_POST["country"];
$state=$_POST["state"];
$city_town=$_POST["c_t"];
$zipcode=$_POST["zipcode"];


$l_insert=$con->prepare("INSERT INTO `login` (`UserName`, `Password`) VALUES (?,?)");

$l_insert->bind_param('ss',$username,$password);

if($l_insert->execute()){
    echo "inserted";
    $lid=mysqli_insert_id($con);
}

else{
    echo "error for login";
}

$r_insert= $con->prepare("INSERT INTO `registration` (`Lid`, `Email`, `FirstName`, `LastName`, `PhoneNumber`,
                                      `WhatsappNumber`, `DOB`, `Gender`, `Address`, `Country`, `State`, `City/Town`, `Zipcode`) 
                                      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,)");

$r_insert->bind_param('isssssiisiisi',$lid,$email,$f_name,$l_name,$phone,$whatsapp,$dob,$gender,$address,$country,$state,$city_town,$zipcode);
if($r_insert->execute()){
    echo "inserted";
}
else{
    echo "error for registration";
}






}

?>