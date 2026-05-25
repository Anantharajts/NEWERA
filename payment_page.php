<?php
include('database.php');
include('customer_header.php');
$subtotal = "";
$addressdetails = "";
$convenience = 10;
// $shipping = 30;
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

    .title3 {
        height: 30px;
    }
</style>

<form action="payment_page_action.php" method="post" onsubmit="return valid()">
    <div class="container" style="margin-top:40px;margin-bottom:100px;">
        <input type="text" name="customerid" id="customerid" value="<?php echo $id; ?>">
        <div class="col row title3" style="width: 46%;margin-bottom: 20px;">

            <div class="col">
                <h1 style="font-weight: 900;">CHECKOUT</h1>
            </div>

            <div class="col">
                <a href="address_add_section.php?c_total=<?php echo $subtotal ?>" style="text-decoration:none;float: right;padding-top: 22px;">Add Address</a>
            </div>

        </div>

        <div class="col" style="display:flex;gap:20px;">


            <div class="col row" style="gap:46px;flex-direction:column;margin-top:8%;">




                <!--.............................[checkout_session].........................-->



                <div class="col">

                    <div class="col" style="    display: flex;align-items: anchor-center;justify-content: center;">

                        <div class="col-11 row" style="flex-direction: column;gap:15px;">

                            <?php
                            $stment_01 = "SELECT S.`Id`, S.`Lid`, `FirstName`, `PhoneNumber`, `Address`, S.`Country`, S.`State`, `City/Town`, `ZipCode`,C.Country AS country_NA,ST.State AS state_NA FROM `shipping_info` AS S
                                      INNER JOIN `country` AS C ON C.Id = S.Country
                                      INNER JOIN `state` AS ST ON ST.Id = S.State
                                      WHERE S.`IsDeleted`=0";
                            // var_dump($stment_01);
                            $data_01 = mysqli_query($con, $stment_01);
                            if (mysqli_num_rows($data_01) > 0) {

                                while ($_getresult = mysqli_fetch_assoc($data_01)) {

                                    $field_id = $_getresult['Id'];
                                    $name = $_getresult['FirstName'];
                                    $Phone = $_getresult['PhoneNumber'];
                                    $Addr_ess = $_getresult['Address'];
                                    $_Country = $_getresult['country_NA'];
                                    $_State = $_getresult['state_NA'];
                                    $ct = $_getresult['City/Town'];
                                    $_Zip = $_getresult['ZipCode'];

                                    $addressdetails = 'Name :  ' . $name  . '<br>' . 'Phone Number :  ' . $Phone  . '<br>' . 'Address :  ' . $Addr_ess . '<br>' . 'Country :  ' . $_Country . '  ' . 'State :  ' . $_State . '  ' . 'City/Town :  ' . $ct . '  ' . 'Zipcode :  ' . $_Zip;
                                    // echo $addressdetails;

                            ?>

                                    <div class="col row" style="padding:10px;background-color:white;border-radius:5px;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">

                                        <div class="col-1">
                                            <input type="radio" name="a_ddress_details" id="a_ddress_details" value="<?php echo $field_id; ?>">
                                        </div>
                                        <div class="col">
                                            <?php echo $addressdetails; ?>
                                        </div>

                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                </div>



            </div>
            <!--.............................[detailes_session].........................-->

            <div class="col" style="padding:10px;background-color:white;border-radius:5px;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;margin-top:20px;">


                <div class="col" style="text-align: left;">
                    <h4 style="margin-bottom: 30px;margin-top: 34px;margin-left: 25px;">Payment</h4>
                </div>

                <div class="col" style="justify-content: center;align-items: center;display: flex;flex-direction: column;">


                    <div class="col row" style="gap: 28px;flex-direction: column;margin-bottom:22px;width: 95%;align-items: anchor-center;">


                        <?php
                        $stmt = "SELECT `Id`, `Paymenrt_Method`  FROM `payment_method_add` WHERE `IsDeleted`=0";
                        $d1 = mysqli_query($con, $stmt);
                        if (mysqli_num_rows($d1) > 0) {
                            $sl = 1;
                            while ($d_result = mysqli_fetch_assoc($d1)) {
                                $pay_method = $d_result["Paymenrt_Method"];
                                $pay_id = $d_result["Id"];
                        ?>



                                <div class="col row" style="padding:3px;border-radius:3px;border-bottom:1px solid black;width:96%;">
                                    <div class="col form-check">
                                        <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" onclick="payment_details('<?php echo $sl ?>'),updatetotal('<?php echo $sl ?>')" value="<?php echo $pay_id; ?>">
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



                        <div class="col row" style="flex-direction: column;gap:20px;">


                            <div class="col row" style="gap:20px;">
                                <div class="col">
                                    <h5>Product Total Amount</h5>
                                </div>
                                <div class="col">
                                    <h5 style="text-align: end;">$<span id="p_totalid"><?php echo $subtotal; ?></span>/-</h5>
                                </div>
                            </div>

                            <div class="col" id="convenience" style="gap:20px;display:none;">
                                <div class="col row" style="gap:20px;">
                                    <div class="col">
                                        <h5>Delivery Charge</h5>
                                    </div>
                                    <div class="col">
                                        <?php
                                        $delivery = $subtotal < 3000 ? "50" : "0";
                                        ?>
                                        <h5 id="Delivery" style="text-align: end;margin-right:20px;">$<span id="deliveryid"><?php echo $delivery ?></span>/-</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col row" style="gap:20px;">
                                <div class="col">
                                    <h5>Shipping Charge</h5>
                                </div>
                                <div class="col">
                                    <?php
                                    $shipping = $subtotal < 3000 ? "30" : "0";
                                    ?>
                                    <h5 id="shipping" style="text-align: end;">$<span id="shippingid"><?php echo $shipping ?></span>/-</h5>
                                </div>
                            </div>

                        </div>

                        <?php

                        $grendtotal = $subtotal + $shipping;

                        ?>

                        <div class="col row" style="padding-top:12px;padding-bottom: 10px;border-top: 1px solid black;border-bottom: 1px solid black;width: 99%;">
                            <div class="col">
                                <h4>Total</h4>
                            </div>
                            <div class="col" style="text-align: right;">
                                <input type="text" name="totalamount" id="totalamount" value="<?php echo $grendtotal; ?>">
                                <h4 id="grandTotal">$<span id="up_total"><?php echo $grendtotal; ?></span>/-</h4>
                            </div>
                        </div>

                        <div class="col" style="padding: 0px;text-align: center;">
                            <button type="submit" name="submit" style="background-color: black;padding:5px 10px;border-radius:3px;width:96%;color:white;">PAY AND PLACE ORDER</button>
                        </div>


                    </div>

                </div>


            </div>


        </div>




    </div>

</form>


<!--.........................................(script).........................................-->

<script>


    //................................[function valid].......................................//


    function valid() {


        var payment = document.querySelector('input[name="radioDefault"]:checked');
        var f = 0;

        

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
        document.getElementById('convenience').style.display = (Id == 5) ? "block" : "none";

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

    //.....................................[updatetotal]....................................

    function updatetotal(Radioid) {

        const producttotal = Number(document.getElementById('p_totalid').innerText);
        const shipping = Number(document.getElementById('shippingid').innerText);
        const delivery = Number(document.getElementById('deliveryid').innerText);

        const grandTotal =
            producttotal + shipping + (Radioid == 5 ? delivery : 0);

        document.getElementById('up_total').innerText = grandTotal;
        document.getElementById('totalamount').value = grandTotal;
    }
</script>

<?php
include('customer_footer.php');
?>