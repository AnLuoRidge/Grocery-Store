

<html>
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: shuaichen-->
<!-- * Date: 6/5/18-->
<!-- * Time: 11:15-->
<!-- */-->
	<head><title> My submitted page</title>
	</head>
	<body>
    <?php
    $lastName=$_POST['tLName'];
    $firstName=$_POST['tFName'];
    $address=$_POST['tAddress'];
    $suburb=$_POST['tSuburb'];
    $state=$_POST['tState'];
    $country=$_POST['countries'];
    $postcode=$_POST['tPCode'];
    ?>
    <p style="font-size: xx-large;">Your Delivery Details</p>
    Your name:
	<?php
		echo $_POST['tFName'];
		echo ' ';
		echo $_POST['tLName'];
	?>
    <br/>
	 Your address is: <b><?php
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
<br/>
	 Your email is: <?php echo $_POST['email']; ?>
        <br/>

	<p style="font-size: xx-large;">Thank you for shopping with us! </p>

        <?php

$to = $_POST['email'];
$subject = "Your order details";

$message = "<p>Your Name : $firstName $lastName</p>
<br/>
<p>Your address is: $address ,</p> <br/>
<p>$suburb, $state, $country, $postcode</p>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//// More headers
//$headers .= 'From: <webmaster@example.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>
	</body>
</html>