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
                        style="padding: 10px 10px; margin:10px;text-decoration: none;background-color:black;color:white;border-radius:5px;">Product
                            Add</a>
                </div>
            </div>
        </div>

        <!--......................................search_area.................................-->


        <div class="row" style="margin-top: 20px;margin-bottom:20px;gap:20px;">
            <div class="col">
                <?php
                $brand = "SELECT `Id`, `Name`  FROM `brand` WHERE `IsDeleted`=0";
                // var_dump($brand);
                $d3 = mysqli_query($con, $brand);
                if (mysqli_num_rows($d3) > 0) {


                ?>
                    <select name="brand1" id="b1_id" onchange="loadBooks(1);" style="width: 100%;padding:10px;border-radius: 5px;border:none;">
                        <option value="0">Select Brand</option>
                        <?php
                        while ($_result = mysqli_fetch_assoc($d3)) {
                            $brand_id = $_result["Id"];
                            $brandname = $_result["Name"];

                        ?>
                            <option value="<?php echo $brand_id; ?>"><?php echo $brandname ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php
                }
                ?>

            </div>


            <div class="col">

                <?php
                $category = "SELECT `Id`, `Name` FROM `category` WHERE `IsDeleted`=0";
                // var_dump($category);
                $d4 = mysqli_query($con, $category);
                if (mysqli_num_rows($d4) > 0) {

                ?>

                    <select name="category1" id="Cry1_id" onchange="loadBooks(1);" style="width: 100%;padding:10px;border-radius: 5px;border:none;">
                        <option value="0">Select Category</option>
                        <?php
                        while ($resu_lt = mysqli_fetch_assoc($d4)) {
                            $category_id = $resu_lt["Id"];
                            $category_na = $resu_lt["Name"];

                        ?>

                            <option value="<?php echo $category_id ?>"><?php echo $category_na ?></option>
                        <?php
                        }

                        ?>
                    </select>
                <?php
                }
                ?>
            </div>


            <div class="col">
                <input type="search" name="search" id="search_id" oninput="loadBooks(1);" placeholder="Search..."
                    style="width: 100%;padding:10px;border-radius: 5px;border:none;">
            </div>
        </div>



        <!--......................................Table_area.................................-->


        <div class="col" style="background-color:white;border-radius: 10px;padding:20px;">
            <div class="col"
                style="background-color:white;border-radius: 10px;border-left:1px solid black;padding:20px;">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>IMG</th>
                            <th>NAME</th>
                            <th>BRAND</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>COUNT</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody name="book-container" id="book-container">



                    </tbody>


                </table>
            </div>

            <div class="pagination" id="pagination" style="justify-content: center;"></div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadBooks(1);
    });

    function loadBooks(page) {
        var b1_id = document.getElementById("b1_id").value;
        var Cry1_id = document.getElementById("Cry1_id").value;
        var search = document.getElementById("search_id").value;
        // alert(search);
        // alert(Cry1_id);
        $.ajax({
            url: "product_table_ajax.php",
            type: "GET",
            data: {
                page: page,
                b1_id: b1_id,
                Cry1_id: Cry1_id,
                search: search
            },
            success: function(data) {
                // console.log(data);
                // alert(data);
                let response = JSON.parse(data);
                $('#book-container').html(response.books_html);
                $('#pagination').html(response.pagination_html);
            },
            error: function(xhr, status, error) {
                alert("error");
            }
        });
    }


    $(document).on('click', '.pagination a', function() {
        let page = $(this).data('page');
        loadBooks(page);
    });
</script>

</body>

</html>