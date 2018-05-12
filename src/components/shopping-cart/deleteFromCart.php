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
?>

<!--return cart.html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href='../shopping-cart/cart.css' rel="stylesheet" type="text/css"/>
</head>
<body>
<h1>My cart</h1>
<table class="squeeze-table">
    <tbody>
    <tr style="margin-bottom: 1%;">
        <td class="underline" style="width:10px"><b>Del</b></td>
        <td class="underline"><b>Product</b></td>
        <td class="underline"><b>Price</b></td>
        <td class="underline"><b>Quantity</b></td>
        <td class="underline"><b>Total</b></td>
    </tr>
    <form id='selectedProducts' action='../shopping-cart/deleteFromCart.php' target='cartFrame' method='post'>

        <?php
        $total_quantity = 0;
        $total_price = 0;

        foreach ($_SESSION["cart"] as $product_id => $item) {
            print "  <!--name array in input. get key of array.-->
        <tr><td><input type='checkbox' name='delete[]' value=" . $product_id . "></td>
            <td>" . $item["product_name"] . "</td>
            <td>$" . $item["product_unit_price"] . "</td>
            <td>" . $item["selected_quantity"] . "</td>
            <td>$" . $item["total_price"] . "</td>
        </tr>
        <tr>
        <td></td>
            <td style='color: grey'>" . $item["product_unit_quantity"] . "</td>
</tr>";
            $total_quantity += $item["selected_quantity"];
            $total_price += $item["total_price"];
        }
        ?>

    </form>

    <tr style="margin-top: 1%;">
        <td colspan="4" class="topline"></td>
        <td class="topline"><text style="font-weight: bold;"><br>Subtotal: </text><text>$<?php echo $total_price ?></text></td>
    </tr>
    </tbody>
</table>

<form>
<input type="submit" value="Delete" class="black-button" style="margin-left: 5%" form="selectedProducts"
       onclick="{return confirm('Do you want to delete the selected items?')}">
</form>

<form action='../shopping-cart/clearCart.php' method="post" target='cartFrame'>
    <input type="submit" value="Clear" class="black-button" style="margin-left: 5%;"
           onclick="{return confirm('Do you want to clear your shopping cart?')}">
</form>

<form id="checkout" action='../checkout/checkout.php' method="post" target='_blank'>
    <input type="submit" name="submit" value="Proceed to checkout" class="yellow-button" onclick="
                const quantity = Number(document.getElementById('num of products').innerHTML);
                if (quantity > 0) {
                    return true;
                } else {
                    alert('No products!');
                    return false;
                }">
</form>

    <text id="num of products" style="visibility: hidden"><?php echo $total_quantity ?></text>

</body>
</html>
