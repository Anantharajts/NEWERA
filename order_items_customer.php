<?php
include('database.php');
include('customer_header.php');
?>

<!--................[customer_orderitems_page]...........................-->

<div class="container" style="margin-top:100px;margin-bottom:100px;">

    <div class="col row" style="flex-direction: column;gap:20px;justify-content: center;align-items: center;">
        <div class="col row" style="background-color:white;border-radius:5px;padding:0px;height: 100px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
            <div class="col">
                <h4 style="padding-bottom: 10px;padding-top:10px;">My Orders</h4>
            </div>
        </div>
        <div class="col" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
            <div class="col">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>IMG</th>
                            <th>PRODUCT NAME</th>
                            <th>PRICE</th>
                            <th>COUNT</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $select_query = "SELECT O.`Id`,CH.Lid AS Lid, `CheckoutId`, O.`ProductId`, O.`Price`, `Count`, `TotalPrice`,P.`Name` AS P_NAME,P.`Description`AS P_DES,P.Image AS P_IMG,B.Name AS BRAND,C.Name AS CATEGORY FROM `order_items` AS O
                                         INNER JOIN `product_add` AS P ON P.Id = O.ProductId
                                         LEFT JOIN `brand` AS B ON B.Id = P.BrandId
                                         LEFT JOIN `category` AS C ON C.Id = P.CategoryId
                                         LEFT JOIN `checkout` AS CH ON CH.Id = O.CheckoutId
                                         WHERE CH.Lid=$id AND O.`IsDeleted`=0";
                        //  var_dump($select_query);

                        $data = mysqli_query($con, $select_query);
                        $sln = 1;
                        if (mysqli_num_rows($data) > 0) {
                            while ($_result = mysqli_fetch_assoc($data)) {

                                $img = $_result['P_IMG'];
                                $product_name = $_result['P_NAME'];
                                $price = $_result['Price'];
                                $count = $_result['Count'];
                                $p_description = $_result['P_DES'];
                                $brand = $_result['BRAND'];
                                $category = $_result['CATEGORY'];

                        ?>
                                <tr>
                                    <td>
                                        <h6 style="margin-top: 34px;"><?php echo $sln; ?></h6>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="col" style="width: 38%;background-color: darkgray;padding: 5px;border-radius: 7px;">
                                            <img src="assets/IMG/dress/<?php echo $img; ?>" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 style="margin-top: 34px;"><?php echo  $product_name; ?></h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-top: 34px;"><?php echo $price; ?></h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-top: 34px;"><?php echo $count; ?></h6>
                                    </td>
                                    <td>
                                        <P style="margin-top: 34px;">Panding</P>
                                    </td>
                                    <td style="width: 15%;">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $sln;?>" style="margin-top: 27px;">
                                            View Details
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $sln;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col row" style="flex-direction: column;gap:5px;text-align:left;">
                                                            <div class="col">
                                                                <h5><?php echo $product_name; ?></h5>
                                                            </div>
                                                            <div class="col">
                                                                <p><?php echo $p_description; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p>brand : <?php echo $brand; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p>category : <?php echo $category; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p>order address:</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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







<?php
include('customer_footer.php');
?>