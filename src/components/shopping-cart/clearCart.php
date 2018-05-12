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
    <tr>
        <td class="underline" style="width:10px"><b>Del</b></td>
        <td class="underline"><b>Product</b></td>
        <td class="underline"><b>Price</b></td>
        <td class="underline"><b>Quantity</b></td>
        <td class="underline"><b>Total</b></td>
    </tr>
    <tr><td colspan="5" >Your cart is empty.</td></tr>
    <tr style="visibility: hidden">
        <td style="font-weight: bold">Number of products</td>
        <td id="num of products">0</td>
    </tr>

    <tr>
        <td colspan="4" class="topline"></td>
        <td class="topline"><text style="font-weight: bold;"><br>Subtotal: </text><text>$0</text></td>
    </tr>
    </tbody>
</table>

<input type="submit" value="Delete" class="black-button" style="margin-left: 5%"
       onclick="{alert('No products!'); return false;}">

<input type="submit" value="Clear" class="black-button"
       onclick="{alert('No products!'); return false;}">

<input type="submit" name="submit" value="Proceed to checkout" class="yellow-button" onclick="{alert('No products!'); return false;}">

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: anluoridge
 * Date: 7/5/18
 * Time: 21:40
 */

// MUST start before destroy
session_start();
session_unset();