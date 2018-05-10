<?php

$product_id = $_GET['product_id'];

$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');
$query_string = "select * from products where product_id = ".$product_id;

$result = mysqli_query($connection, $query_string);
$num_rows = mysqli_num_rows($result);
$items = mysqli_fetch_assoc($result);

/*print "
<script type=\"text/javascript\">
function check_quantity(quantity)
{
	qua_num=document.quantityform.quantity.value;
	if (qua_num == \"\" || qua_num == 0)
	  {
		  window.alert(\"Please enter the required quantity\");
		  return false;
		  
	  }
	if (qua_num > quantity)
	  {
		  window.alert(\"The required quantity is unavaliable\");
		  return false;
		  
	  }
	if (isNaN(qua_num))
	  {
		  window.alert(\"Please enter a valid quantity\");
		  return false;
		  
	  }

	 return true;
}


* function check_inStock(p_inStock) {
 if (parseInt(p_inStock) < 1) {
  alert(\"Not enough products left!\");
  return false;
 }
 var quants = document.getElementById(\"quant_of_product\").value;
 if (quants > p_inStock) {
  alert(\"You've chosen more products than possible!\");
  return false;
 }
 if (quants == \"\") {
  alert(\"Please specify how many products you want to buy!\");
  return false;
 }
 if (!validateNumber(quants, 1, 20)) {
  alert(\"Please state a correct number!\");
  return false;
 }

 document.getElementById(\"id_hiddenQuantity\").value = quants;
 document.getElementById(\"id_goChartButton\").submit();
}

function validateNumber(numberStr, min, max) {
 var temp = parseInt(numberStr);
 return (!isNaN(temp) && temp >= min && temp <= max && !/\D/.test(numberStr));
}
* 
* 
*
</script>
*/
print "
<H1>Product Detail</H1>";

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
<form name='addForm' action='../product-detail/addToCart.php?product_id=".$product_id."' method='post' target='cartFrame'>
<td><input type='number' size='1' max='".$items["in_stock"]."' min='1' name='selected_quantity' value='1' required></td>
<td>"."/ ".$items["in_stock"]." available"."</td>
</tr>

<tr><td>　</td></tr>
<tr>
<td>
<input type='submit' value='Add to cart'>
</td>
</form>
</tr>
</table>";
}

mysqli_close($connection);
