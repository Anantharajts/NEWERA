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

<!-- style="filter: blur(2px);" -->

<body class="registration_area">

    <!--...................................registration........................................-->

    <div class="container registration" style="width: 40%;padding: 30px;border-radius: 20px;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: flex;justify-content: center;align-items: center;">




        <form action="#" method="post" onsubmit="return valid()">

            <!--............login_entry..............-->

            <div class="col row re-input-2" style="display: flex;flex-direction: column;align-content: center;justify-content: center;gap: 20px;padding-bottom: 25px;border-bottom: 1px solid white;align-items: center;">

                <div class="col" style="margin-bottom:0px;color:white;">
                    <h1>Registration</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit praesentium rerum ratione voluptatum minima nihil quas ex alias odit consequatur.</p>
                </div>

                <div class="col">
                    <input type="text" name="username" id="usernameid" placeholder="User Name*">
                </div>

                <div class="col">
                    <input type="text" name="password" id="passwordid" placeholder="Password*">
                </div>

                <div class="col">
                    <input type="text" name="conpassword" id="conpasswordid" placeholder="Conform Password*">
                </div>

            </div>

            <!--.............registration_entry.........................-->

            <div class="col row re-input-1" style="display: flex;flex-direction: column;align-content: center;justify-content: center;gap: 20px;padding-bottom: 45px;padding-top: 25px;align-items: center;">

                <div class="col row" style="padding: 0px;">
                    <div class="col">
                        <input type="text" name="f_name" id="f_nameid" placeholder="First Name*">
                    </div>

                    <div class="col">
                        <input type="text" name="l_name" id="l_nameid" placeholder="Last Name*">
                    </div>
                </div>

                <div class="col row" style="padding: 0px;">
                    <div class="col">
                        <input type="text" name="phone" id="phoneid" placeholder="Phone No:*">
                    </div>

                    <div class="col">
                        <input type="text" name="whatsapp" id="whatsappid" placeholder="Whatsapp No:*">
                    </div>
                </div>

                <div class="col row" style="padding: 0px;">
                    <div class="col">
                        <input type="date" name="dob" id="dob_id">
                    </div>

                    <div class="col">
                        <input type="text" name="age" id="ageid">
                    </div>

                    <div class="col">
                        <select name="gender" id="genderid">

                            <option value="0">select your gender</option>
                            <option value="1">Mail</option>
                            <option value="2">Femail</option>

                        </select>
                    </div>
                </div>

                <div class="col">
                    <textarea name="address" id="addressid" placeholder="Address"></textarea>
                </div>

                <div class="col">
                    <input type="email" name="email" id="emailid" placeholder="Email*">
                </div>

                <div class="col row" style="padding: 0px;">

                    <div class="col">
                        <select name="country" id="countryid">
                            <option value="0">select your country</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                        </select>
                    </div>

                    <div class="col">
                        <select name="state" id="stateid">
                            <option value="0">select your state</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                        </select>
                    </div>

                </div>

                <div class="col row" style="padding: 0px;">

                    <div class="col">
                        <input type="text" name="c_t" id="c_t_id" placeholder="City/Town*">
                    </div>

                    <div class="col">
                        <input type="text" name="zipcode" id="zipcodeid" placeholder="Zipcode*">
                    </div>

                </div>

            </div>

            <div class="col" style="text-align: center;"><button class="signupbtn" type="submit" name="sign_up">Sign Up</button></div>

        </form>

    </div>


<div class="container-fluid overlay"></div>


<!--...............script..................-->


<script>

function valid(){

var username=document.getElementById("usernameid");
var password=document.getElementById("passwordid");
var conpass=document.getElementById("conpasswordid");
var fname=document.getElementById("f_nameid");
var lname=document.getElementById("l_nameid");
var phone=document.getElementById("phoneid");
var whatsapp=document.getElementById("whatsappid");
var dob=document.getElementById("dob_id");
var gender=document.getElementById("genderid");
var address=document.getElementById("addressid");
var phone=document.getElementById("");
var phone=document.getElementById("");

}



</script>


</body>

</html>