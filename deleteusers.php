<?php session_start();
if ($_SESSION['user_level'] > 2 || !$_SESSION['username']) {
header("Location: test.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete Users</title>
<link href="loginstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/menu_style.css" type="text/css" />

<style type="text/css">

table.thing, td { border: thin black solid; }
table.thing {margin-left: 220px; background-color: white;}
td.links { background: #999999; font-size: 25px; border: thin black solid; }
a.whistle { margin-left: 6%; color: black; }
body { background: #000000; }
td {padding-left: 15px; padding-right:15px;}


</style>

<script type="text/javascript">

function disp_confirm(field, fam)
{
var r=confirm("Are you sure you want to delete this user?");
if (r==true)
  {
  alert("You have just deleted " + field);
  window.location = "http://searlesgiftlist.duckdns.org/deleteusers2.php?username=" + field + "&family=" + fam;
  }
}


</script>
</head>

<body>



<div style=" width: 500px; ">

<?php
include("../private/dbinfo.php");
include("menubar.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');

if ($_SESSION['user_level'] < 2){
$result = mysql_query("select username from log_in");
}
else{
$no_apos = $_SESSION['family_admin'];
$result = mysql_query("select username from log_in where family_admin='$no_apos'");
}
echo "<table class=thing>"; 
echo "<tr><td>Username</td><td>Delete</td></tr>";
echo "<tr>"; 
while ($row = mysql_fetch_row($result)){
foreach ($row as $field)
echo "<td>$field</td>";
 ?>
<td>
<input type="button" onclick="disp_confirm('<?php echo $field ?>', '<?php echo $no_apos ?>')" value="Delete" />
</td>
<?php
echo "</tr>"; 
}
echo "</table>";

?>

</td>
</tr>
</table>


</body>
</html>
