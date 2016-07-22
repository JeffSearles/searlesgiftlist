<?php
session_start();
if ($_SESSION['username']) {

include ("../private/dbinfo.php")	
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

$username2 = $_SESSION['username'];

mysql_query("delete from log_in where username = '$username2'");
mysql_query("delete from upload where username = '$username2'");
header("Location: login.php");
}

else {
echo "You are not logged in."
?>
<br />
<a href="login.php"> Login </a>
<?php
}
?>
