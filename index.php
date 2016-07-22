<?php
if (strtolower($_SERVER['HTTP_HOST']) == "parkerfamily.ddns.net"){
	header("Location: /parker/index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
</head>

<style type="text/css">
img { width: 250px; }
table, td { border: none; }
td.links { background: #999999; font-size: 25px; border: thin black solid; }
body { background: #000000; }
div { width: 800px; margin-left: 92px; margin-right: 92px; background: white; border: white solid; }
h1 { text-align: center; }
form { text-align: center; }
p { text-align: right; }

</style>

<body>


<div>
<table>
<tr>
<td colspan=1 style=" width: 20%; " class="links">

<h1>Welcome</h1>

</td>
</tr>
<tr>
<td style=" width: 800px; ">


<form method="post" action="loginproc.php">
username: <input type="text" name="username" size="20">
password: <input type="password" name="password" size="20">
<input type="submit" value="Submit" name="submit1"><input type="reset" value="Reset" name="reset1">
</form>

<!-- <p><small>Not signed up? Signup <a href="usersignin.php">HERE.</a></small></p> -->

</td>
</tr>
</table>

</div>

</body>
</html>
