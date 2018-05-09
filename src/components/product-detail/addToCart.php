<?php
/**
 * Created by PhpStorm.
 * User: anluoridge
 * Date: 6/5/18
 * Time: 21:35
 *
 *
 * DS of the chart
 * array (product_id => product_detail)
 * product_detail = (name, selected_quantity, unit_price, total_price)
 *
 * if the cart not exist
 *  create the cart in SESSION and assign it with the array(id => array (detail))
 * if the cart exist
 *  if product_id not exist
 *      add the id array to the cart. by array["newKey"] = newValue
 *  if product_id exist
 *      += quantity, total value.
 *
 *
 * get num of all products
 *
 * js
 * clear
 * delete
 * checkout
 */

$product_id = $_GET["product_id"];
$selected_quantity = $_POST["selected_quantity"];

// TODO: include configuration.php
// TODO: do following only when cart id doesn't exist
// from DB get price and other info
$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');
$query_string = "select * from products where product_id = ".$product_id;
$result = mysqli_query($connection, $query_string);
$num_rows = mysqli_num_rows($result);
// TODO: if result is empty, jump out.
$items = mysqli_fetch_assoc($result);

$product_name = $items["product_name"];
$product_unit_quantity = $items["unit_quantity"];
$product_unit_price = $items["unit_price"];
$product_total_price = $selected_quantity * $product_unit_price;

$product_detail = array(
    "product_name" => $product_name,
    "product_unit_quantity" => $product_unit_quantity,
    "product_unit_price" => $product_unit_price,
    "selected_quantity" => $selected_quantity,
    "total_price" => $product_total_price
    );

session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array($product_id => $product_detail);
} else {
    if (!isset($_SESSION["cart"][$product_id])) {
        // add the item to cart array
        $_SESSION["cart"][$product_id] = $product_detail;
    } else {
        // update the product record
        $_SESSION["cart"][$product_id]["selected_quantity"] += $selected_quantity;
        $_SESSION["cart"][$product_id]["total_price"] += $product_total_price;
    }
}

// return Cart.html
print "
<html>
<head>
<title>Shopping Cart</title>
<style>


table  {
	background: #99f;
	color:#fff;
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
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
}
td, th {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
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
";

$total_quantity = 0;
$total_price = 0;

foreach ($_SESSION["cart"] as $item) {
    print "  
<tr><td><input type=\"checkbox\" name=\"delete[]\" value=\"0\"></td>
<td>".$item["product_name"]."</td>
<td>".$item["product_unit_quantity"]."</td>
<td>".$item["product_unit_price"]."</td>
<td>".$item["selected_quantity"]."</td>
<td>$".$item["total_price"]."</td>
</tr>";
    $total_quantity += $item["selected_quantity"];
    $total_price += $item["total_price"];
}

print "<tr>
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
<form action='../shopping-cart/clear.php' method=\"post\" target=\"top_right\">
<input type=\"submit\" value=\"Clear\" onclick=\"{if(confirm('Do you want to clear your shopping cart?')) {return true;} return false;}\">
</form>
</td>
<td><input type=\"submit\" value=\"Delete\" onclick=\"{if(confirm('Do you want to delete the selected items?')) {return true;} return false;}\"></td>
<td>
<form action=\"checkout.php\" method=\"post\" target=\"top_right\">
<input type=\"submit\" name=\"submit\" value=\"Checkout\" onclick=\"return checkout(1)\"><
/form>
</td>
</tr>
</tbody>
</table>
</center>
</body>
</html>
";
print_r($_SESSION["cart"]);

