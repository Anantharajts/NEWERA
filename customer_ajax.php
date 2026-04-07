<?php
include('database.php');

$brandid = isset($_GET['brand']) ? (int) $_GET['brand'] : 0;
$categoryid = isset($_GET['category']) ? (int) $_GET['category'] : 0;
$search = isset($_GET['search']) ? (string) $_GET['search'] : "";
$price = isset($_GET['price']) ? (string) $_GET['price'] : "";





$query = "SELECT PA.`Id`, PA.`Name`,PA.`Image`,`BrandId`,`CategoryId`, PA.`Price`, `Quantity`,CASE WHEN `Status`=0 THEN 'Instock' 
                                   WHEN `Status`=1 THEN 'Out of stock' END AS Status,B.Name AS Brandname,C.Name AS category FROM `product_add` AS PA
                                   INNER JOIN `brand` AS B ON B.Id = PA.BrandId
                                   INNER JOIN `category` C ON C.Id = PA.CategoryId
                                   WHERE PA.IsDeleted=0";

if ($categoryid != 0) {

    $query = $query . " AND `CategoryId`=" . $categoryid;
}

if ($brandid != 0) {

    $query = $query . " AND BrandId=" . $brandid;
}

if ($search != "") {

    $query = $query . " AND  PA.`Name` LIKE '%$search%'";
}

if ($price == 1) {

    $query = $query . " AND  PA.`Price`>= 100 AND PA.`Price`<= 500";
}

if ($price == 2) {

    $query = $query . " AND  PA.`Price`>= 500 AND PA.`Price`<= 1000";
}

if ($price == 3) {

    $query = $query . " AND  PA.`Price`>= 1000";
}

// echo $query;

$result = mysqli_query($con, $query);
$product_html = '';
while ($row = mysqli_fetch_assoc($result)) {

    $product_html .=  '<div class="col">'.

            
    '<div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;">' . 
        '<div class="col" style="text-align: center;"><img src="assets/IMG/dress/' . $row['Image'] . '" class="img-fluid"></div>' .
        '</div>' .
        '<div class="row mt-2" style="text-align: center;gap: 35px;">' .
        '<div class="col row3_tx">' .
        '<p>' . $row['Name'] . '</p>' .
        '</div>' .

        '<div class="col row3_price">' .
        '<p>' . $row['Price'] . '/-</p>' .
        '</div>' .

        '</div>' .

        ' <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">' .
        '<div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>' .

        ' <div class="col">' .

        ' <button class="fav-btn" id="favBtn'.$row['Id'].'" style="display: flex;align-items: center;gap: 10px;background: #000000;color: white;border: none;padding: 6px 20px;border-radius: 5px;width: 100%;font-size: 16px;' .
        'cursor: pointer;justify-content: center;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);transition: all 0.3s ease;">' .
        ' <span class="heart">❤</span>' .
        ' <span class="text">Add to Favorites</span>' .
        ' </button>' .

        ' </div>' .

        ' </div>'. 
        '</div>';
}

echo json_encode([
    'product_html' => $product_html
]);
