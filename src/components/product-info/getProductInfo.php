<?php

$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');

$product_id = $_GET['product_id'];
$query_string = "select * from products where product_id = ".$product_id;

$result = mysqli_query($connection, $query_string);
$num_rows = mysqli_num_rows($result);
$items = mysqli_fetch_assoc($result);

print "<H1>Product Detail</H1>";
if ($num_rows > 0 ) {
    print "<table border='0'>";

    print "
<tr>
<td>Product: </td>
<td>".$items["product_name"]."</td>
</tr>

<tr>
<td>Price: </td>
<td>"."$".$items["unit_price"]."</td>
</tr>

<tr>
<td>Unit Quantity: </td>
<td>".$items["unit_quantity"]."</td>
</tr>

";

    print "</table>";

    print "<br>
<table border='0'>
<tr>
<td><input type='text' size='3'></td>
<td>"."/ ".$items["in_stock"]." available"."</td>
</tr>

<tr><td>　</td></tr>
<tr>
<td>
<input type='submit' value='Add to cart'>
</td>
</tr>
</table>";
}

mysqli_close($connection);