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

    <div class="container registration">

        <div class="col-6 w_alert" id="alert-warning" style="position: absolute;top:10%;left:50%;transform:translate(-50%,-50%);width:100%;"></div>

        <div class="col-12 col-md-12 col-lg-5 row" style="padding: 30px;border-radius: 20px;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: flex;justify-content: center;align-items: center;">


            <form action="#" method="post" onsubmit="return valid()">

                <!--............login_entry..............-->

                <div class="col row re-input-2" style="display: flex;flex-direction: column;align-content: center;justify-content: center;gap: 20px;padding-bottom: 25px;border-bottom: 1px solid white;align-items: center;">

                    <div class="col" style="margin-bottom:0px;color:white;">
                        <h1>Registration</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit praesentium rerum ratione voluptatum minima nihil quas ex alias odit consequatur.</p>
                    </div>

                    <div class="col">
                        <input type="text" name="username" id="usernameid" oninput="Removevalidation('usernameid')" placeholder="User Name*">
                    </div>

                    <div class="col">
                        <input type="text" name="password" id="passwordid" oninput="Removevalidation('passwordid')" placeholder="Password*">
                    </div>

                    <div class="col">
                        <input type="text" name="conpassword" id="conpasswordid" oninput="Removevalidation('conpasswordid')" placeholder="Conform Password*">
                    </div>

                </div>

                <!--.............registration_entry.........................-->

                <div class="col row re-input-1" style="display: flex;flex-direction: column;align-content: center;justify-content: center;gap: 20px;padding-bottom: 45px;padding-top: 25px;align-items: center;">

                    <div class="col row" style="padding: 0px;">
                        <div class="col">
                            <input type="text" name="f_name" id="f_nameid" oninput="Removevalidation('f_nameid')" placeholder="First Name*">
                        </div>

                        <div class="col">
                            <input type="text" name="l_name" id="l_nameid" oninput="Removevalidation('l_nameid')" placeholder="Last Name*">
                        </div>
                    </div>

                    <div class="col row" style="padding: 0px;">
                        <div class="col">
                            <input type="text" name="phone" id="phoneid" oninput="Removevalidation('phoneid')" placeholder="Phone No:*">
                        </div>

                        <div class="col">
                            <input type="text" name="whatsapp" id="whatsappid" oninput="Removevalidation('whatsappid')" placeholder="Whatsapp No:*">
                        </div>
                    </div>

                    <div class="col row" style="padding: 0px;">
                        <div class="col">
                            <input type="date" name="dob" id="dob_id" onchange="Removevalidation('dob_id')">
                        </div>

                        <div class="col-4" style="width: 15%;">
                            <input type="text" name="age" id="ageid">
                        </div>

                        <div class="col">
                            <select name="gender" id="genderid" onchange="Removevalidation('genderid')">

                                <option value="0">select your gender</option>
                                <option value="1">Mail</option>
                                <option value="2">Femail</option>

                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <textarea name="address" id="addressid" oninput="Removevalidation('addressid')" placeholder="Address"></textarea>
                    </div>

                    <div class="col">
                        <input type="email" name="email" id="emailid" oninput="Removevalidation('emailid')" placeholder="Email*">

                    </div>

                    <div class="col row" style="padding: 0px;">

                        <div class="col">
                            <select name="country" id="countryid" onchange="Removevalidation('countryid')">
                                <option value="0">select your country</option>
                                <option value="1">a</option>
                                <option value="2">b</option>
                            </select>
                        </div>

                        <div class="col">
                            <select name="state" id="stateid" onchange="Removevalidation('stateid')">
                                <option value="0">select your state</option>
                                <option value="1">a</option>
                                <option value="2">b</option>
                            </select>
                        </div>

                    </div>

                    <div class="col row" style="padding: 0px;">

                        <div class="col">
                            <input type="text" name="c_t" id="c_t_id" oninput="Removevalidation('c_t_id')" placeholder="City/Town*">
                        </div>

                        <div class="col">
                            <input type="text" name="zipcode" id="zipcodeid" oninput="Removevalidation('zipcodeid')" placeholder="Zipcode*">
                            <!--  -->
                        </div>

                    </div>

                </div>

                <div class="col" style="text-align: center;"><button class="signupbtn" type="submit" name="sign_up">Sign Up</button></div>

            </form>

        </div>

    </div>


    <div class="container-fluid overlay"></div>


    <!--...............script..................-->


    <script>
        function valid() {

            var username = document.getElementById("usernameid");
            var password = document.getElementById("passwordid");
            var conpass = document.getElementById("conpasswordid");
            var fname = document.getElementById("f_nameid");
            var lname = document.getElementById("l_nameid");
            var phone = document.getElementById("phoneid");
            var whatsapp = document.getElementById("whatsappid");
            var dob = document.getElementById("dob_id");
            var gender = document.getElementById("genderid");
            var address = document.getElementById("addressid");
            var email = document.getElementById("emailid");
            var country = document.getElementById("countryid");
            var state = document.getElementById("stateid");
            var c_t = document.getElementById("c_t_id");
            var zipcode = document.getElementById("zipcodeid");
            var w_alert = document.getElementById("alert-warning");
            var f = 0;


            if (username.value == "") {
                username.style.border = "1px solid red";
                username.style.outline = "none";
                username.focus();
                f = 1;
                // alert("hlo");
            }


            if (password.value == "") {
                password.style.border = "1px solid red";
                password.style.outline = "none";
                password.focus();
                f = 1;
            }


            if (conpass.value == "") {
                conpass.style.border = "1px solid red";
                conpass.style.outline = "none";
                conpass.focus();
                f = 1;
            }


            if (fname.value == "") {
                fname.style.border = "1px solid red";
                fname.style.outline = "none";
                fname.focus();
                f = 1;
            }


            if (lname.value == "") {
                lname.style.border = "1px solid red";
                lname.style.outline = "none";
                lname.focus();
                f = 1;
            }


            if (phone.value == "") {
                phone.style.border = "1px solid red";
                phone.style.outline = "none";
                phone.focus();
                f = 1;
            }


            if (whatsapp.value == "") {
                whatsapp.style.border = "1px solid red";
                whatsapp.style.outline = "none";
                whatsapp.focus();
                f = 1;
            }


            if (dob.value == "") {
                dob.style.border = "1px solid red";
                dob.style.outline = "none";
                dob.focus();
                f = 1;
            }

            if (gender.value == "0") {
                gender.style.border = "1px solid red";
                gender.style.outline = "none";
                gender.focus();
                f = 1;
            }


            if (address.value == "") {
                address.style.border = "1px solid red";
                address.style.outline = "none";
                address.focus();
                f = 1;
            }


            if (email.value == "") {
                email.style.border = "1px solid red";
                email.style.outline = "none";

                email.focus();
                f = 1;

            }


            if (country.value == "0") {
                country.style.border = "1px solid red";
                country.style.outline = "none";
                country.focus();
                f = 1;
            }

            if (state.value == "0") {
                state.style.border = "1px solid red";
                state.style.outline = "none";
                state.focus();
                f = 1;
            }


            if (c_t.value == "") {
                c_t.style.border = "1px solid red";
                c_t.style.outline = "none";
                c_t.focus();
                f = 1;
            }


            if (zipcode.value == "") {
                zipcode.style.border = "1px solid red";
                zipcode.style.outline = "none";
                zipcode.focus();
                f = 1;

            }

            if (username.value == "" || password.value == "" || conpass.value == "" || fname.value == "" || lname.value == "" || phone.value == "" || whatsapp.value == "" || dob.value == "" || gender.value == "" || address.value == "" || email.value == "" || country.value == "" || state.value == "" || c_t.value == "" || zipcode.value == "") {
                w_alert.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning alert!</strong><br> You should check in on some of those fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            }

            if(password.value != conpass.value){
                alert("password and confirm password both are not mach!");
            }

            if (f == 0) {
                return true;
            } else {
                return false;
            }

        }


        /*--............................Removevalidation.......................................--*/


        function Removevalidation(Id) {
            // alert("bye");
            var rfunction = document.getElementById(Id);
            rfunction.style.border = "1px solid black";
            rfunction.style.outline = "none";
        }
    </script>


</body>

</html>