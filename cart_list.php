<?php
include('database.php');
include('customer_header.php');
?>


<div class="container" style="display:flex;margin-top:60px;margin-bottom:60px;gap:20px;">

    <div class="col" style="background-color: #f4f4f4;padding: 20px;border-radius: 10px;">
        <table class="table table-hover">

            <thead>

                <tr>
                    <th>SL</th>
                    <th>IMG</th>
                    <th>Products Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>

                <?php

                $stmt = "SELECT A.`Id` AS rowid, `Lid`, `Product_Id`, `Count`,P.`Name` AS pro_name,P.Image AS Pro_img,P.Price AS p_price FROM `add_to_cart` AS A 
                         INNER JOIN `product_add` AS P ON P.Id = A.Product_Id
                         WHERE A.IsDeleted=0 AND A.Lid=$id";
                //  var_dump($stmt);

                $data_con = mysqli_query($con, $stmt);
                $sl = 1;
                if (mysqli_num_rows($data_con) > 0) {
                    while ($_result = mysqli_fetch_assoc($data_con)) {
                        $productname = $_result["pro_name"];
                        $product_img = $_result["Pro_img"];
                        $product_price = $_result["p_price"];
                        $product_count = $_result["Count"];
                        $rowid=$_result["rowid"];


                ?>

                        <tr>
                            <td>
                                <h6 style="margin-top:33px;"><?php echo $sl; ?></h6>
                            </td>
                            <td style="width: 17%;text-align: center;">
                                <div class="col row">
                                    <div class="col-3" style="width: 65%;background-color: #dad7d2;border-radius: 10px;">
                                        <img src="assets/IMG/dress/<?php echo $product_img; ?>" class="img-fluid" style="width: 100%;">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6 style="margin-top:33px;"><?php echo $productname; ?></h6>
                            </td>
                            <td>
                                <h6 style="margin-top:33px;"><?php echo $product_price; ?>/-</h6>
                            </td>

                            <td style="width:40%;">
                                <div class="col-3 row" style="align-items: center;justify-content: center;margin-top:25px;width: 90%;">
                                    <div class="col-2"><img src="assets/IMG/icons/minus.png" class="img-fluid" onclick="count(minus,countid_<?php echo $sl;?>,<?php echo $rowid;?>)"></div>
                                    <div class="col-4" style="padding: 0px;"><input type="number" name="count" id="countid" value="<?php echo $product_count; ?>" style="border-radius:5px;width:100%;"></div>
                                    <div class="col-2"><img src="assets/IMG/icons/plus.png" class="img-fluid" onclick="count(plus,countid_<?php echo $sl;?>,<?php echo $rowid;?>)"></div>

                                </div>
                            </td>
                            <td>
                                <div class="col row" style="margin-top:25px;">

                                    <div class="col" style="text-align: center;"><button style="background-color:black;padding:3px 20px;border-radius:5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="#ff0000" width="25px" height="25px" viewBox="0 0 24 24" stroke="#ff0000">

                                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                <g id="SVGRepo_iconCarrier">

                                                    <path d="M22,5H17V2a1,1,0,0,0-1-1H8A1,1,0,0,0,7,2V5H2A1,1,0,0,0,2,7H3.117L5.008,22.124A1,1,0,0,0,6,23H18a1,1,0,0,0,.992-.876L20.883,7H22a1,1,0,0,0,0-2ZM9,3h6V5H9Zm8.117,18H6.883L5.133,7H18.867Z" />

                                                </g>

                                            </svg></button></div>
                                </div>
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

    <div class="col-4 row" style="flex-direction: column;background-color: #f4f4f4;padding: 20px;border-radius: 10px;height: 300px;">

        <div class="col" style="margin-bottom: 10px;">
            <h4>Order Summary</h4>
        </div>

        <div class="col row" style="flex-direction: column;">

            <div class="col row" style="gap:10px;">
                <div class="col">
                    <p>Subtotal :</p>
                </div>
                <div class="col">
                    <p>$100/-</p>
                </div>
            </div>

            <div class="col row" style="gap:10px;">
                <div class="col">
                    <p>Delivery charge :</p>
                </div>
                <div class="col">
                    <p>$50/-</p>
                </div>
            </div>


            <div class="col row" style="gap:10px;margin-bottom:10px;">
                <div class="col">
                    <p>Total amount :</p>
                </div>
                <div class="col">
                    <p>$150/-</p>
                </div>
            </div>


        </div>



        <div class="col">
            <button style="width: 100%;padding:5px 10px;background-color:black;color:white;border-radius:10px;">checkout</button>
        </div>


    </div>

</div>







<?php
include('customer_footer.php');
?>