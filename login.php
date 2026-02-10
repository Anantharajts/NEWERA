<?php

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

<body class="body_area" style="height: 600px;">

    <form action="login_action.php" method="post" onsubmit="return valid()">

        <div class="container login" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: flex;justify-content: center;">
            <div class="row" style="justify-content: center;width:90%;padding: 30px;border-radius: 20px;">



                <div class="col row" style="flex-direction: column;">

                    <div class="col inputfild" style="margin-bottom: 25px;">

                        <p style="margin-bottom: 5px;color: white;">USERNAME :</p>

                        <input type="text" name="firstname" id="fn_id" oninput="removefunction('fn_id')">
                    </div>

                    <!-- <div class="col inputfild" style="margin-bottom: 25px;">

                        <p style="margin-bottom: 5px;color: white;">EMAIL :</p>

                        <input type="email" name="Email" id="email_id" oninput="removefunction('email_id')">
                    </div> -->

                    <div class="col inputfild" style="margin-bottom: 25px;">
                        <p style="margin-bottom: 5px;color: white;">PASSWORD :</p>

                        <input type="password" name="password" id="password_id" oninput="removefunction('password_id')">
                    </div>

                </div>

                <div class="container">
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <button class="loginbtn" name="loginbtn" type="submit">Login</button>
                        </div>
                    </div>
                </div>

            </div>
    </form>

    </div>

    <div class="container-fluid lo_overlay"></div>

    <!--.........................................script..........................................-->

    <script>
        function valid() {
            var user_na = document.getElementById("fn_id");
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

        function removefunction(Id){
        // alert("remove");
        var fild_id=document.getElementById(Id);
        fild_id.style.border="1px solid black";
        fild_id.style.outline="none";

        }
    </script>



</body>

</html>