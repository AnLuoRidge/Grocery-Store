<html>
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: shuaichen-->
<!-- * Date: 6/5/18-->
<!-- * Time: 11:15-->
<!-- */-->
<head>
    <title>My submitted page</title>
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
<h1 style="font-size: xx-large;">Your Delivery Details</h1>
<div style="font-size: 18px;">
    <p><text style="font-weight: bold;">Name:</text>
<?php
echo $_POST['tFName'];
echo ' ';
echo $_POST['tLName'];
?>
</p>
    <p><text style="font-weight: bold;">Delivery address: </text><?php
    echo $_POST['tAddress'];
    echo ', ';
    echo $_POST['tSuburb'];
    echo ', ';
    echo $_POST['tState'];
    echo ', ';
    echo $country;
    echo ', ';
    echo $_POST['tPCode'];

    ?></p><p><text style="font-weight: bold;">
            Email: </text><?php echo $_POST['email']; ?>
    </p></div>
<br>
    <p style="font-size: xx-large;font-style: italic;">Thank you for shopping with us!</p>

    <?php

    $to = $_POST['email'];
    $subject = "Your order details";

    $message = "<p>Name : $firstName $lastName</p>
<br/>
<p>Delivery address: $address ,</p> <br/>
<p>$suburb, $state, $country, $postcode</p> <br/>
<p>$date,$time</p>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //// More headers
    //$headers .= 'From: <webmaster@example.com>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
    ?>
</body>
</html>