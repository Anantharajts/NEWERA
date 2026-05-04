<?php
include('database.php');
include('customer_header.php');
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


<div class="container" style="display:flex;gap:20px;margin-top:40px;margin-bottom:100px;">

    <div class="col row" style="gap:27px;flex-direction: column;">

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
                    <p style="margin-bottom:0px;padding-top: 10px;">Already have an account?Login</p>
                </div>
            </div>

        </div>

        <div class="col row" style="flex-direction: column;gap:20px;margin-bottom:15px;">

            <div class="col row" style="gap:25px;">
                <div class="col" style="padding: 0px;"><input type="text" name="first" id="f_name" placeholder="First Name"></div>
                <div class="col" style="padding: 0px;"><input type="text" name="Last" id="l_name" placeholder="Last Name"></div>
            </div>

            <div class="col row" style="gap:25px;">
                <div class="col" style="padding: 0px;"><input type="number" name="phone" id="phoneid" placeholder="Phone Number"></div>
                <div class="col" style="padding: 0px;"><input type="email" name="email" id="emailid" placeholder="Email"></div>
            </div>

        </div>

        <div class="col">
            <h4>Shipping Information</h4>
        </div>

        <div class="col row" style="flex-direction: column;gap:20px;margin-bottom:15px;">

            <div class="col row" style="gap:25px;">
                <div class="col" style="padding: 0px;">

                    <select name="country" id="countryid" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                        <option value="0">Select Country</option>
                        <option value="1">a</option>
                        <option value="2">b</option>
                    </select>

                </div>
                <div class="col" style="padding: 0px;">
                    <select name="country" id="countryid" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                        <option value="0">Select Country</option>
                        <option value="1">a</option>
                        <option value="2">b</option>
                    </select>
                </div>
            </div>

            <div class="col row" style="gap:25px;">
                <div class="col" style="padding: 0px;"><input type="text" name="city" id="cityid" placeholder="City/Town"></div>
                <div class="col" style="padding: 0px;"><input type="code" name="zipcode" id="zipcodeid" placeholder="Zipcode"></div>
            </div>

            <div class="col" style="padding: 0px;">
                <textarea name="address" id="address" style="width:96%;padding: 7px 5px;border: none;border-bottom: 1px solid black;" placeholder="Address"></textarea>
            </div>

        </div>


        <div class="col">
            <h4>Payment</h4>
        </div>

        <div class="col row" style="gap: 20px;flex-direction: column;">

            <div class="col" style="padding:3px;border-radius:3px;border:1px solid black;width:96%;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="1">
                    <label class="form-check-label" for="radioDefault1">
                        Credit Card
                    </label>
                </div>
            </div>

            <div class="col" style="padding:3px;border-radius:3px;border:1px solid black;width:96%;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="2">
                    <label class="form-check-label" for="radioDefault1">
                        PayPal
                    </label>
                </div>
            </div>

            <div class="col" style="padding:3px;border-radius:3px;border:1px solid black;width:96%;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="3">
                    <label class="form-check-label" for="radioDefault1">
                        UPI
                    </label>
                </div>
            </div>


            <div class="col" style="padding:3px;border-radius:3px;border:1px solid black;width:96%;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="4">
                    <label class="form-check-label" for="radioDefault1">
                        ApplePay
                    </label>
                </div>
            </div>

            <div class="col" style="padding:3px;border-radius:3px;border:1px solid black;width:96%;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="5">
                    <label class="form-check-label" for="radioDefault1">
                        Cash On Delivery
                    </label>
                </div>
            </div>

        </div>

        <div class="col" style="padding: 0px;">
            <button style="background-color: black;padding:5px 10px;border-radius:3px;width:93%;color:white;">PAY AND PLACE ORDER</button>
        </div>




    </div>
    <!--.............................[detailes_session].........................-->

    <div class="col">

        <div class="col row" style="gap: 20px;flex-direction: column;">

            <div class="col">
                <h4>Shopping Bag(3)</h4>
            </div>

            <div class="row">
                <div class="col" style="flex-direction: column;gap:20px;padding: 15px;width:100%;height:416px;overflow: scroll;border: 1px solid #ccc;">

                    <?php
                    $stment = "SELECT A.`Id`, `Lid`, `Product_Id`, `Count`,P.Name AS P_NAME,P.Price AS PRICE,P.Image AS P_IMG FROM `add_to_cart` AS A
                               INNER JOIN `product_add` AS P ON P.Id = A.Product_Id
                               WHERE A.IsDeleted=0";
                               var_dump($stment);
                               $data=mysqli_query($con,$stment);
                    ?>

                    <div class="col row" style="gap:20px;text-align: center;margin-bottom:15px;">
                        <div class="col-3"><img src="assets/IMG/dress/m-16.png" class="img-fluid" style="background-color:#c3c3c3;border-radius:4px;"></div>
                        <div class="col">
                            <h5 style="padding-top: 50px;">product name</h5>
                        </div>
                        <div class="col">
                            <h4 style="padding-top: 50px;">price</h4>
                        </div>
                    </div>



                </div>
            </div>




            <div class="col row">
                <div class="col">
                    <h4>Total</h4>
                </div>
                <div class="col" style="text-align: right;">
                    <h4 id="total">100</h4>
                </div>
            </div>



        </div>

    </div>



</div>



<?php
include('customer_footer.php');
?>