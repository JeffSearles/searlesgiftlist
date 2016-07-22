<?php
session_start();
session_destroy();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged out</title>
</head>

<style type="text/css">
img { width: 200px; }
table, td { border: none; }
td.links { background: #999999; font-size: 25px; border: thin black solid; }
a.whistle { margin-left: 45%; color: black; }
body { background: #000000; }
div { width: 800px; margin-left: 92px; margin-right: 92px; background: white; border: white solid; }
form { text-align: center; }
p { text-align: center; font-size: 20px;; } 


</style>

<body>
<div>
<table>
<tr>
<td colspan=1 style=" width: 20%; " class="links">

<a href="index.php" class="whistle">Login</a>
<br />
</td>
</tr>
<tr>
<td style=" width: 800px; ">

you are logged out.


</td>
</tr>
</table>

</div>
</body>
</html>
