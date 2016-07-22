<?php
session_start();
$username2 = $_POST['username'];
$password2 = md5($_POST['password']);

include ("../private/dbinfo.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');
$username2 = mysql_real_escape_string($username2);
$password2 = mysql_real_escape_string($password2);

$qry = "select * from log_in where username = '$username2' and password = '$password2'";
$login = mysql_query($qry);
$rowcount = mysql_num_rows($login);
$row = mysql_fetch_array($login, MYSQL_ASSOC);

if ($rowcount === 1){
$_SESSION['username'] = $username2;
$_SESSION['family_admin'] = $row['family_admin'];
$_SESSION['user_level'] = $row['user_level'];

header("Location: additem.php");
   if ($username2 == 'admin') {
   header("Location: signup3.php");
   }
}

if ($rowcount > 1){
	$_SESSION['username'] = $username2;
	$_SESSION['user_level'] = $row['user_level'];
	header("Location: family.php");
	}


else if ($rowcount < 1){
header("Location: index.php");
}
?>

