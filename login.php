<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/CSS/bootstrap.css" rel="stylesheet">
    <link href="assets/CSS/css.css" rel="stylesheet">
    <script src="assets/Bootsrap/bootstrap_js.js"></script>
</head>

<body class="body">

    <form action="login_action.php" method="post" onsubmit="return valid()">

        <div class="container login" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">

            <div class="col row" style="justify-content: center;border-radius:10px;padding:15px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;align-items: center;">
                <div class="col body_area" style="    height: 709px;padding:0px;border-radius:10px;">

                </div>

                <div class="col row" style="justify-content: center;width:90%;flex-direction: column;">



                    <div class="col">

                        <div class="col" style="margin-bottom:40px;">
                            <h1 style="margin-bottom:10px;margin-left:20px;margin-top:40px;">Login</h1>
                            <p style="margin-bottom:10px;margin-left:20px;">Please enter your login details to log in.</p>
                        </div>

                        <div class="row" style="flex-direction: column;">

                            <div class="col inputfild" style="margin-bottom: 25px;text-align:center;">

                                <!-- <p style="margin-bottom: 5px;color:black;">USERNAME :</p> -->

                                <input type="text" name="username" id="user_id" oninput="removefunction('user_id')" placeholder="User Name" style="padding:10px;border-radius:5px;width: 80%;border: 1px solid black;">

                            </div>


                            <div class="col inputfild" style="margin-bottom: 25px;text-align:center">
                                <!-- <p style="margin-bottom: 5px;color: black;">PASSWORD :</p> -->

                                <input type="password" name="password" id="password_id" oninput="removefunction('password_id')" placeholder="Password" style="padding:10px;border-radius:5px;width: 80%;margin-bottom: 25px;border: 1px solid black;">
                            </div>

                            <div class="row" style="text-align: center;">
                                <div class="col">
                                    <button class="loginbtn" name="loginbtn" type="submit">Login</button>
                                </div>
                            </div>

                        </div>

                        <div class="col row" style="text-align: center;justify-content: center;align-items:center;flex-direction: column;">

                            <div class="col">
                                <p style="margin-top: 30px; margin-bottom:50px;">Dont't have an account? <a href="Registration.php">Sign Up</a></p>
                            </div>

                            <div class="row" style="width:80%;justify-content: center;align-items:center;">
                                <div class="col" style="border-bottom:1px solid black;position: relative;"></div>
                            </div>
                            <div class="col">
                                <p style="padding: 10px;background-color:white;position: absolute;left: 69%;bottom:19%;font-size: 10pt;">Or Continue with</p>
                            </div>
                        </div>

                        <div class="col row" style="text-align: center;justify-content: center;align-items:center;">
                            <div class="row" style="margin-top: 50px;width: 24%;gap: 20px;">
                                <div class="col"><img src="assets/IMG/icons/google.png" class="img-fluid"></div>
                                <div class="col"><img src="assets/IMG/icons/facebook1.png" class="img-fluid"></div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>


        </div>
    </form>



    <!-- <div class="container-fluid lo_overlay"></div> -->

    <!--.........................................script..........................................-->

    <script>
        function valid() {
            var user_na = document.getElementById("user_id");
            // var email_id = document.getElementById("email_id");
            var password = document.getElementById("password_id");
            var f = 0;
            // alert("hlo");

            if (user_na.value == "") {
                // alert("hlo2");
                user_na.style.border = "1px solid red";
                user_na.style.outline = "none";
                user_na.focus();
                f = 1;
            }

            // if (email_id.value == "") {
            //     email_id.style.border = "1px solid red";
            //     email_id.style.outline = "none";
            //     email_id.focus();
            //     f = 1;
            // }

            if (password.value == "") {
                password.style.border = "1px solid red";
                password.style.outline = "none";
                password.focus();
                f = 1;
            }

            if (f == 0) {
                return true;
            } else {
                return false;
            }


        }

        function removefunction(Id) {
            // alert("remove");
            var fild_id = document.getElementById(Id);
            fild_id.style.border = "1px solid black";
            fild_id.style.outline = "none";

        }
    </script>



</body>

</html>