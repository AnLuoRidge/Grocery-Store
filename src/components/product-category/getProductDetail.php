

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $items["product_name"] ?></title>
        <link href='../product-detail/product-detail.css' rel="stylesheet" type="text/css">
        <link href='../shopping-cart/cart.css' rel="stylesheet" type="text/css"/>
    </head>
<body>
<?php
session_start();
if(!empty($_SESSION['new'])):
?>
<div class="center">
    <h3>You already choose to checkout and you cannot add product now! Please finish your current bill or click cancel to continue shopping!</h3>
    <table>
        <tr>
            <td colspan="2" width="50%" boder="0">
<!--                <form action="../shopping-cart/clearCart.php">-->
                <a class="button" href="../product-detail/product_detail.html "  target="productDetailFrame" onclick="{if(confirm('Do you want to cancel your current bill?')) {cancel();return true; } return false;<?php session_destroy();?>}">Cancel</a >
<!--                </form>-->

            </td>
            <td colspan="2" width="50%" boder="0" >
                <a class="button" href="../product-detail/product_detail2.html" target="productDetailFrame" onclick="{alert('Please complete your current bill or click Cancel to continue shopping.')}">Checkout</a >
            </td>
        </tr>
    </table>
</div>
    <?php
    else:
    include '../../../config/configuration.php';

    $product_id = $_GET['product_id'];
    $query_string = "select * from products where product_id = " . $product_id;

    $result = mysqli_query($connection, $query_string);
    $num_rows = mysqli_num_rows($result);
    $items = mysqli_fetch_assoc($result);
    ?>
<div class="center">
    <h1 style="margin-top: 0%;"><?php echo $items["product_name"] ?></h1>

<?php
//if ($num_rows > 0) {
print "<table border='0'>";

print "
<tr>
<td><span class='attributes'>Price: </span><span>" . "$" . $items["unit_price"] . "</span></td>

</tr>

<tr>
<td class='attributes'>Unit Quantity: </td>
<td>" . $items["unit_quantity"] . "</td>

</tr>
<tr>
<td>
<img src='../product/$product_id.png' width='100px' style='margin: auto;'>
</td>
</tr>

";

print "</table>";

print "<center>
<form name='addProdcut' id='addProduct' action='../product-detail/addToCart.php?product_id=" . $product_id . "' method='post' target='cartFrame' style='font-size: 18px;margin-top: 5%;'>
<input type='number' max='20' min='1' name='selected_quantity' value='1' required class='qty'>     /    " . $items["in_stock"] . " available" . "
</form>

<input type='submit' value='Add to cart' class='button' form='addProduct'>
</center>
</div>
</body>
</html>";


mysqli_close($connection);endif;
