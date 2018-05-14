<?php
include '../../../config/configuration.php';

$product_id = $_GET['product_id'];
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
<td><span class='attributes'>Price: </span><span>" . "$" . $items["unit_price"] . "</span></td>

</tr>

<tr>
<td class='attributes'>Unit Quantity: </td>
<td>" . $items["unit_quantity"] . "</td>

</tr>
<tr>
<td>
<img src='../product/$product_id.png' width='100px' style='margin: auto;'>
</td>
</tr>

";

print "</table>";

print "<center>
<form name='addProdcut' id='addProduct' action='../product-detail/addToCart.php?product_id=" . $product_id . "' method='post' target='cartFrame' style='font-size: 18px;margin-top: 40%;'>
<input type='number' max='20' min='1' name='selected_quantity' value='1' required class='qty'>     /    " . $items["in_stock"] . " available" . "
</form>

<input type='submit' value='Add to cart' class='button' form='addProduct'>
</center>
</div>
</body>
</html>";


mysqli_close($connection);
