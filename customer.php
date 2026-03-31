<?php
include('database.php');
include('customer_header.php');
?>

<style>
    /* label {
        background-color: black;
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 15px 10px 10px;
        cursor: pointer;
        user-select: none;
        border-radius: 10px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        color: white;
    }

    input {
        display: none;
    }

    input:checked+label svg {
        fill: hsl(0deg 100% 50%);
        stroke: hsl(0deg 100% 50%);
        animation: heartButton 1s;
    }

    @keyframes heartButton {
        0% {
            transform: scale(1);
        }

        25% {
            transform: scale(1.3);
        }

        50% {
            transform: scale(1);
        }

        75% {
            transform: scale(1.3);
        }

        100% {
            transform: scale(1);
        }
    }

    input+label .action {
        position: relative;
        overflow: hidden;
        display: grid;
    }

    input+label .action span {
        grid-column-start: 1;
        grid-column-end: 1;
        grid-row-start: 1;
        grid-row-end: 1;
        transition: all .5s;
    }

    input+label .action span.option-1 {
        transform: translate(0px, 0%);
        opacity: 1;
    }

    input:checked+label .action span.option-1 {
        transform: translate(0px, -100%);
        opacity: 0;
    }

    input+label .action span.option-2 {
        transform: translate(0px, 100%);
        opacity: 0;
    }

    input:checked+label .action span.option-2 {
        transform: translate(0px, 0%);
        opacity: 1;
    } */

    .fav-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #2c2c2c;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .fav-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
    }

    .heart {
        color: red;
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .fav-btn.active .heart {
        transform: scale(1.3);
    }

    .text {
        white-space: nowrap;
    }
</style>

<!--...................................banner...........................................-->

<div class="container customer_area" style="margin-bottom: 40px;">
    <div class="row" style="padding-top:28%;gap:393px;">

        <div class="col" style="padding: 30px;">
            <h3 style="margin-bottom: 96px;color:black;">New Arrivels</h3>
            <div class="col">
                <h1 style="font-size: 51px;font-weight: bolder;padding-bottom: 10px;color:black;">Where Art Meets
                    Your Style</h1>
            </div>
            <div class="col">
                <p style="margin-bottom: 30px;color:black;">Lorem ipsum dolor sit amet consectetur. Senectus pellentesque vulputate quis id eu quis. Mauris nam semper vitae quis viverra.
                    Ut fames elit cum pharetra feugiat purus egestas dictumst est. Ultricies eu.</p>
            </div>

            <div class="col-10 row">
                <div class="col"><button class="cu_home">Home</button></div>
                <div class="col"><button class="cu_shop">Shop</button></div>
            </div>
        </div>
        <div class="col" style="text-align:center;display: flex;flex-direction: column;align-content: center;justify-content: center;align-items: center;">
            <div class="col-6" style="border-radius:15px;background-color:black;">
                <div class="col row" style="padding:20px;flex-direction: column;gap:20px;">
                    <div class="col bg-white" style="border-radius: 10px;"><img src="assets/IMG/watch/png/w-13.png" class="img-fluid"></div>
                    <div class="col" style="text-decoration: none;color:white;"><a href="#" style="text-decoration: none;color:white;">Shop Now</a></div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="container-fluid c_r1"></div>

<!--.............................................row1..........................................-->

<div class="container" style="margin-bottom: 30px;">

    <div class="row" style="gap:25px">
        <div class="col-3">
            <div class="row" style="flex-direction: column;gap: 20px;">

                <div class="col row" style="padding:0px;">
                    <input type="search" name="search" id="search_id" placeholder="Search...." style="padding:5px 15px;border-radius:5px;border:1px solid black;display:block;width:100%;">
                </div>



                <div class="col row catagaries" style="background-color: #F1F1F1;border-radius:10px;">

                    <?php
                    $stment_cate = "SELECT `Id`, `Name` FROM `category` WHERE `IsDeleted`=0";
                    // var_dump($stment_cate);
                    $d_c = mysqli_query($con, $stment_cate);
                    if (mysqli_num_rows($d_c) > 0) {

                    ?>

                        <select name="category" id="cate_id" style="padding:8px;background-color: #F1F1F1;border:none;">
                            <option value="0">Select Category...</option>
                            <?php
                            while ($_result = mysqli_fetch_assoc($d_c)) {

                                $cate_id = $_result["Id"];
                                $cate_name = $_result["Name"];

                            ?>
                                <option value="<?php echo $cate_id; ?>"><?php echo $cate_name; ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    <?php
                    }
                    ?>

                </div>


                <div class="col row" style="background-color: #F1F1F1;border-radius:10px;">


                    <?php
                    $stment_brand = "SELECT `Id`, `Name` FROM `brand` WHERE `IsDeleted`=0";
                    // var_dump($stment_brand);
                    $d_b = mysqli_query($con, $stment_brand);
                    if (mysqli_num_rows($d_b) > 0) {
                    ?>

                        <select name="brand" id="b_id" style="padding:8px;background-color: #F1F1F1;border:none;">
                            <option value="0">Select Brand...</option>
                            <?php
                            while ($result = mysqli_fetch_assoc($d_b)) {

                                $bran_id = $result["Id"];
                                $bran_name = $result["Name"];

                            ?>
                                <option value="<?php echo $bran_id; ?>"><?php echo $bran_name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>
                </div>


                <div class="col row" style="background-color: #F1F1F1;border-radius:10px;gap:10px;flex-direction: column;align-content: center;justify-content: center;align-items: center;padding:10px;">

                    <h5>Price</h5>
                    <div class="col row">
                        <div class="col">
                            <h6>100 - 500</h6>
                        </div>
                        <div class="col-1"><input type="radio"></div>
                    </div>

                    <div class="col row">
                        <div class="col">
                            <h6>500 - 1000</h6>
                        </div>
                        <div class="col-1"><input type="radio"></div>
                    </div>

                    <div class="col row">
                        <div class="col">
                            <h6>1000 - Above</h6>
                        </div>
                        <div class="col-1"><input type="radio"></div>
                    </div>
                </div>



                <div class="col row pro_size" style="background-color: #F1F1F1;border-radius:10px;padding:15px;gap:15px;">

                    <h1 style="font-size:20px;margin-bottom:15px">Size</h1>

                    <div class="col">
                        <button class="s_1">S</button>
                    </div>

                    <div class="col">
                        <button class="s_2">M</button>
                    </div>

                    <div class="col">
                        <button class="s_3">L</button>
                    </div>

                    <div class="col">
                        <button class="s_4">XL</button>
                    </div>

                    <div class="col">
                        <button class="s_5">XXL</button>
                    </div>

                </div>

                <div class="cl"></div>

                <div class="col row" style="flex-direction: column;gap: 10px;">

                    <h1 style="border-bottom: 1px solid black;padding-bottom:15px;">Offers</h1>

                    <div class="col poster" style="padding: 10px;">
                        <img src="assets/IMG/poster/pst-1.jpg" class="img-fluid">
                    </div>

                    <div class="col poster" style="padding: 10px;">
                        <img src="assets/IMG/poster/pst-2.jpg" class="img-fluid">
                    </div>

                </div>


            </div>


        </div>

        <!--...............................................productsection.............................................-->

        <div class="col grid-contaniner" style="display: grid;grid-template-columns: repeat(3,minmax(300px,1fr));gap: 20px;justify-content: center;">

            <!-- <div class="col row" style="gap: 20px;margin-bottom:35px;"> -->

            <?php
            $stmt_product = "SELECT `Id`, `Name`,`Image`, `Price` FROM `product_add` WHERE  `IsDeleted`=0";
            // var_dump($stmt_product);
            $d_product = mysqli_query($con, $stmt_product);
            if (mysqli_num_rows($d_product) > 0) {
                while ($result_1 = mysqli_fetch_assoc($d_product)) {
                    $prodcut_id = $result_1["Id"];
                    $prodcut_name = $result_1["Name"];
                    $prodcut_img = $result_1["Image"];
                    $prodcut_price = $result_1["Price"];
            ?>


                    <div class="col">
                        <div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;">
                            <div class="col"><img src="assets/IMG/dress/<?php echo $prodcut_img; ?>" class="img-fluid"></div>
                        </div>
                        <div class="row mt-2" style="text-align: center;gap: 35px;">
                            <div class="col row3_tx">
                                <p><?php echo $prodcut_name; ?></p>
                            </div>

                            <div class="col row3_price">
                                <p><?php echo $prodcut_price; ?>/-</p>
                            </div>

                        </div>

                        <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">
                            <div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>

                            <div class="col">

                                <!-- <input type="checkbox" checked="checked" id="favorite" name="favorite-checkbox" value="favorite-button">
                                <label for="favorite" class="container" style="justify-content: center;border-radius: 5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    <div class="action">
                                        <span class="option-1">Add to Favorites</span>
                                        <span class="option-2">Added to Favorites</span>
                                    </div>
                                </label> -->
                                <button class="fav-btn" id="favBtn">
                                    <span class="heart">❤</span>
                                    <span class="text">Add to Favorites</span>
                                </button>

                            </div>

                        </div>
                    </div>

            <?php
                }
            }
            ?>


            <!-- </div> -->


        </div>




    </div>






</div>

<script>

    const favBtn = document.getElementById("favBtn");

favBtn.addEventListener("click", () => {
  favBtn.classList.toggle("active");

  const text = favBtn.querySelector(".text");

  if (favBtn.classList.contains("active")) {
    text.textContent = "Added to Favorites";
  } else {
    text.textContent = "Add to Favorites";
  }
});
</script>



<?php
include('customer_footer.php');
?>