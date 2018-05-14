<?php
session_start();
?>
<html>
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: shuaichen-->
<!-- * Date: 6/5/18-->
<!-- * Time: 11:15-->
<!-- */-->
<head>
    <title>My submitted page</title>
    <link href='../checkout/purchase.css' rel="stylesheet" type="text/css"/>
    <link href='../shopping-cart/cart.css' rel="stylesheet" type="text/css">
    <!-- MDUI -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.1/css/mdui.min.css">
</head>
<body>
<?php
$lastName = $_POST['tLName'];
$firstName = $_POST['tFName'];
$address = $_POST['tAddress'];
$suburb = $_POST['tSuburb'];
$state = $_POST['tState'];
$country = $_POST['countries'];
$postcode = $_POST['tPCode'];
$date = date("Y/m/d");
$time = date("h:i:sa");
?>

<div class="confirmation" style="font-size: 18px;">
    <h1>Order Review and Delivery Details</h1>
    <br>
    <!-- order info -->
    <table class="squeeze-table" style="width: 700px">
        <tbody>
        <tr style="margin-bottom: 1%;">
            <td class="underline"><b>Product</b></td>
            <td class="underline"><b>Price</b></td>
            <td class="underline"><b>Quantity</b></td>
            <td class="underline"><b>Total</b></td>
        </tr>

        <?php
        $total_quantity = 0;
        $total_price = 0;

        foreach ($_SESSION["cart"] as $product_id => $item) {
            print "  <!--name array in input. get key of array.-->
        <tr>
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
    <table class="squeeze-table" style="margin-left: 25%">
        <tr>
            <td>
                Your Name:
            </td>
            <td>
                <?php
                echo $_POST['tFName'];
                echo ' ';
                echo $_POST['tLName'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Your Delivery Address:
            </td>
            <td>
                <?php
                echo $_POST['tAddress'];
                echo ', ';
                echo $_POST['tSuburb'];
                echo ', ';
                echo $_POST['tState'];
                echo ', ';
                echo $country;
                echo ', ';
                echo $_POST['tPCode'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Your Email Address:
            </td>
            <td>
                <?php echo $_POST['email']; ?>
            </td>
        </tr>
    </table>
    <p style="font-size: xx-large;font-style: italic;">Thank you for shopping with us!</p>
</div>
<br>


    <?php

    $to = $_POST['email'];
    $subject = "Your order details";

    $message .= "
<h1>This is a confirmation email of your order.</h1>
<h2>Your order details:</h2>";
    $message.="
    <table class=\"squeeze-table\" style=\"width: 700px\">
        <tbody>
        <tr style=\"margin-bottom: 1%;\">
            <td class=\"underline\"><b>Product</b></td>
            <td class=\"underline\"><b>Price</b></td>
            <td class=\"underline\"><b>Quantity</b></td>
            <td class=\"underline\"><b>Total</b></td>
        </tr>";

    $message.=   " <tr>";
//     if(isset($_SESSION['new'])):
        $total_price = 0;
        $total_quantity = 0;
         foreach ($_SESSION["cart"] as $product_id => $item) :
         $message.= " <td>" . $item["product_name"] . "</td>
            <td>$" . $item["product_unit_price"] . "</td>
            <td>" . $item["selected_quantity"] . "</td>
            <td>$" . $item["total_price"] . "</td>
        </tr>
        <tr>
        <td></td>
            <td style='color: grey'>" . $item["product_unit_quantity"] . "</td>
</tr>";
$total_quantity += $item["selected_quantity"];
            $total_price += $item["total_price"];endforeach;
       $message.=" <tr style='margin-top: 1%;'>
        <td colspan='3' class='topline'></td>
        <td class='topline'><span style='font-weight: bold;'><br>Subtotal: </span><span>$total_price</span></td>
    </tr>
    </tbody>
</table>";

   $message.="<h2>Your Delivery Details:</h2>
<table class=\"squeeze-table\" style=\"width: 700px\">
    <tr>
        <td>Your Name:</td>
        <td>$firstName $lastName</td>
    </tr>
    <tr>
        <td>Address:</td>
        <td>$address</td>
    </tr>
    <tr>
        <td>Suburb:</td>
        <td>$suburb</td>
    </tr>
    <tr>
        <td>State:</td>
        <td>$state</td>
    </tr>
    <tr>
        <td>Country:</td>
        <td>$country</td>
    </tr>
    <tr>
        <td>Postcode:</td>
        <td>$postcode</td>
    </tr>
</table>
<p>$date, $time</p>";


    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //// More headers
    $headers .= 'From: <12861896@student.uts.edu.au>' . "\r\n";
    $header .= "Return-Path: <12861896@student.uts.edu.au>\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
    ?>
</body>
</html>
 <?php session_destroy(); ?>