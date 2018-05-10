<?php

$product_id = $_GET['product_id'];

$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');
$query_string = "select * from products where product_id = " . $product_id;

$result = mysqli_query($connection, $query_string);
$num_rows = mysqli_num_rows($result);
$items = mysqli_fetch_assoc($result);

print "<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Product Detail</title>
    <link href='../product-detail/product-detail.css' rel=\"stylesheet\" type=\"text/css\"/>
</head>
<body>

<H1>Product Detail</H1>";

if ($num_rows > 0) {
    print "<table border='0'>";

    print "
<tr>
<td>Product: </td>
<td>" . $items["product_name"] . "</td>
</tr>

<tr>
<td>Price: </td>
<td>" . "$" . $items["unit_price"] . "</td>
</tr>

<tr>
<td>Unit Quantity: </td>
<td>" . $items["unit_quantity"] . "</td>
</tr>

";

    print "</table>";

    print "<br>
<table border='0'>
<tr>
<form name='addForm' action='../product-detail/addToCart.php?product_id=" . $product_id . "' method='post' target='cartFrame'>
<td><input type='number' size='1' max='" . $items["in_stock"] . "' min='1' name='selected_quantity' value='1' required></td>
<td>" . "/ " . $items["in_stock"] . " available" . "</td>
</tr>

<tr><td>　</td></tr>
<tr>
<td>
<input type='submit' value='Add to cart'>
</td>
</form>
</tr>
</table>
</body>
</html>";
}

mysqli_close($connection);
