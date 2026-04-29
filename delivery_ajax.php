<?php
include('database.php');

$limit = 4;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT `Id`, `Name`, `Image` FROM `product_add` WHERE `IsDeleted`=0 LIMIT $limit OFFSET $offset";

$result = mysqli_query($con, $query);
$sl = $offset+1;
$product_html = '';

while ($row = mysqli_fetch_assoc($result)) {


    // echo $row['Name'];
    $product_html .= '<tr>';

    $product_html .= '<td><h6 style="padding-top: 43px;">' . $sl  . '</h6></td>';
    $product_html .= '<td style="width: 35%;"><img src="assets/IMG/dress/' . $row['Image'] . '" style="width: 20%;background-color: #c1c1c1;padding: 5px;border-radius: 5px;" class="img-fluid"></td>';

    $product_html .= '<td><h6 style="padding-top: 43px;">' . $row['Name'] . '</h6></td>';
    $product_html .= '<td style="width: 32%;">' .
        '<form action="delivery_charge_add.php" method="post">' .
        '<div class="col row" style="gap:20px;padding-top:13px;">' .

        '<input type="hidden" name="productid2" id="productid2" value="' . $row['Id'] . '">' . '<div class="col-3"><button type="submit" name="submit" style="padding: 10px;border-radius:10px;background-color:black;color:white;width:100%;">Add</button></div>' .
        '<div class="col-3">' .
        '<button class="edit" type="submit" name="submit" style="padding:10px;border-radius:10px;background-color:black;color:white;width:100%;">Edit</button>' .

        '</div>' .

        ' </div>' .
        '</form>' .
        ' </td>';

    $product_html .= '</tr>';
    $sl++;
}

$query2 = "SELECT COUNT(*) as total FROM `product_add` WHERE IsDeleted=0";

$total_result = mysqli_query($con, $query2);
$result2 = mysqli_fetch_assoc($total_result);
$total_records = $result2['total'];
$total_pages = ceil($total_records / $limit);

$pagination_html = '';
for ($i = 1; $i <= $total_pages; $i++) {
    // $pagination_html .= '<a data-page="' . $i . '">' . $i . '</a>';
    $pagination_html .= '<a href="#" data-page="' . $i . '">' . $i . '</a>';
}

echo json_encode([
    'product_html' => $product_html,
    'pagination_html' => $pagination_html
]);
