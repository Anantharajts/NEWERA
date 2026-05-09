<?php
include('database.php');
include('customer_header.php');
$subtotal = "";
if (isset($_GET['subtotal'])) {
    $subtotal = $_GET['subtotal'];
}

?>

<style>
    input {
        width: 100%;
        padding: 7px 5px;
        border: none;
        border-bottom: 1px solid black;

    }

    ;
</style>

<form action="#" method="post" onsubmit="return valid()">
    <div class="container" style="display:flex;gap:20px;margin-top:40px;margin-bottom:100px;">

        <div class="col row" style="gap:38px;flex-direction: column;">

            <div class="col">
                <h1 style="font-weight: 900;">CHECKOUT</h1>
            </div>

            <!--.............................[checkout_session].........................-->

            <div class="col row">

                <div class="col row" style="gap:30px;">
                    <div class="col">
                        <h4>Information</h4>
                    </div>
                    <div class="col">
                        <!-- <p style="margin-bottom:0px;padding-top: 10px;">Already have an account?Login</p> -->
                    </div>
                </div>

            </div>

            <div class="col row" style="flex-direction: column;gap:20px;margin-bottom:15px;">

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;"><input type="text" name="first" id="f_name" placeholder="First Name" oninput="removevalidation('f_name')"></div>
                    <div class="col" style="padding: 0px;"><input type="text" name="Last" id="l_name" placeholder="Last Name" oninput="removevalidation('l_name')"></div>
                </div>

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;"><input type="number" name="phone" id="phoneid" placeholder="Phone Number" oninput="removevalidation('phoneid')"></div>
                    <div class="col" style="padding: 0px;"><input type="email" name="email" id="emailid" placeholder="Email" oninput="removevalidation('emailid')"></div>
                </div>

            </div>

            <div class="col">
                <h4>Shipping Information</h4>
            </div>

            <div class="col row" style="flex-direction: column;gap:20px;margin-bottom:15px;">

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;">

                        <?php
                        $country = "SELECT `Id`, `Country` FROM `country` WHERE IsDeleted=0";
                        $data2 = mysqli_query($con, $country);
                        if (mysqli_num_rows($data2) > 0) {

                        ?>

                            <select name="country" id="countryid" onchange="statebycountry();removevalidation('countryid')" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                                <option value="0">Select Country</option>
                                <?php
                                while ($result1 = mysqli_fetch_assoc($data2)) {
                                    $value = $result1['Id'];
                                    $country_na = $result1['Country'];

                                ?>
                                    <option value="<?php echo $value; ?>"><?php echo $country_na; ?></option>
                            <?php
                                }
                            }
                            ?>
                            </select>

                    </div>
                    <div class="col" style="padding: 0px;">

                        <select name="state" id="stateid" onchange="removevalidation('stateid')" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                            <!-- <option value="0">Select Country</option> -->
                        </select>
                    </div>
                </div>

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;"><input type="text" name="city" id="cityid" placeholder="City/Town" oninput="removevalidation('cityid')"></div>
                    <div class="col" style="padding: 0px;"><input type="code" name="zipcode" id="zipcodeid" placeholder="Zipcode" oninput="removevalidation('zipcodeid')"></div>
                </div>

                <div class="col" style="padding: 0px;">
                    <textarea name="address" id="address" style="width:96%;padding: 7px 5px;border: none;border-bottom: 1px solid black;" placeholder="Address" oninput="removevalidation('address')"></textarea>
                </div>

            </div>


        </div>
        <!--.............................[detailes_session].........................-->

        <div class="col">

            <div class="col">
                <h4 style="margin-bottom: 30px;margin-top:90px;">Payment</h4>
            </div>

            <div class="col row" style="gap: 28px;flex-direction: column;margin-bottom:22px;">


                <?php
                $stmt = "SELECT `Id`, `Paymenrt_Method`  FROM `payment_method_add` WHERE `IsDeleted`=0";
                $d1 = mysqli_query($con, $stmt);
                if (mysqli_num_rows($d1) > 0) {
                    while ($d_result = mysqli_fetch_assoc($d1)) {
                        $pay_method = $d_result["Paymenrt_Method"];
                        $pay_id = $d_result["Id"];
                ?>


                        <div class="col" style="padding:3px;border-radius:3px;border-bottom:1px solid black;width:96%;">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="<?php echo $pay_id; ?>">
                                <label class="form-check-label" for="radioDefault1">
                                    <?php echo $pay_method; ?>
                                </label>
                            </div>
                        </div>

                <?php
                    }
                }

                ?>


                <div class="col" style="padding: 0px;">
                    <button style="background-color: black;padding:5px 10px;border-radius:3px;width:96%;color:white;">PAY AND PLACE ORDER</button>
                </div>

            </div>




            <div class="col row" style="padding-top:12px;padding-bottom: 10px;border-top: 1px solid black;border-bottom: 1px solid black;">
                <div class="col">
                    <h4>Total</h4>
                </div>
                <div class="col" style="text-align: right;">
                    <h4 id="subtotal"><?php echo $subtotal; ?>/-</h4>
                </div>
            </div>



        </div>

    </div>

</form>


<!--.........................................(script).........................................-->

<script>
    statebycountry();

    function statebycountry() {
        var cid = document.getElementById('countryid').value;
        // alert(cid);

        $.ajax({
            type: "POST",
            url: "pay_state_by_country_ajax.php",
            data: {
                cid: cid
            },
            success: function(success) {
                // alert(success);
                $("#stateid").html(success);
            },
            error: function(error) {
                alert("error");
            }
        });
    }

    //................................[function valid].......................................//


    function valid() {

        var firstname = document.getElementById('f_name');
        var lastname = document.getElementById('l_name');
        var phonenumber = document.getElementById('phoneid');
        var email = document.getElementById('emailid');
        var country = document.getElementById('countryid');
        var state = document.getElementById('stateid');
        var city = document.getElementById('cityid');
        var zipcode = document.getElementById('zipcodeid');
        var address = document.getElementById('address');
        var payment = document.querySelector('input[name="radioDefault"]:checked');
        var f = 0;


        if (firstname.value == "") {
            firstname.style.border = "1px solid red";
            firstname.style.outline = "none";
            firstname.focus();
            alert("Please enter First Name");
            f = 1;
        }

        if (lastname.value == "") {
            lastname.style.border = "1px solid red";
            lastname.style.outline = "none";
            lastname.focus();
            alert("Please enter Last Name");
            f = 1;
        }

        if (phonenumber.value == "") {
            phonenumber.style.border = "1px solid red";
            phonenumber.style.outline = "none";
            phonenumber.focus();
            alert("Please enter valid 10-digit Phone Number");
            f = 1;
        }

        if (email.value == "") {
            email.style.border = "1px solid red";
            email.style.outline = "none";
            email.focus();
            alert("Please enter valid Email");
            f = 1;
        }

        if (country.value == 0) {
            country.style.border = "1px solid red";
            country.style.outline = "nome";
            country.focus();
            alert("Please select Country");
            f = 1;
        }

        if (state.value == 0) {
            state.style.border = "1px solid red";
            state.style.outline = "none";
            state.focus();
            alert("Please select State");
            f = 1;
        }

        if (city.value == "") {
            city.style.border = "1px solid red";
            city.style.outline = "none";
            city.focus();
            alert("Please enter City/Town");
            f = 1;
        }

        if (zipcode.value == "") {
            zipcode.style.border = "1px solid red";
            zipcode.style.outline = "none";
            zipcode.focus();
            alert("Please enter valid Zipcode");
            f = 1;
        }

        if (address.value == "") {
            address.style.border = "1px solid red";
            address.style.outline = "none";
            address.focus();
            alert("Please enter Address");
            f = 1;
        }


        if (!payment) {
            alert("Please select a payment method");
            f = 1;
        }

        if (f == 0) {
            return true;
        } else {
            return false;
        }

    }


    //............[removevalidation]........................//

    function removevalidation(Id) {

        var id = document.getElementById(Id);
        id.style.border = "1px solid black";

    }
</script>



<?php
include('customer_footer.php');
?>