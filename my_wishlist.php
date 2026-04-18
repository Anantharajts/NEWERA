<?php
include('database.php');
include('customer_header.php');


if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    echo $rowid = $_POST["rowid"];

    $delete = "UPDATE `my_wishlist` SET `Favourite`=0 WHERE Id=$rowid";
    var_dump($delete);

    if (mysqli_query($con, $delete)) {
        echo "<script>window.location.href='my_wishlist.php'</script>";
    }
}


?>





<div class="container" style="border-top: 1px solid black;margin-bottom:50px;">

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col">
                <a href="customer.php"><img src="assets/IMG/icons/arrow.png" class="img-fluid"></a>
            </div>
        </div>
    </div>

    <div class="col">
        <p style="margin-bottom:2px;margin-top:70px;">Saved Items</p>
        <h1 style="margin-bottom:30px;">My wishlist</h1>
    </div>

    <div class="col grid_container" style="display: grid;grid-template-columns: repeat( auto-fit, minmax(250px, 1fr) );gap: 48px;justify-content: center;align-content: start;margin-top:100px;margin-bottom:100px;">


        <?php

        $stment = "SELECT MY.`Id`,P.Name AS p_name, P.Price AS price, P.Image AS img  FROM `my_wishlist`AS MY 
                   INNER JOIN `product_add` AS P ON P.Id = MY.Product_Id
                   WHERE MY.`Favourite`=1 AND my.IsDeleted=0 AND MY.lid=$id";
        //    var_dump($stment);
        $data1 = mysqli_query($con, $stment);
        if (mysqli_num_rows($data1) > 0) {
            while ($result = mysqli_fetch_assoc($data1)) {
                $id = $result["Id"];
                $product_na = $result["p_name"];
                $price = $result["price"];
                $image = $result["img"];

        ?>

                <div class="row" style="flex-direction: column;gap:10px;">

                    <!-- <div class="col" style="background-color:#F1F1F1;border-radius:10px;"> -->
                    <div class="col" style="text-align: center;background-color:#F1F1F1;border-radius:10px;padding:0px;">
                        <img src="assets/IMG/dress/<?php echo $image; ?>" class="img-fluid">
                    </div>
                    <!-- </div> -->

                    <div class="col row" style="text-align: center;gap: 36px;padding: 0px;">
                        <div class="col">
                            <p><?php echo $product_na; ?></p>
                        </div>
                        <div class="col">
                            <p><?php echo $price; ?></p>
                        </div>
                    </div>
                    <div class="col row" style="justify-content: center;align-items: center;text-align: center;gap:0px;">
                        <div class="col"><a href="add_to_cart.php?productid=<?php echo $id; ?>"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">Add to cart</button></a></div>
                        <div class="col">
                            <form action="my_wishlist.php" method="post">
                                <input type="hidden" Name="rowid" id="rowid" value="<?php echo $id; ?>">
                                <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this?')" style="width: 100%;padding: 5px 10px;color: white;background-color: black;border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero">
                                        <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(8.53333,8.53333)">
                                                <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z">

                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>


                    </div>
                </div>

        <?php
            }
        }
        ?>



    </div>

</div>








<?php
include('customer_footer.php');
?>