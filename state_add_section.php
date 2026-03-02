<?php
include('database.php');
include('admin_header.php');

$r_id = 0;
$state = "";
$couid = 0;


if (isset($_POST["edit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $r_id = $_POST["roid"];
    $couid = $_POST["cou_id"];
    $state = $_POST["state"];
}
if (isset($_POST["delete"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $rid = $_POST["roid"];

    $delete = "UPDATE `state` SET `IsDeleted`=1 WHERE `Id`=$rid";
    var_dump($delete);
    if (mysqli_query($con, $delete)) {
        echo "<script>window.location.href='state_add_section.php'</script>";
        // $rid="";
    }
}

?>


<div class="container" style="margin-top: 100px;">
    <div class="row" style="gap: 20px;">
        <div class="col" style="background-color:white;padding:20px;border-radius: 10px;">

            <form action="state_action.php" method="post" onsubmit="return valid()">
                <div class="row" style="gap: 20px;flex-direction: column;text-align: center;padding: 20px;">
                    <div class="col">
                        <h1>State add section</h1>
                    </div>


                    <div class="col">

                        <?php
                        $stment = "SELECT `Id`, `Country` FROM `country` WHERE `IsDeleted`=0";
                        // var_dump($stment);
                        $data = mysqli_query($con, $stment);
                        if (mysqli_num_rows($data) > 0) {


                        ?>


                            <select name="country" id="cid" onchange="removevalidation('cid')" style="padding: 10px;width:100%;">
                                <option value="0">Select your country</option>

                                <?php
                                while ($_result = mysqli_fetch_assoc($data)) {

                                    $cid = $_result["Id"];
                                    $countryname = $_result["Country"];
                                ?>

                                    <option value="<?php echo $cid; ?>" <?php echo ($cid == $couid) ? "selected" : ""; ?>><?php echo $countryname; ?></option>
                            <?php
                                }
                            }
                            ?>
                            </select>
                    </div>

                    <div class="col">
                        <input type="text" name="state" id="stateid" oninput="removevalidation('stateid')" value="<?php echo $state; ?>" style="padding:10px;width:100%;">
                        <input type="hidden" name="eid" id="id" value="<?php echo $r_id; ?>">
                    </div>

                    <div class="col">
                        <button class="saddbtn" name="s_addbtn" type="submit" style="width: 100%;background-color:black;color:white;padding-top:5px;padding-bottom:5px;"><?php echo $r_id == 0 ? "ADD" : "UPDATE"; ?></button>
                    </div>

                </div>
            </form>
        </div>


        <div class="col" style="background-color:white;padding:20px;border-radius: 10px;">

            <div class="col" style="background-color:white;padding:20px;border-radius: 10px;border-left:1px solid black;margin-top: 20px;">
                <table class="table table-white table-striped">

                    <thead>
                        <tr>
                            <th>SLN</th>
                            <th>COUNTRY</th>
                            <th>STATE</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>



                        <?php

                        $stment = "SELECT `Id`, `CountryId`, `State` FROM `state` WHERE `IsDeleted`=0";
                        // var_dump($stment);
                        $d1 = mysqli_query($con, $stment);
                        if (mysqli_num_rows($d1) > 0) {

                            $sln = 1;
                        ?>
                            <tr>



                                <?php
                                while ($_result = mysqli_fetch_assoc($d1)) {

                                    $rowid = $_result["Id"];
                                    $country_id = $_result["CountryId"];
                                    $statename = $_result["State"];

                                ?>
                                    <form action="state_add_section.php" method="post">
                                        <td style="padding-top: 15px;"><?php echo $sln ?></td>
                                        <td style="padding-top: 15px;"><?php echo $country_id ?></td>
                                        <td style="padding-top: 15px;"><?php echo $statename ?></td>
                                        <td>

                                            <input type="hidden" name="roid" id="rowid" value="<?php echo $rowid; ?>">
                                            <input type="hidden" name="cou_id" id="cou_id" value="<?php echo $country_id; ?>">
                                            <input type="hidden" name="state" id="state" value="<?php echo $statename; ?>">

                                            <button class="edit" type="submit" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="#006eff">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#007bff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#007bff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>

                                                </svg></button>
                                            <button class="delete" type="submit" name="delete" onclick="return confirm('Are you sure you want to delete....?');"><svg xmlns="http://www.w3.org/2000/svg" fill="#ff0000" width="20px" height="20px" viewBox="0 0 24.00 24.00" stroke="#ff0000" transform="matrix(-1, 0, 0, 1, 0, 0)">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">

                                                        <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />

                                                    </g>

                                                </svg></button>

                                        </td>
                                    </form>
                            </tr>

                        <?php
                                    $sln++;
                                }
                        ?>

                    <?php
                        }
                    ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>



    <!--.......................adminheaderclosing...........................-->

</div>
</div>
</div>

<script>
    function valid() {
        // alert("123");
        var country = document.getElementById("cid");
        var state = document.getElementById("stateid");
        var f = 0;


        if (country.value == "0") {
            // alert("hlo");
            country.style.border = "1px solid red";
            // country.style.outline = "none";
            country.focus();
            f = 1;

        }

        if (state.value == "") {
            // alert("hlo");
            state.style.border = "1px solid red";
            // state.style.outline="none";
            state.focus();
            f = 1;

        }
        if (f == 0) {
            return true;
        } else {
            return false;
        }

    }


    function removevalidation(Id) {
        var id = document.getElementById(Id);
        id.style.border = "1px solid black";
        id.style.outline = "none";

    }
</script>


</body>

</html>