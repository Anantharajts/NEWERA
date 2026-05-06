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
                    <!-- <p style="margin-bottom:0px;padding-top: 10px;">Already have an account?Login</p> -->
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

                    <?php
                    $country = "SELECT `Id`, `Country` FROM `country` WHERE IsDeleted=0";
                    $data2 = mysqli_query($con, $country);
                    if (mysqli_num_rows($data2) > 0) {

                    ?>

                        <select name="country" id="countryid" onchange="statebycountry()" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
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

                    <select name="state" id="stateid"  style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                        <!-- <option value="0">Select Country</option> -->
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

        <div class="col row" style="gap:50px;flex-direction: column;">

            <div class="col">
                <?php
                $shoppingbag = "SELECT COUNT(*) AS BAG FROM `add_to_cart` WHERE IsDeleted=0";
                // var_dump($shoppingbag);
                $data1 = mysqli_query($con, $shoppingbag);
                if (mysqli_num_rows($data1) > 0) {
                    $result = mysqli_fetch_assoc($data1);
                    $bags = $result["BAG"];
                ?>
                    <h4>Shopping Bag(<?php echo $bags; ?>)</h4>
                <?php
                }
                ?>
            </div>

            <div class="row">
                <div class="col" style="flex-direction: column;gap:20px;padding: 15px;width:100%;height:416px;overflow: scroll;border: 1px solid #ccc;">

                    <?php
                    $stment = "SELECT A.`Id`, `Lid`, `Product_Id`, `Count`,P.Name AS P_NAME,P.Price AS PRICE,P.Image AS P_IMG FROM `add_to_cart` AS A
                               INNER JOIN `product_add` AS P ON P.Id = A.Product_Id
                               WHERE A.IsDeleted=0";
                    // var_dump($stment);
                    $data = mysqli_query($con, $stment);
                    if (mysqli_num_rows($data) > 0) {
                        while ($_result = mysqli_fetch_assoc($data)) {

                            $productname = $_result["P_NAME"];
                            $img = $_result["P_IMG"];
                            $price = $_result["PRICE"];
                            $count = $_result["Count"];

                    ?>

                            <div class="col row" style="gap:20px;text-align: center;margin-bottom:15px;">
                                <div class="col-3"><img src="assets/IMG/dress/<?php echo $img; ?>" class="img-fluid" style="background-color:#c3c3c3;border-radius:4px;"></div>
                                <div class="col">
                                    <h5 style="padding-top: 50px;"><?php echo $productname; ?></h5><br>
                                    <p>Count :<?php echo $count; ?></p>
                                </div>
                                <div class="col">
                                    <h4 style="padding-top: 50px;"><?php echo $price; ?></h4>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>




            <div class="col row">
                <div class="col">
                    <h4>Total</h4>
                </div>
                <div class="col" style="text-align: right;">
                    <h4 id="subtotal"><?php echo $subtotal; ?>/-</h4>
                </div>
            </div>



        </div>

    </div>



</div>

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
                $("#stateid").val(stateid);
            },
            error: function(error) {
                alert("error");
            }
        });
    }
</script>



<?php
include('customer_footer.php');
?>