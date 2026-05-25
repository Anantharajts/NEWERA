<?php
include('database.php');
include('customer_header.php');

$c_total="";
if (isset($_GET['c_total'])) {
    $c_total = $_GET['c_total'];
}

$edit_id = 0;
$cid = 0;

$name = '';
$phone_nub = '';
$address_id = '';
$country_val = '';
$state_val = '';
$city_twon = '';
$zip = '';
$address_detailes = "";

if (isset($_POST["edit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $edit_id = $_POST['rid'];
    $cid = $_POST['lid'];

    $name = $_POST['f_name'];
    $phone_nub = $_POST['p_number'];
    $address_id = $_POST['add_ress'];
    $country_val = $_POST['country_id'];
    $state_val = $_POST['state_id'];
    $city_twon = $_POST['c_t'];
    $zip = $_POST['z_id'];
    $country_name = $_POST['country_na'];
    $state_name = $_POST['sta_id'];

} elseif (isset($_POST["deleted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $ship_rid = $_POST['rid'];
    $customer_id = $_POST['lid'];

    $remove = "UPDATE `shipping_info` SET `IsDeleted`=1 WHERE `Id`=$ship_rid AND `Lid`=$customer_id";
    if (mysqli_query($con, $remove)) {
        echo "remove";
        echo "<script>window.location.href='address_add_section.php'</script>";
    } else {
        echo "not removed";
    }
}



?>

<style>
    input {
        width: 100%;
        padding: 7px 5px;
        border: none;
        border-bottom: 1px solid black;

    }
</style>

<div class="container" style="display:flex;gap:20px;margin-top:40px;margin-bottom:70px;padding:10px;border-radius:5px;background-color:white;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">



    <div class="col">
        <div class="col" style="padding: 10px;border-radius:5px;">
            <img src="assets/IMG/DESIGN_IMG/shipping.jfif" class="img-fluid" style="border-radius:5px;">
        </div>
    </div>

    <?php echo $address_detailes?>

    <div class="col row" style="gap:20px;flex-direction: column;padding:15px;">

        <div class="col row" style="padding: 0px;">

        <div class="col"><h4>Shipping Information</h4></div>
        <div class="col-2"><a href="payment_page.php?subtotal=<?php echo $c_total;?>"><button style="background-color: black;padding:5px 10px;border-radius:3px;width:100%;color:white;">Back</button></a></div>
            

        </div>
        <form action="address_action.php" method="post" onsubmit="return valid()">
            <div class="col row" style="flex-direction: column;gap:20px;margin-bottom:0px;">

            <input type="hidden" name="ch_total" id="ch_total" value="<?php echo $c_total;?>">

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;"><input type="text" name="first" id="f_name" placeholder="First Name" oninput="removevalidation('f_name')" value="<?php echo $name; ?>"></div>
                    <div class="col" style="padding: 0px;"><input type="text" name="phone" id="phoneid" placeholder="Phone Number" maxlength="10" oninput="removevalidation('phoneid')" value="<?php echo $phone_nub; ?>"></div>
                </div>

                <input type="hidden" name="address_de" id="address_de" oninput="get('address_de')" value="<?php echo $address_detailes; ?>">

                <div class="col" style="padding: 0px;">
                    <textarea name="address" id="address" style="width:96%;padding: 7px 5px;border: none;border-bottom: 1px solid black;" placeholder="Address" oninput="removevalidation('address')"><?php echo $address_id; ?></textarea>
                </div>

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
                                    <option value="<?php echo $value; ?>" <?php echo (($country_val == $value) ? "selected" : ""); ?>><?php echo $country_na; ?></option>
                            <?php
                                }
                            }
                            ?>
                            </select>

                    </div>
                    <div class="col" style="padding: 0px;">
                        <input type="hidden" name="hidStateId" id="hidStateId" value="<?php echo $state_val; ?>">
                        <select name="state" id="stateid" onchange="removevalidation('stateid')" style="width: 100%;padding: 7px 5px;border: none;border-bottom: 1px solid black;">
                            <!-- <option value="0">Select Country</option> -->
                        </select>
                    </div>
                </div>

                <div class="col row" style="gap:25px;">
                    <div class="col" style="padding: 0px;"><input type="text" name="city" id="cityid" placeholder="City/Town" value="<?php echo $city_twon; ?>" oninput="removevalidation('cityid')"></div>
                    <div class="col" style="padding: 0px;"><input type="code" name="zipcode" id="zipcodeid" placeholder="Zipcode" value="<?php echo $zip; ?>" oninput="removevalidation('zipcodeid')"></div>
                </div>

                <div class="col" style="padding: 0px;width: 94%">
                    <input type="hidden" name="rowid" id="rowid" value="<?php echo $edit_id; ?>">
                    <input type="hidden" name="userid" id="user_id" value="<?php echo $id; ?>">
                    <button type="submit" name="submit" style="background-color: black;padding:5px 10px;border-radius:3px;width:103%;color:white;"><?php echo $edit_id == 0 ? "ADD ADDRESS" : "UPDATE" ?></button>
                </div>


            </div>
        </form>


    </div>




</div>


<!--.........................................(table_section).........................................-->


<div class="container" style="margin-bottom:70px;padding:10px;border-radius:5px;background-color:white;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
    <div class="col">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>SL</th>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>COUNTRY</th>
                    <th>STATE</th>
                    <th>CITY/TOWN</th>
                    <th>ZIPCODE</th>
                    <th></th>

                </tr>

            </thead>

            <tbody>

                <?php
                $tment = "SELECT S.`Id`, `Lid`, `FirstName`, `PhoneNumber`, `Address`, S.`Country`, S.`State`, `City/Town`, `ZipCode`,C.Country AS CountryName ,T.`State` AS StateName  FROM `shipping_info` AS S
                          INNER JOIN `country` AS C ON C.`Id` = S.`Country`
                          LEFT JOIN `state`AS T ON T.`Id` = S.`State`
                          WHERE S.`IsDeleted`=0";
                // var_dump($tment);
                $data_1 = mysqli_query($con, $tment);

                $sl = 1;

                if (mysqli_num_rows($data_1) > 0) {
                    while ($_result1 = mysqli_fetch_assoc($data_1)) {

                        $r_id = $_result1['Id'];
                        $lid = $_result1['Lid'];
                        $first_na = $_result1['FirstName'];
                        $phone_num = $_result1['PhoneNumber'];
                        $_address = $_result1['Address'];
                        $_country = $_result1['CountryName'];
                        $_state = $_result1['StateName'];
                        $c_t = $_result1['City/Town'];
                        $_zipcode = $_result1['ZipCode'];
                        $coun_id = $_result1['Country'];
                        $sta_id = $_result1['State']

                ?>

                        <tr>

                            <td><?php echo $sl; ?></td>
                            <td><?php echo $first_na; ?></td>
                            <td><?php echo $phone_num; ?></td>
                            <td><?php echo $_address; ?></td>
                            <td><?php echo $_country; ?></td>
                            <td><?php echo $_state; ?></td>
                            <td><?php echo $c_t; ?></td>
                            <td><?php echo $_zipcode; ?></td>
                            <td>

                                <form action="address_add_section.php" method="POST">

                                    <input type="hidden" name="rid" id="rid" value="<?php echo $r_id; ?>">
                                    <input type="hidden" name="lid" id="l_id" value="<?php echo $lid; ?>">
                                    <!--........................editfunction................................-->

                                    <input type="hidden" name="f_name" id="f_id" value="<?php echo $first_na; ?>">
                                    <input type="hidden" name="p_number" id="p_id" value="<?php echo $phone_num; ?>">
                                    <input type="hidden" name="add_ress" id="ad_id" value="<?php echo $_address; ?>">
                                    <input type="hidden" name="c_t" id="c_t_id" value="<?php echo $c_t; ?>">
                                    <input type="hidden" name="z_id" id="zid" value="<?php echo $_zipcode; ?>">
                                    <input type="hidden" name="state_id" id="s_id" value="<?php echo $sta_id; ?>">
                                    <input type="hidden" name="country_id" id="fcountry_id" value="<?php echo $coun_id; ?>">
                                    <input type="hidden" name="country_na" id="country_id" value="<?php echo $_country; ?>">
                                    <input type="hidden" name="sta_id" id="state_id" value="<?php echo $_state; ?>">


                                    <div class="col row">
                                        <div class="col"><button type="submit" name="edit" style="padding:6px 6px; background-color:white;border:none;border-radius:3px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="#006eff">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#007bff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#007bff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>

                                                </svg>
                                            </button></div>

                                        <div class="col"><button type="submit" name="deleted" style="padding:6px 6px; background-color:white;border:none;border-radius:3px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#ff0000" width="20px" height="20px" viewBox="0 0 24.00 24.00" stroke="#ff0000" transform="matrix(-1, 0, 0, 1, 0, 0)">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">

                                                        <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />

                                                    </g>

                                                </svg>
                                            </button></div>
                                    </div>
                                </form>

                            </td>

                        </tr>
                <?php
                        $sl++;
                    }
                }
                ?>

            </tbody>

        </table>

    </div>
</div>




<!--.........................................(script).........................................-->

<script>
    statebycountry();

    function statebycountry() {
        var cid = document.getElementById('countryid').value;
        var sid = document.getElementById('hidStateId').value;
        // alert(sid);

        $.ajax({
            type: "POST",
            url: "pay_state_by_country_ajax.php",
            data: {
                cid: cid
            },
            success: function(success) {
                // alert(success);
                $("#stateid").html(success);
                $("#stateid").val(sid);
            },
            error: function(error) {
                alert("error");
            }
        });
    }

    //................................[function valid].......................................//


    function valid() {

        var firstname = document.getElementById('f_name');
        var phonenumber = document.getElementById('phoneid');
        var country = document.getElementById('countryid');
        var state = document.getElementById('stateid');
        var city = document.getElementById('cityid');
        var zipcode = document.getElementById('zipcodeid');
        var address = document.getElementById('address');
        // var payment = document.querySelector('input[name="radioDefault"]:checked');
        var f = 0;


        if (firstname.value == "") {
            firstname.style.border = "1px solid red";
            firstname.style.outline = "none";
            firstname.focus();
            // alert("Please enter First Name");
            f = 1;
        }

        if (phonenumber.value == "") {
            phonenumber.style.border = "1px solid red";
            phonenumber.style.outline = "none";
            phonenumber.focus();
            f = 1;
        } else {
            if (!mobileValidation(phonenumber.value)) {
                f = 1;
                alert("Please enter valid 10-digit Phone Number");
            }
        }


        if (country.value == 0) {
            country.style.border = "1px solid red";
            country.style.outline = "nome";
            country.focus();
            // alert("Please select Country");
            f = 1;
        }

        if (state.value == 0) {
            state.style.border = "1px solid red";
            state.style.outline = "none";
            state.focus();
            // alert("Please select State");
            f = 1;
        }

        if (city.value == "") {
            city.style.border = "1px solid red";
            city.style.outline = "none";
            city.focus();
            // alert("Please enter City/Town");
            f = 1;
        }

        if (zipcode.value == "") {
            zipcode.style.border = "1px solid red";
            zipcode.style.outline = "none";
            zipcode.focus();
            // alert("Please enter valid Zipcode");
            f = 1;
        }

        if (address.value == "") {
            address.style.border = "1px solid red";
            address.style.outline = "none";
            address.focus();
            // alert("Please enter Address");
            f = 1;
        }


        // if (!payment) {
        //     alert("Please select a payment method");
        //     f = 1;
        // }

        if (f == 0) {
            return true;
        } else {
            return false;
        }

    }


    //.........................[mobileValidation].............................//

    function mobileValidation(mobile) {
        const regex = /^[6-9]\d{9}$/;
        removevalidation('phoneid');
        return regex.test(mobile);
    }

    //............[removevalidation]........................//

    function removevalidation(Id) {

        var id = document.getElementById(Id);
        id.style.border = "1px solid black";

    }

    function get(getd){

    var address_detailes=document.getElementById(getd).value;
     window.location.href = 'payment_page.php?ad_details=' + address_detailes;

    }

</script>




<?php
include('customer_footer.php');
?>