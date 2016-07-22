<?php
session_start();
$username2 = $_SESSION['username'];
$password2 = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass1']);

include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');
//$username2 = mysql_real_escape_string($username2);
//$username2 = mysql_real_escape_string($newpass);
//$password2 = mysql_real_escape_string($password2);

$qry = "select * from log_in where username = '$username2' and password = '$password2'";
$login = mysql_query($qry);
$rowcount = mysql_num_rows($login);

if ($rowcount >= 1){
	
	  $qry = "UPDATE `log_in` SET password = '$newpass' WHERE password = '$password2' AND username = '$username2'";
	  mysql_query($qry);
	  echo "<script type='text/javascript'>alert('password changed');";
	  echo "window.location='additem.php';</script>";
	}

else {echo "you can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";}

?>
