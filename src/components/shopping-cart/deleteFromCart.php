<?php
/**
 * Created by PhpStorm.
 * User: anluoridge
 * Date: 9/5/18
 * Time: 13:37
 */

$products_to_delete = $_POST["delete"];
session_start();
foreach ($products_to_delete as $product_id) {
    unset($_SESSION["cart"][$product_id]);
}


// return Cart.html
print "
<html>
<head>
<title>Shopping Cart</title>
<link href='../shopping-cart/cart.css' rel=\"stylesheet\" type=\"text/css\"/>
</head>
<body background=\"pics/website_background.jpg\" bgproperties=\"fixed\">
<center>
<table width=\"90%\"><tbody><tr><td><b>Del</b></td><td><b>Product name</b></td><td><b>Unit quantity</b></td><td><b>Unit price</b></td><td><b>Required quantity</b></td><td><b>Subtotal</b></td></tr>
<form id='selectedProducts' action='../shopping-cart/deleteFromCart.php' target='cartFrame' method='post'>
";

$total_quantity = 0;
$total_price = 0;

foreach ($_SESSION["cart"] as $product_id => $item) {
    print "  <!--name array in input. get key of array.-->
<tr><td><input type='checkbox' name='delete[]' value=" . $product_id . "></td>
<td>" . $item["product_name"] . "</td>
<td>" . $item["product_unit_quantity"] . "</td>
<td>" . $item["product_unit_price"] . "</td>
<td>" . $item["selected_quantity"] . "</td>
<td>$" . $item["total_price"] . "</td>
</tr>";
    $total_quantity += $item["selected_quantity"];
    $total_price += $item["total_price"];
}

print "
</form>
<tr>
<td colspan=\"3\">Number of products</td>
<td align=\"left\" colspan=\"3\">" . $total_quantity . "</td>
</tr><tr>
<td colspan=\"3\">Total</td>
<td align=\"left\" colspan=\"3\">$" . $total_price . "</td>
</tr>
</tbody>
</table>

<table style=\"background-color: transparent; border-spacing: 0; padding: 0; \" border=\"0\">
<tbody>
<tr>
<td>
<form action='../shopping-cart/clearCart.php' method=\"post\" target=cartFrame>
<input type=\"submit\" value=\"Clear\" onclick=\"{if(confirm('Do you want to clear your shopping cart?')) {return true;} return false;}\">
</form>
</td>
<td>
<form action=''../checkout/Form.php' method=\"post\" target='_top'>
<input type=\"submit\" name=\"submit\" value=\"Checkout\" onclick=\"return checkout(1)\">
</form>
</td>
<td><input type=\"submit\" value=\"Delete\" form='selectedProducts' onclick=\"{if(confirm('Do you want to delete the selected items?')) {return true;} return false;}\"></td>
<td>
</tr>
</tbody>
</table>
</center>
</body>
</html>
";
