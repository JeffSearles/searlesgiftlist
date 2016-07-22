<? session_start();
if ($_SESSION['user_level'] > 2) {
header("Location: test.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Added a user</title>


<style type="text/css">
img { width: 200px; }
table, td { border: none; }
td.links { background: #999999; font-size: 25px; border: thin black solid; }
a.whistle { margin-left: 7%; color: black; }
body { background: #000000; }


</style>
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<link href="loginstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include("menubar.php"); ?>

<div class="notpic">
<table>

<tr>
<td style=" width: 400px; ">

<?php

$username2 = $_POST['username'];
$password2 = md5($_POST['password']);

if($_POST['family_admin']){$family_admin = $_POST['family_admin'];}

else {$family_admin = $_SESSION['family_admin'];}

include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

$qry = "select * from log_in where username = '$username2'";
$login = mysql_query($qry);
$rowcount = mysql_num_rows($login);
$row = mysql_fetch_row($login);


if ($rowcount < 1){
mysql_query("INSERT INTO log_in VALUES('$username2','$password2', NOW(), '5', '$family_admin', NULL)")
or die('Could not connect: ' . mysql_error()) ;

// $result = mysql_query("select * from log_in");

echo "You are now signed up.";

}
else {
?>
<script type="text/javascript">
alert("That username is not available");
window.location = "http://www.searlesgiftlist.com/signup.php";
</script>

<?php

}
?>

</td>
</tr>
</table>

</div>

</body>
</html>
