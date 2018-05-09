<?php
/**
 * Created by PhpStorm.
 * User: anluoridge
 * Date: 7/5/18
 * Time: 21:40
 */

session_destroy();
echo "clearing";
print "<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<title>Shopping cart</title>

<script language=\"javascript\">
function checkout(ToCheckIt)
{
	if (ToCheckIt == 0  || !(ToCheckIt))
	{
               window.alert(\"Your shopping cart is empty, please select something!\");

                return false;
                
	}
	else
	{ 
		return true;

	}
}


</script>

<style>


table  {
	background: #99f;
	color:#fff;
	text-align:left;
	font-size:12px;
	border-spacing: 4px;
}
table a, table, tbody, tfoot, tr, th, td {
	font-family: Verdana, arial, helvetica, sans-serif;
}
table, {
	border-left:3px solid #567;
	border-right:3px solid #000;
	padding: 3px;
}
table a {
	text-decoration: none;
	background: inherit;
	color: #ccf;
	font-weight: bold;
}
table a:link {
	text-decoration: none;
}
table a:visited {
	background: inherit;
	color: #66c;
	text-decoration: line-through;
}
table a:hover {
	background: inherit;
	color: #eef;
	position: relative;
	top: 1px;
	left: 1px;
	text-decoration: none;
}
table caption {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
	text-align: left;
	padding: 3px;
	color: #ccf;
	background: #99f;
	font-family: georgia, \"times new roman\", serif;
	font-size:20px;
	font-weight:bold;
}
table, td, th {
	margin:0px;
	padding:3px;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
}
td, th {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
}
tr.odd {
	color: inherit;
	background: #88e;
}
ht:bold;
		color:#592C16;
		padding: 16px 9px;
		
	}


</style>

<script type=\"text/javascript\" async=\"\" src=\"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js\"></script></head>

<body background=\"pics/website_background.jpg\" bgproperties=\"fixed\">
<center>
<img src=\"utslogo.gif\">
<form action=\"/~jinsonz/ip/ass-1/add.php\" method=\"post\" target=\"bottom_right\">
<table width=\"90%\"><tbody><tr><td><b>Del</b></td><td><b>Product name</b></td><td><b>Unit price</b></td><td><b>Unit quantity</b></td><td><b>Required quantity</b></td><td><b>Total cost</b></td></tr></tbody></table><table style=\"background-color: transparent; border-spacing: 0; padding: 0; \" border=\"0\"><tbody><tr><td><input type=\"submit\" name=\"clear\" value=\"Clear\" onclick=\"{if(confirm('Do you want to clear your shopping cart?')) {return true;} return false;}\"></td><td><input type=\"submit\" value=\"Delete\" onclick=\"{if(confirm('Do you want to delete the selected items?')) {return true;} return false;}\"></td><td><form action=\"checkout.php\" method=\"post\" target=\"top_right\"><input type=\"submit\" name=\"submit\" value=\"Checkout\" onclick=\"return checkout()\"></form></td></tr>
</tbody></table>
</form></center>

 </body></html>";