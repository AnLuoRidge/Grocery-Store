<html>
<head>
    <title>Shopping Cart</title>
    <link href='../shopping-cart/cart.css' rel="stylesheet" type="text/css">
</head>
<body>
<h3>Your cart is empty.</h3>
<center>
    <table width=\"90%\">
        <tbody>
        <tr>
            <td><b>Del</b></td>
            <td><b>Product name</b></td>
            <td><b>Unit quantity</b></td>
            <td><b>Unit price</b></td>
            <td><b>Required quantity</b></td>
            <td><b>Subtotal</b></td>
        </tr>

        <tr>
            <td colspan=\"3\">Number of products</td>
            <td align=\"left\" colspan=\"3\">0</td>
        </tr>
        <tr>
            <td colspan=\"3\">Total</td>
            <td align=\"left\" colspan=\"3\">$0</td>
        </tr>
        </tbody>
    </table>
    <!-- disable or hidden the following buttons maybe a better way -->
    <table style="background-color: transparent; border-spacing: 0; padding: 0; " border="0">
        <tbody>
        <tr>
            <td>
                <input type="submit" value="Clear"
                           onclick="{return confirm('Do you want to clear your shopping cart?')}">
            </td>
            <td>
                <input type="submit" name="submit" value="Proceed to checkout" onclick="{alert('No products!');}">
            </td>
            <td>
                <input type="submit" name="submit" value="Delete" onclick="{alert('No products!');}">
            </td>
            <td>
        </tr>
        </tbody>
    </table>
</center>
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