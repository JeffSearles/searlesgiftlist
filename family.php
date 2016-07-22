<?php
session_start();

if ($_SESSION['username']){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/menu_style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Select the family to join</title>

<link href="loginstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">

p { text-align: center; font-size: 20px; background-color:white; padding: 40px; } 
h2 { text-align: center; }
table {background-color: white; margin-left: 25px;}
body {background-color: black;}

</style>
</head>
<body>
<p>Select which family's lists you would like to browse:</p>
<form method="post" action="home.php">
<?php
include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');
$username2 = $_SESSION['username'];


$sql="SELECT distinct family_admin FROM log_in WHERE username = '$username2'";
$result=mysql_query($sql);

$options="";


echo "<SELECT NAME='family_admin'>";
echo "<OPTION VALUE=0>Select Family Administrator</OPTION>";
while ($row=mysql_fetch_array($result, MYSQL_NUM)) {

    $family_admin=$row[0];
    echo "<OPTION VALUE=\"$family_admin\">".$family_admin."</OPTION>"; 
    


}
echo "<input type='submit' value='submit'>";

}
else {echo "you can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";}
?>
</html>
