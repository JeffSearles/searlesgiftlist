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
p { text-align: center; font-size: 20px; }
form { text-align: center; }

</style>
<body>
<?php

if ($_SESSION['username']){

include("../private/dbinfo.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');


$sql="SELECT distinct family_admin FROM log_in";
$result=mysql_query($sql);

$options="";

while ($row=mysql_fetch_array($result)) {

    $family_admin=$row["family_admin"];
    $options.="<OPTION VALUE=\"$family_admin\">".$family_admin."</OPTION>";
}
?> 

?>
<div>
<table>
<tr>
<td colspan=1 style=" width: 20%; " class="links">

<h1><a href="login.php">Login</a></h1>

</td>
</tr>
<tr>
<td style=" width: 800px; ">
<p>Signup</p>
<form action="usersignin2.php" method="post">
Username: <input name="username" type="text" size="20"/><br />
Password: <input name="password" type="password" size="20"/><br />
<SELECT NAME="family_admin">
<OPTION VALUE=0>Select Family Administrator</OPTION>
<?=$options?>
</SELECT> 
<input type="submit" value="Submit" />
</form>

</td>
</tr>
</table>

</div>
</body>
</html>
