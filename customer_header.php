<?php
session_start();

if ($_SESSION["Id"] != "") {
    $id = $_SESSION["Id"];
} else {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="assets/CSS/bootstrap.css" rel="stylesheet">
        <link href="assets/CSS/css.css" rel="stylesheet">
        <script src="assets/Bootsrap/bootstrap_js.js"></script>
    </head>
</head>

<body>

    <div class="container-fluid bg-dark h-50 clearfix" style="background-color:black;">&nbsp;</div>

    <div class="container mt-4 pb-5">
        <div class="row" style="gap: 67px;">
            <!--..........................mennu........................-->
            <div class="col-5 p-0 mennu">


                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>



            </div>
            <!--..........................logo........................-->
            <div class="col-2">
                <div class="col-12"><img src="assets/IMG/NEWERA.png" class="img-fluid"></div>
            </div>

            <!--..........................icones........................-->

            <div class="icons col-2 ps-5">

                <div class="col-5">
                    <div class="col-4">
                        <a href="#"><img src="assets/IMG/icons/heart.png" class="img-fluid"></a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="col-6">
                        <a href="#"><img src="assets/IMG/icons/account.png" class="img-fluid"></a>
                    </div>
                </div>

                <div class="col-5">
                    <div class="col-4">
                        <a href="#"><img src="assets/IMG/icons/cart.png" class="img-fluid"></a>
                    </div>
                </div>
            </div>



            <!-- ..........................buttones........................ -->
            <div class="col-1 p-0">
                <div class="col-12" style="text-align: end;"><a href="#"><button class="signup">Logout</button></a></div>
            </div>

        </div>
    </div>