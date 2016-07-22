

<?php
include("../private/dbinfo.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

$id = $_GET['id'];
$username2 = $_GET['username'];

mysql_query("delete from upload where id = '$id'");
echo "<h1>You have deleted the item, CONGRATULATIONS!</h1>";
?>
