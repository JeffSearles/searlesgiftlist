<?php
session_start();
if ($_SESSION['username']){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/menu_style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Password Change</title>

<script type="text/javascript">
function check_pass(){
if (document.passchange.newpass1.value != document.passchange.newpass2.value)
	alert("passwords do not match");
	window.location="password.php";
	
}

</script>
<link href="loginstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">

p { text-align: center; font-size: 20px;; } 
h2 { text-align: center; }
table {background-color: white; margin-left: 25px;}
body {background-color: black;}

</style>
</head>
<body>

<?php include("menubar.php"); ?>

<form action="password2.php" name="passchange" method="post">
<table>
	<tr>	
		<td><h4>Current Password: </h4></td>
		<td><input size="35" name="oldpass" type="password"></td>
	</tr>
		<tr>	
		<td><h4>New Password: </h4></td>
		<td><input size="35" name="newpass1" type="password"></td>
	</tr>
		<tr>	
		<td><h4>Confirm New Password: </h4></td>
		<td><input size="35" name="newpass2" type="password"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="submit" onclick="check_pass()"></td>
	</tr>
</table>
</form>
<?php
}
else {echo "you can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";}
?>
</html>
