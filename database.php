<?php

 //....databaseconnection....................

 $servername="localhost";
 $username="root";
 $password="";
 $database="newera";

 //.........connection.......................

 $con = new mysqli($servername,$username,$password,$database);
 if($con -> connect_error){
    die("connection failed! ".$con -> connect_error);
 }



?>