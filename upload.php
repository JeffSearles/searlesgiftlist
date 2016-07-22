<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<script type="text/javascript">

function disp_confirm()
{
var r=confirm("Are you sure you want to delete your account?");
if (r==true)
  {
  alert("You have just deleted your account.");
  window.location.href("http://www.searlesgiftlist.com/deleteusers2.php");
  }
}


</script>

<link href="loginstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
a.whistle { margin-left: 14%; color: black; }
form { text-align: center; }
p { text-align: center; font-size: 20px;; } 
h2 { text-align: center; }
</style>

<body>
<div>
<table>
<tr>
<td colspan=1 style=" width: 20%; " class="links">

<a href="new.php" class="whistle">View Images</a>
<a href="deleteaccount.php" class="whistle" onclick="disp_confirm()">Delete Account</a>
<a href="logout.php" class="whistle">Logout</a>
<br />
</td>
</tr>
<tr>
<td style=" width: 800px; ">

<?php

echo "<h2>Welcome " . $username2 . "</h2>";

?>

<p>Add a gift list item:</p>
<form method="post" enctype="multipart/form-data" action="upload2.php">
<input type="text" name="name" length="40"><br>
<input name="website" type="text" length="60"> <br>
<input type="text" name="cost" length="12"><br>
<input name="upload" type="submit" class="box" id="go" value="submit">
</form>

<?php
if ($_SESSION['username']){ $username2 = $_SESSION['username']; }

else {
echo "You are not logged in.";
?>

<br />
<a href="login.php"> Login </a>

</td>
</tr>
</table>

</div>

</body>
</html>
