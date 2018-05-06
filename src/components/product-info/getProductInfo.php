<?php

//Procedural style
$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');

// php can get the input directly from the HTML
$made_after = $_REQUEST['earliest_made'];
$made_before = $_REQUEST['latest_made'];

//$query_string = "select * from films where (year>=$made_after and
// year <= $made_before)";
$query_string = "select * from films";

$result=mysqli_query($connection,$query_string);

$num_rows=mysqli_num_rows($result);
echo "Displaying the results using associative array";

//using associative array
// mysqli_fetch_assoc: This function will return a row as an associative array where the column names will be the keys storing corresponding value.

if ($num_rows > 0 ) {
    print "<table border='0'>";

	//write the code here to get values using associative array
//    print "<td>$num_rows['title']</td>"
//    print_r(array_keys($num_rows))
    print "</table>";
}

mysqli_close($connection);


?>