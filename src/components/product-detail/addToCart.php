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
$query_string = "select * from products where product_id = " . $product_id;
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

// return cart.html
print "
<html>
<head>
<title>Shopping Cart</title>
<link href='../shopping-cart/cart.css' rel=\"stylesheet\" type=\"text/css\"/>
</head>
<body>
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
<td>$" . $item["product_unit_price"] . "</td>
<td>" . $item["selected_quantity"] . "</td>
<td>$" . $item["total_price"] . "</td>
</tr>";
    $total_quantity += $item["selected_quantity"];
    $total_price += $item["total_price"];
}
?>

</form>
<tr>
    <td colspan="3">Number of products</td>
    <td align="left" colspan="3" id="num of products"><?php echo $total_quantity ?></td>
</tr>
<tr>
    <td colspan="3">Total</td>
    <td align="left" colspan="3">$<?php echo $total_price ?></td>
</tr>
</tbody>
</table>
<center>
<table style="background-color: transparent; border-spacing: 0; padding: 0; " border="0">
    <tbody>
    <tr>
        <td>
            <form action='../shopping-cart/clearCart.php' method="post" target='cartFrame'>
                <input type="submit" value="Clear"
                       onclick="{return confirm('Do you want to clear your shopping cart?')}">
            </form>
        </td>
        <td>
            <form action='../checkout/Form.php' method="post" target='top_right'>
                <input type="submit" name="submit" value="Proceed to checkout" onclick="
                const quantity = Number(document.getElementById('num of products').innerHTML);
                if quantity > 0 {
                    return true;
                } else {
                    alert('No products');
                    return false;
                }">
            </form>
        </td>
        <td>
            <form> <!-- if no form tag, delete button will be lower than others -->
            <input type="submit" value="Delete" form='selectedProducts'
                   onclick="{return confirm('Do you want to delete the selected items?')}">
            </form>
        </td>
    </tr>
    </tbody>
</table>
</center>
</body>
</html>


