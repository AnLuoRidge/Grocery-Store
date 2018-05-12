<?php

$product_id = $_GET['product_id'];

$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');
$query_string = "select * from products where product_id = " . $product_id;

$result = mysqli_query($connection, $query_string);
$num_rows = mysqli_num_rows($result);
$items = mysqli_fetch_assoc($result);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $items["product_name"] ?></title>
    <link href='../product-detail/product-detail.css' rel="stylesheet" type="text/css">
</head>
<body>

    <div class="center">
<h1 style="margin-top: 0%;"><?php echo $items["product_name"] ?></h1>

<?php
//if ($num_rows > 0) {
    print "<table border='0'>";

    print "
<tr>
<td><text class='attributes'>Price: </text><text>" . "$" . $items["unit_price"] . "</text></td>

</tr>

<tr>
<td class='attributes'>Unit Quantity: </td>
<td>" . $items["unit_quantity"] . "</td>
</tr>

";

    print "</table>";

    print "
<form name='addProdcut' id='addProduct' action='../product-detail/addToCart.php?product_id=" . $product_id . "' method='post' target='cartFrame' style='font-size: 18px;position: absolute;bottom: 20%;margin-left: 10%;'>
<input type='number' max='20' min='1' name='selected_quantity' value='1' required class='qty'>     /    " . $items["in_stock"] . " available" . "
</form>
<input type='submit' value='Add to cart' class='button' form='addProduct'>
</div>
</body>
</html>";


mysqli_close($connection);
