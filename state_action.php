<?php
include('database.php');

if(isset($_POST[""]) && $_SERVER["REQUEST_METHOD"] == "POST"){

$state=$_POST["state"];
$country=$_POST["country"];

$insert="INSERT INTO `state`( `CountryId`, `State`) VALUES ('$country','$state',)";

}



?>