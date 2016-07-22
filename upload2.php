<?php

include("../private/dbinfo.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

$username2 = $_GET['username'];
$itemname = $_GET['itemname'];
$website = $_GET['website'];
$cost = $_GET['cost'];



if ($itemname != null){
	$query = "INSERT INTO upload (username, item, website, cost)" . 
	"VALUES ('$username2', '$itemname', '$website', '$cost')";
	mysql_query($query) or die('Error, query failed'); 
	echo "<h3>item uploaded</h3>"; 
	}
else {echo "<h3>Item not uploaded - field was blank</h3>"; }



?>

