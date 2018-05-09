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
<style>


table  {
	background: #FFEBA9;
	color:#000;
	text-align:left;
	font-size:12px;
	border-spacing: 4px;
}
table a, table, tbody, tfoot, tr, th, td {
	font-family: Verdana, arial, helvetica, sans-serif;
}
table, {
	border-left:3px solid #567;
	border-right:3px solid #000;
	padding: 3px;
}
table a {
	text-decoration: none;
	background: inherit;
	color: #ccf;
	font-weight: bold;
}
table a:link {
	text-decoration: none;
}
table a:visited {
	background: inherit;
	color: #66c;
	text-decoration: line-through;
}
table a:hover {
	background: inherit;
	color: #eef;
	position: relative;
	top: 1px;
	left: 1px;
	text-decoration: none;
}
table caption {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
	text-align: left;
	padding: 3px;
	color: #ccf;
	background: #99f;
	font-family: georgia, \"times new roman\", serif;
	font-size:20px;
	font-weight:bold;
}
table, td, th {
	margin:0px;
	padding:3px;

}

tr.odd {
	color: inherit;
	background: #88e;
}
ht:bold;
		color:#592C16;
		padding: 16px 9px;
		
	}


</style>
</head>
<body background=\"pics/website_background.jpg\" bgproperties=\"fixed\">
<center>
<table width=\"90%\"><tbody><tr><td><b>Del</b></td><td><b>Product name</b></td><td><b>Unit quantity</b></td><td><b>Unit price</b></td><td><b>Required quantity</b></td><td><b>Subtotal</b></td></tr>
<form id='selectedProducts' action='../shopping-cart/deleteFromCart.php' target='_blank' method='post'>
";

$total_quantity = 0;
$total_price = 0;

foreach ($_SESSION["cart"] as $product_id => $item) {
    print "  <!--name array in input. get key of array.-->
<tr><td><input type='checkbox' name='delete[]' value=".$product_id."></td>
<td>".$item["product_name"]."</td>
<td>".$item["product_unit_quantity"]."</td>
<td>".$item["product_unit_price"]."</td>
<td>".$item["selected_quantity"]."</td>
<td>$".$item["total_price"]."</td>
</tr>";
    $total_quantity += $item["selected_quantity"];
    $total_price += $item["total_price"];
}

print "
</form>
<tr>
<td colspan=\"3\">Number of products</td>
<td align=\"left\" colspan=\"3\">".$total_quantity."</td>
</tr><tr>
<td colspan=\"3\">Total</td>
<td align=\"left\" colspan=\"3\">$".$total_price."</td>
</tr>
</tbody>
</table>

<table style=\"background-color: transparent; border-spacing: 0; padding: 0; \" border=\"0\">
<tbody>
<tr>
<td>
<form action='../shopping-cart/clearCart.php' method=\"post\" target=\"top_right\">
<input type=\"submit\" value=\"Clear\" onclick=\"{if(confirm('Do you want to clear your shopping cart?')) {return true;} return false;}\">
</form>
</td>
<td>
<form action=\"checkout.php\" method=\"post\" target=\"top_right\">
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
