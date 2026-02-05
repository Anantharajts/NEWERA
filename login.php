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

    <div class="container login" style="width: 40%;padding: 30px;border-radius: 20px;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
        <div class="row" style="justify-content: center;">

            <div class="col-10 row" style="flex-direction: column;">

                <div class="col inputfild" style="margin-bottom: 25px;">
                    <p style="margin-bottom: 5px;color: white;">NAME :</p>
                    <input type="text" name="firstname" id="fn_id">
                </div>

                <div class="col inputfild" style="margin-bottom: 25px;">
                    <p style="margin-bottom: 5px;color: white;">EMAIL :</p>
                    <input type="email" name="Email" id="email_id">
                </div>

                <div class="col inputfild" style="margin-bottom: 25px;">
                    <p style="margin-bottom: 5px;color: white;">PASSWORD :</p>
                    <input type="password" name="password" id="password_id">
                </div>

            </div>

            <div class="container">
                <div class="row" style="text-align: center;">
                    <div class="col">
                        <button class="loginbtn" type="submit">Login</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>