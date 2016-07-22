<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<link href="loginstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">

h1 { text-align: center; }
a { color: black; }

</style>
<body>
<div>
<table>
<tr>
<td colspan=1 style=" width: 20%; " class="links">

<h1><a href="login.php">Login</a></h1>

</td>
</tr>
<tr>
<td style=" width: 800px; ">
<?php

$username2 = $_POST['username'];
$password2 = $_POST['password'];
$family_admin = $_POST['family_admin'];

include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

mysql_query("INSERT INTO log_in VALUES('$username2','$password2', NOW(), '5', '$family_admin')")
or die('Could not connect: ' . mysql_error()) ;

$result = mysql_query("select * from log_in");

echo "You are now signed up.";

?>
</td>
</tr>
</table>

</div>
</body>
</html>
