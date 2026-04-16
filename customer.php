<?php
include('database.php');
include('customer_header.php');
?>

<style>

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
            <h3 style="margin-bottom: 96px;color:black;">New Arrivals</h3>
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

    <div class="row" style="gap:25px;">
        <div class="col-3">
            <div class="row" style="flex-direction: column;gap: 20px;">

                <div class="col row" style="padding:0px;">
                    <input type="search" name="search" id="search_id" oninput="loadproducts()" placeholder="Search...." style="padding:5px 15px;border-radius:5px;border:1px solid black;display:block;width:100%;">
                </div>



                <div class="col row catagaries" style="background-color: #F1F1F1;border-radius:10px;">

                    <?php
                    $stment_cate = "SELECT `Id`, `Name` FROM `category` WHERE `IsDeleted`=0";
                    // var_dump($stment_cate);
                    $d_c = mysqli_query($con, $stment_cate);
                    if (mysqli_num_rows($d_c) > 0) {

                    ?>

                        <select name="category" id="cate_id" onchange="loadproducts()" style="padding:8px;background-color: #F1F1F1;border:none;">
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

                        <select name="brand" id="b_id" onchange="loadproducts()" style="padding:8px;background-color: #F1F1F1;border:none;">
                            <option value="0">Select Brand...</option>
                            <?php
                            while ($result = mysqli_fetch_assoc($d_b)) {

                                $bran_id = $result["Id"];
                                $bran_name = $result["Name"];

                            ?>
                                <option value="<?php echo $bran_id; ?>"><?php echo $bran_name;?></option>
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
                        <div class="col-1"><input type="radio" name="click_1" id="click1" value="1" onclick="loadproducts()"></div>
                    </div>

                    <div class="col row">
                        <div class="col">
                            <h6>500 - 1000</h6>
                        </div>
                        <div class="col-1"><input type="radio" name="click_1" id="click2" value="2" onclick="loadproducts()"></div>
                    </div>

                    <div class="col row">
                        <div class="col">
                            <h6>1000 - Above</h6>
                        </div>
                        <div class="col-1"><input type="radio" name="click_1" id="click3" value="3" onclick="loadproducts()"></div>
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

        <div class="col-8 grid-contaniner" id="product_area" style="display: grid;grid-template-columns: repeat( auto-fit, minmax(200px, 1fr) );gap: 20px;justify-content: center;align-content: start;">




        </div>


        <input type="hidden" name="lid" id="lid" value="<?php echo $id ?>">

    </div>


</div>

<script>
    function checkWish(Id ,wid) {
        // alert(Id);
        var lid = document.getElementById('lid').value;
        // alert(w_rowid);

        $.ajax({
            url: "customer_fav_ajax.php",
            type: "GET",
            data: {
                pid: Id,
                lid: lid,
                w_rowid:wid
            },

            success: function(data) {
                // alert(data);
                loadproducts();
            },

            error: function(xhr, status, errror) {
                alert("error");
            }


        })


    }
</script>


<!--........................................customer_ajax_function............................................-->

<script>
    loadproducts();


    function loadproducts() {

        var brand = document.getElementById("b_id").value;
        var category = document.getElementById("cate_id").value;
        var search = document.getElementById("search_id").value;
        var lid = document.getElementById("lid").value;
        // var click1 = document.querySelector('input[name=click_1]:checked').value;
        var selected = document.querySelector('input[name=click_1]:checked');
        var click1 = selected ? selected.value : "";

        // alert(lid);



        $.ajax({

            url: "customer_ajax.php",
            type: "GET",
            data: {
                brand: brand,
                lid1: lid,
                category: category,
                search: search,
                price: click1
            },

            success: function(data) {
                // alert(data);
                let response = JSON.parse(data);
                $('#product_area').html(response.product_html);
                
            },

            
            error: function(xhr, status, errror) {
                alert("error");
            }

        });


    }
</script>


<?php
include('customer_footer.php');
?>