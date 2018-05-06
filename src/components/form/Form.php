
<html>

/**
* Created by PhpStorm.
* User: shuaichen
* Date: 6/5/18
* Time: 10:54
*/
	<head>
        <title>Delivery form</title>
	</head>
	<body>
    <label>Please enter your details for delivery!</label>
    <label>Attention: * is required!</label>
		<form method="POST" action="Form_submitted.php">
		<table>
		<tr>
            <td>First Name: </td>
            <td><input type="text" name="tFName" required></tr></td>
			<tr><td>Last Name: </td>
                <td><input type="text" name = "tLName" required></tr></td>
            <tr><td>Address: </td>
                <td><input type="text" name = "tAddress" required></tr></td>
            <tr><td>Suburb: </td>
                <td><input type="text" name = "tSuburb" required></tr></td>
            <tr><td>State: </td>
                <td><input type="text" name = "tState" required></tr></td>
			<tr><td>Country: </td><td>
<!--			<select name = "sDegree">-->
<!--				<option>Bachelor</option>-->
<!--				<option>Masters</option>-->
<!--				<option>PhD</option>-->
<!--			</select></tr></td>-->

            <tr><td>Post Code: </td>
                <td><input type="text" name = "tPCode" required></tr></td>
            <tr><td>Email: </td>
                <td><input type="text" name = "tEmail" required></tr></td>

            <tr><td>
			<input type= "submit" name="Confirm" value ="submit"></tr></td>
        </table>
		</form>
	</body>

</html>