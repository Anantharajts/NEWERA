<?php
include('database.php');
include('customer_header.php');

if(isset($_GET['prodacutid1']) != ""){

  echo $pid = $_GET["prodacutid1"];

}

if (isset($_GET['productid']) != "") {

  echo $pid = $_GET["productid"];
}



?>

<style>
  label {
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
  }
</style>



<!--...........................(stap-1)..........................-->

<div class="container" style="border-top: 1px solid black;margin-bottom:100px;">

  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col">
        <a href="customer.php"><img src="assets/IMG/icons/arrow.png" class="img-fluid"></a>
      </div>
    </div>
  </div>

  <div class="row" style="justify-content: center;gap:20px;margin-top:65px;">

    <?php
    $stmant = "SELECT pro.`Name` AS p_name, `BrandId`, `Description`, `Image`, `Price`, `Quantity`, `Status`, `CategoryId`, b.Name AS brand_na,c.Name AS category_na FROM `product_add` AS pro 
               INNER JOIN `brand` AS b ON b.Id = pro.BrandId
               INNER JOIN `category` AS c ON c.Id = pro.CategoryId
               WHERE pro.`Id`=$pid";

    // var_dump($stmant);
    $data = mysqli_query($con, $stmant);
    if (mysqli_num_rows($data) > 0) {
      $result = mysqli_fetch_assoc($data);

      $product_na = $result["p_name"];
      $description = $result["Description"];
      $img = $result["Image"];
      $price = $result["Price"];
      $brand = $result["brand_na"];
      $category = $result["category_na"];

    ?>

      <div class="col row" style="flex-direction: column;gap: 20px;text-align: center;">

        <div class="col" style="text-align: center;padding:20px;background-color:#F1F1F1;border-radius:5px;">
          <img src="assets/IMG/dress/<?php echo $img; ?>" class="img-fluid">
        </div>

      </div>

      <div class="col row" style="gap:20px;flex-direction: column;">

        <div class="col">
          <h1><?php echo $product_na; ?></h1>
        </div>
        <div class="col">
          <h5 style="font-size: 30px;"><?php echo $price; ?></h5>
        </div>
        <div class="col">
          <h5 style="font-size:14px;"><?php echo $description; ?></h5>
        </div>
        <div class="col">
          <p>Brand:<?php echo $brand; ?></p>
        </div>
        <div class="col" style="border-bottom: 1px solid black;padding-bottom: 15px;">
          <p>Categiry:<?php echo $category; ?></p>
        </div>
        <div class="col row" style="align-items:center;">
          <input type="number" name="count" id="count">
        </div>
        <div class="col row" style="align-items:center;">
          <div class="col"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">ADD TO CART</button></div>
          <!-- <div class="col"><button style="width:100%;">b</button></div> -->
        </div>

      </div>
    <?php
    }
    ?>
  </div>

</div>






<?php
include('customer_footer.php');
?>