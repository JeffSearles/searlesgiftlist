<?php
session_start();
if ($_SESSION['user_level'] > 2 || !$_SESSION['username']) {
header("Location: test.php");
}


include("../private/dbinfo.php")	
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

$field = $_GET['username'];
$family_admin = $_GET['family'];

echo "<pre>$delete</pre>";
mysql_query("delete from log_in where username = '$field' and family_admin = '$family_admin'");


?>
<script type="text/javascript">
window.location = "http://searlesgiftlist.duckdns.org/deleteusers.php"
</script>
