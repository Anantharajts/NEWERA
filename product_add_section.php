<?php
include('database.php');
include('admin_header.php');
?>
<style>
    /* Top Navigation Bar */
    .top-bar {
        background: var(--white);
        padding: 1rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .page-title {
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .breadcrumb {
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    /* Main Layout */
    .container {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 1.5rem;
        padding: 1.5rem 2rem 100px;
        /* Bottom padding for sticky footer */
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .container {
            grid-template-columns: 1fr;
        }
    }

    /* Card Styling */
    .card {
        background: var(--white);
        border-radius: 0.5rem;
        border: 1px solid var(--border);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .card-header {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border);
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--text-main);
    }

    .form-input,
    .form-select,
    .brand,
    .form-textarea {
        width: 100%;
        padding: 0.65rem 0.85rem;
        border: 1px solid var(--border);
        border-radius: 0.375rem;
        font-size: 0.9rem;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    .form-input:focus,
    .form-select:focus,
    .brand:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    /* Media Upload Zone */
    .upload-zone {
        border: 2px dashed var(--border);
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        /* transition: background 0.2s;- */
    }

    .upload-zone:hover {
        background-color: #f3f4f6;
    }

    .upload-icon {
        font-size: 2rem;
        color: var(--text-muted);
    }

    .upload-text {
        margin-top: 0.5rem;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* Pricing Grid */
    .pricing-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    /* Sidebar specific */
    .sidebar-card {
        position: sticky;
        top: 80px;
    }
</style>


<!-- Main Content -->
<form action="#" method="post" onsubmit="return vaild()">
<div class="container">

    <!-- Left Column -->
    <main style="background-color: white;border-radius: 0.5rem;padding:15px;">

        <div class="col">
            <h1 style="margin:15px 0px;font-size:30px;">Product add section</h1>
        </div>


        <!-- Basic Info Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Basic Information</h3>
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" name="productname" id="productname_id" class="form-input">
            </div>



            <div class="form-group">
                <label for="product-name">Brand Name</label>

                <?php
                $stment1 = "SELECT `Id`, `Name` FROM `brand` WHERE `IsDeleted`=0";
                // var_dump($stment1);
                $data = mysqli_query($con, $stment1);

                if (mysqli_num_rows($data) > 0) {

                    ?>

                    <select class="brand" name="brand" id="brandid">

                        <option value="0">Add a brand</option>
                        <?php

                        while ($_result = mysqli_fetch_assoc($data)) {

                            $bid = $_result["Id"];
                            $brand = $_result["Name"];
                            ?>

                            <option value="<?php echo $bid; ?>"><?php echo $brand; ?></option>

                            <?php
                        }
                }
                ?>

                </select>
            </div>




            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="descriptionid" name="desscription" class="form-textarea"
                    placeholder="Write a description of your product..."></textarea>
            </div>
        </div>

        <!-- Media Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Media</h3>
            <div class="upload-zone">
                <div class="upload-icon">🖼️</div>
                <div class="upload-text">Drop images here or click to upload</div>
                <input type="file" name="image" id="img_id" style="display: none;">
            </div>
        </div>

        <!-- Pricing Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Pricing</h3>
            <div class="pricing-grid">
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="text" name="price" id="priceid" class="form-input" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="sku">Quantity</label>
                    <input type="number" id="sku" class="form-input">
                </div>
            </div>

        </div>

        <div class="col" style="text-align: center;">
            <button class="pro_addbtn" type="submit" name="productbtn"
                style="width: 100%;background-color:black;color:white;padding-top:5px;padding-bottom:5px;">ADD</button>
        </div>

    </main>

    <!-- Right Column (Sidebar) -->
    <aside class="sidebar-card">
        <!-- Status Card -->
        <div class="card" style="background-color: white;">
            <h3 class="card-header">Status</h3>
            <div class="form-group">
                <label for="status">Product Status</label>
                <select id="status" name="p_status" class="form-select" style="background-color: #dddddd;">
                    <!-- <option value="">Active</option> -->
                    <option value="0">Instock</option>
                    <option value="1">Out of stock</option>
                </select>
            </div>
        </div>

        <!-- Organization Card -->
        <div class="card" style="background-color: white;">
            <h3 class="card-header">Organization</h3>
            <div class="form-group">
                <label for="category">Category</label>

                <?php
                $stment = "SELECT `Id`, `Name` FROM `category` WHERE `IsDeleted`=0";
                // var_dump($stment);
                $data1 = mysqli_query($con, $stment);
                if (mysqli_num_rows($data1) > 0) {

                    ?>

                    <select id="category" name="category" class="form-select" style="background-color: #dddddd;">
                        <option value="0">Select Category</option>
                        <?php
                        while ($result = mysqli_fetch_assoc($data1)) {
                            $cid = $result["Id"];
                            $category = $result["Name"];

                            ?>

                            <option value="<?php echo $cid; ?>"><?php echo $category; ?></option>

                            <?php
                        }
                }
                ?>
                </select>
            </div>
        </div>
    </aside>


</div>
</form>


<!--.....................................script................................-->


<script>

    function valid() {
       alert('hlo');
        var p_name = document.getElementById("productname_id");
        var brand = document.getElementById("brandid");
        var description = document.getElementById("descriptionid");
        var img = document.getElementById("img_id");
        var price = document.getElementById("priceid");
        var sku = document.getElementById("sku");
        var status = document.getElementById("status");
        var category = document.getElementById("category");
        var f = 0;

        if (p_name.value == "") {
            p_name.style.border = "1px solid red";
            p_name.style.outline = "none";
            p_name.focus();
            f = 1;
        }


        if (brand.value == "") {
            brand.style.border = "1px solid red";
            brand.style.outline = "none";
            brand.focus();
            f = 1;
        }


        if (description.value == "") {
            description.style.border = "1px solid red";
            description.style.outline = "none";
            description.focus();
            f = 1;
        }

        if (img.value == "") {
            img.style.border = "1px solid red";
            img.style.outline = "none";
            img.focus();
            f = 1;
        }


        if (price.value == "") {
            price.style.border = "1px solid red";
            price.style.outline = "none";
            price.focus();
            f = 1;
        }


        if (sku.value == "") {
            sku.style.border = "1px solid red";
            sku.style.outline = "none";
            sku.focus();
            f = 1;
        }


        if (status.value == "") {
            status.style.border = "1px solid red";
            status.style.outline = "none";
            status.focus();
            f = 1;
        }

        if (category.value == "") {
            category.style.border = "1px solid red";
            category.style.outline = "none";
            categorysku.focus();
            f = 1;
        }

        if (f = 0) {
            return true;
        }
        else {
            return false;
        }


    }

</script>





</body>

</html>