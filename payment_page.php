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

<form action="payment_page_action.php" method="post" onsubmit="return valid()">
    <div class="container" style="display:flex;gap:20px;margin-top:40px;margin-bottom:100px;">

        <div class="col row" style="gap:46px;flex-direction: column;">

            <div class="col">
                <h1 style="font-weight: 900;">CHECKOUT</h1>
            </div>

            <!--.............................[checkout_session].........................-->

           



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
                    $sl = 1;
                    while ($d_result = mysqli_fetch_assoc($d1)) {
                        $pay_method = $d_result["Paymenrt_Method"];
                        $pay_id = $d_result["Id"];
                ?>


                        <div class="col" style="padding:3px;border-radius:3px;border-bottom:1px solid black;width:96%;">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" onclick="payment_details('<?php echo $sl ?>')" value="<?php echo $pay_id; ?>">
                                <label class="form-check-label" for="radioDefault1">
                                    <?php echo $pay_method; ?>
                                </label>
                            </div>
                        </div>

                <?php
                        $sl++;
                    }
                }

                ?>

                <!--.................................. Payment Method Selection....................................-->

                <!--.................................. credit_card ....................................-->

                <div class="col row" id="credt_cardid" style="flex-direction: column;gap:20px;align-items:center;display:none;">

                    <div class="col">
                        <h5>Credit Card</h5>
                    </div>

                    <div class="col row" style="flex-direction: column;gap:20px;">

                        <div class="col">
                            <input type="text" name="card_holder_name" id="holdername" placeholder="Card Holder Name">
                        </div>

                        <div class="col">
                            <input type="creditcard" name="cardnumber" id="cardnumber_id" placeholder="xxxx xxxx xxxx xxxx">
                        </div>

                        <div class="col row" style="gap: 20px;padding:0px;">

                            <div class="col" style="padding: 0px 24px;">
                                <input type="text" name="expiredate" id="expireid" placeholder="MM/YY">
                            </div>

                            <div class="col" style="padding:0px;">
                                <input type="number" name="cvv" id="cvv_id" placeholder="CVV">
                            </div>

                        </div>

                    </div>
                </div>


                <!--.................................. paypal ....................................-->

                <div class="col row" id="paypal_details" style="flex-direction: column;gap:20px;align-items:center;display:none;">

                    <div class="col">
                        <h5>PayPal</h5>
                    </div>

                    <div class="col row" style="flex-direction: column;gap:20px;">

                        <div class="col">
                            <input type="text" name="upi_paypal" id="upi_paypal_id" placeholder="Enter your UPI id">
                        </div>

                        <div class="col">
                            <input type="text" name="paypal_holder" id="paypal_holder_id" placeholder="Enter your name">
                        </div>

                    </div>
                </div>



                <!--.................................. phone_pay ....................................-->

                <div class="col row" id="phonepay_details" style="flex-direction: column;gap:20px;align-items:center;display:none;">

                    <div class="col">
                        <h5>Phonepay</h5>
                    </div>

                    <div class="col row" style="flex-direction: column;gap:20px;">

                        <div class="col">
                            <input type="text" name="phonepay" id="phonepayid" placeholder="Enter your UPI id">
                        </div>

                        <div class="col">
                            <input type="text" name="phonepayholder" id="phonepay_holderid" placeholder="Enter your name">
                        </div>

                    </div>
                </div>




                <!--.................................. Gpay ....................................-->

                <div class="col row" id="gpay_details" style="flex-direction: column;gap:20px;align-items:center;display:none;">

                    <div class="col">
                        <h5>Gpay</h5>
                    </div>

                    <div class="col row" style="flex-direction: column;gap:20px;">

                        <div class="col">
                            <input type="text" name="Gpay" id="Gpayid" placeholder="Enter your UPI id">
                        </div>

                        <div class="col">
                            <input type="text" name="Gpay_holder" id="Gpay_holderid" placeholder="Enter your UPI id">
                        </div>

                    </div>
                </div>




                <!--.................................. Payment Method Selection[END]....................................-->
                <div class="col" style="padding: 0px;">
                    <button type="submit" name="submit" style="background-color: black;padding:5px 10px;border-radius:3px;width:96%;color:white;">PAY AND PLACE ORDER</button>
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
    // statebycountry();

    // function statebycountry() {
    //     var cid = document.getElementById('countryid').value;
    //     // alert(cid);

    //     $.ajax({
    //         type: "POST",
    //         url: "pay_state_by_country_ajax.php",
    //         data: {
    //             cid: cid
    //         },
    //         success: function(success) {
    //             // alert(success);
    //             $("#stateid").html(success);
    //         },
    //         error: function(error) {
    //             alert("error");
    //         }
    //     });
    // }

    //................................[function valid].......................................//


    function valid() {

        // var firstname = document.getElementById('f_name');
        // var phonenumber = document.getElementById('phoneid');
        // var country = document.getElementById('countryid');
        // var state = document.getElementById('stateid');
        // var city = document.getElementById('cityid');
        // var zipcode = document.getElementById('zipcodeid');
        // var address = document.getElementById('address');
        var payment = document.querySelector('input[name="radioDefault"]:checked');
        var f = 0;


        // if (firstname.value == "") {
        //     firstname.style.border = "1px solid red";
        //     firstname.style.outline = "none";
        //     firstname.focus();
        //     // alert("Please enter First Name");
        //     f = 1;
        // }

        // if (phonenumber.value == "") {
        //     phonenumber.style.border = "1px solid red";
        //     phonenumber.style.outline = "none";
        //     phonenumber.focus();
        //     // alert("Please enter valid 10-digit Phone Number");
        //     f = 1;
        // }


        // if (country.value == 0) {
        //     country.style.border = "1px solid red";
        //     country.style.outline = "nome";
        //     country.focus();
        //     // alert("Please select Country");
        //     f = 1;
        // }

        // if (state.value == 0) {
        //     state.style.border = "1px solid red";
        //     state.style.outline = "none";
        //     state.focus();
        //     // alert("Please select State");
        //     f = 1;
        // }

        // if (city.value == "") {
        //     city.style.border = "1px solid red";
        //     city.style.outline = "none";
        //     city.focus();
        //     // alert("Please enter City/Town");
        //     f = 1;
        // }

        // if (zipcode.value == "") {
        //     zipcode.style.border = "1px solid red";
        //     zipcode.style.outline = "none";
        //     zipcode.focus();
        //     // alert("Please enter valid Zipcode");
        //     f = 1;
        // }

        // if (address.value == "") {
        //     address.style.border = "1px solid red";
        //     address.style.outline = "none";
        //     address.focus();
        //     // alert("Please enter Address");
        //     f = 1;
        // }


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

    //.........................[payment_details_function]............................//

    function payment_details(Id) {


        let paymentDetails = {};


        document.getElementById('credt_cardid').style.display = (Id == 1) ? "block" : "none";
        document.getElementById('paypal_details').style.display = (Id == 2) ? "block" : "none";
        document.getElementById('phonepay_details').style.display = (Id == 3) ? "block" : "none";
        document.getElementById('gpay_details').style.display = (Id == 4) ? "block" : "none";

        // if(Id == 1){
        //   document.getElementById('credt_cardid').style.display="block";  
        // }

        if (Id == 1) {

            var ch_name = document.getElementById('holdername').value;
            var card_id = document.getElementById('cardnumber_id').value;
            var card_ex_date = document.getElementById('expireid').value;
            var cvv_number = document.getElementById('cvv_id').value;

        }

        if (Id == 2) {

            var paypal_id = document.getElementById('upi_paypal_id').value;
            var paypal_holder = document.getElementById('paypal_holder_id').value;

        }

        if (Id == 3) {

            var phonepay_id = document.getElementById('phonepayid').value;
            var phonepay_holder = document.getElementById('phonepay_holderid').value;

        }

        if (Id == 4) {

            var Gpay_id = document.getElementById('Gpayid').value;
            var Gpay_holder = document.getElementById('Gpay_holderid').value;

        }

    }
</script>



<?php
include('customer_footer.php');
?>