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
    <h1 style="align-content: center">Your Delivery Details<h1>
    <table class="deliveryDetail">
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

    $message = "
<p>This is a confirmation email of your order.</p>

<p>Your Delivery Details:</p>
<table>
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