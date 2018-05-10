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

if (count($_SESSION["cart"]) == 0) {
    echo "<tr><td>Your cart is empty.</td></tr>";
}

print "
</form>
<tr>
<td colspan=\"3\" style=\"font-weight: bold\">Number of products</td>
<td align=\"left\" colspan=\"3\" id=\"num of products\">" . $total_quantity . "</td>
</tr><tr>
<td colspan=\"3\" style=\"font-weight: bold\">Total</td>
<td align=\"left\" colspan=\"3\">$" . $total_price . "</td>
</tr>
</tbody>
</table>

<table style=\"background-color: transparent; border-spacing: 0; padding: 0; \" border=\"0\">
<tbody>
<tr>
<td>
<form action='../shopping-cart/clearCart.php' method=\"post\" target=cartFrame>
<input type=\"submit\" value=\"Clear\" onclick=\"{return confirm('Do you want to clear your shopping cart?')}\">
</form>
</td>
<td>
<form action='../checkout/checkout.php' method=\"post\" target='_blank'>
                <input type=\"submit\" name=\"submit\" value=\"Proceed to checkout\" onclick=\"
                const quantity = Number(document.getElementById('num of products').innerHTML);
                if (quantity > 0) {
                    return true;
                } else {
                    alert('No products');
                    return false;
                }\">
                </form>
</td>
<td>
<form> <!-- if no form tag, delete button will be lower than others -->
<input type=\"submit\" value=\"Delete\" form='selectedProducts' onclick=\"{if(confirm('Do you want to delete the selected items?')) {return true;} return false;}\">
</form>
</td>
<td>
</tr>
</tbody>
</table>
</center>
</body>
</html>
";
