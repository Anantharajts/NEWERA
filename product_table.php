<?php
include('database.php');
include('admin_header.php');

if (isset($_POST["delete"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $d_id = $_POST["deid"];

    $delet = "UPDATE `product_add` SET `IsDeleted`=1 WHERE `Id`=$d_id";
    var_dump($delet);
    if (mysqli_query($con, $delet)) {
        echo "<script>window.location.href='product_table.php'</script>";
    } else {
        echo "somerhing error for delete section....!";
    }
}
?>

<div class="container" style="margin-top:100px;">
    <div class="row" style="flex-direction: column;gap:25px;">

        <div class="col" style="background-color:white;border-radius: 10px;padding:10px;">
            <div class="row" style="align-items: center;">
                <!-- <div class="col">
                    <img src="assets/IMG/NEWERA.png" class="img-fluid">
                </div> -->

                <div class="col">
                    <h1 style="margin:5px 0px;font-size:30px;">Product list table</h1>
                </div>

                <div class="col" style="text-align:end;">
                    <a href="product_add_section.php"
                        style="padding: 10px 10px; margin:10px;text-decoration: none;background-color:black;color:white;border-radius:5px;"><-Product
                            Add</a>
                </div>
            </div>
        </div>

        <!--......................................search_area.................................-->


        <div class="row" style="margin-top: 20px;margin-bottom:20px;gap:20px;">
            <div class="col">
                <?php
                $brand="";
                ?>
                <select name="brand1" id="b1_id" style="width: 100%;padding:10px;border-radius: 5px;border:none;">
                    <option value="0">a</option>
                </select>

            </div>

            <div class="col">

                <select name="category1" id="Cry1_id" style="width: 100%;padding:10px;border-radius: 5px;border:none;">
                    <option value="0">1</option>
                </select>
            </div>

            <div class="col">
                <input type="search" name="search" id="search_id" style="width: 100%;padding:10px;border-radius: 5px;border:none;">
            </div>
        </div>



        <!--......................................Table_area.................................-->


        <div class="col" style="background-color:white;border-radius: 10px;padding:20px;">
            <div class="col"
                style="background-color:white;border-radius: 10px;border-left:1px solid black;padding:20px;">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>SLN</th>
                            <th>P-IMG</th>
                            <th>NAME</th>
                            <th>BRAND</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>COUNT</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php

                        $stment = "SELECT `Id`, `Name`, `Image`,`BrandId`,`CategoryId`, `Price`, `Quantity`,CASE WHEN `Status`=0 THEN 'Instock' 
                                   WHEN `Status`=1 THEN 'Out of stock' END AS Status FROM `product_add` WHERE IsDeleted=0";
                        // var_dump($stment);
                        $d1 = mysqli_query($con, $stment);
                        if (mysqli_num_rows($d1) > 0) {

                            $sln = 1;

                            while ($result = mysqli_fetch_assoc($d1)) {

                                $id = $result["Id"];
                                $img = $result["Image"];
                                $product = $result["Name"];
                                $brand = $result["BrandId"];
                                $category = $result["CategoryId"];
                                $price = $result["Price"];
                                $quantity = $result["Quantity"];
                                $status = $result["Status"];


                        ?>



                                <tr>
                                    <td style="padding-top: 40px;"><?php echo $sln ?></td>
                                    <td style="width:15%;"><img src="assets/IMG/product_img/<?php echo $img ?>" class="img-fluid"
                                            style="width:50%;"></td>
                                    <td style="padding-top: 40px;"><?php echo $product ?></td>
                                    <td style="padding-top: 40px;"><?php echo $brand ?></td>
                                    <td style="padding-top: 40px;"><?php echo $category ?></td>
                                    <td style="padding-top: 40px;"><?php echo $price ?></td>
                                    <td style="padding-top: 40px;"><?php echo $quantity ?></td>
                                    <td style="padding-top: 40px;"><?php echo $status ?></td>
                                    <td>
                                        <form action="product_table.php" method="post" style="margin-top: 30px;">

                                            <input type="hidden" name="deid" id="del_id" value="<?php echo $id ?>">

                                            <a href="product_add_section.php?rowid=<?php echo $id ?>"><button class="edit"
                                                    type="button" name="edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                        stroke="#006eff">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round" />

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                                stroke="#007bff" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                                stroke="#007bff" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>

                                                    </svg></button></a>
                                            <button class="delete" type="submit" name="delete"
                                                onclick="return confirm('Are you sure you want to delete....?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="#ff0000" width="20px" height="20px"
                                                    viewBox="0 0 24.00 24.00" stroke="#ff0000"
                                                    transform="matrix(-1, 0, 0, 1, 0, 0)">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">

                                                        <path
                                                            d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />

                                                    </g>

                                                </svg></button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                                $sln++;
                            }
                        }
                        ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>