<?php 
session_start();
if ($_SESSION['username']){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Other People's Gift Lists</title>
</head>
<link href="loginstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<style type="text/css">


</style>
</head>
<body>
<?php include("menubar.php"); ?>

<div class='notpic' style="width: 350px; float:left; margin-left: 25px;">

<?php
include("../private/dbinfo.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");

$username2 = $_SESSION['username'];
$family_admin = $_SESSION['family_admin'];

if (!mysql_connect($hostname, $username, $password))
    die("Can't connect to database");

if (!mysql_select_db('searlesg_searles'))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT username FROM log_in WHERE family_admin = '$family_admin'");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);
echo "<h2>Other People's Wish Lists</h2>";
echo "<table>";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td><a style='font-size: 20px;' href='list.php?list=$cell'>" . ucfirst($cell) . "</a></td>";

    echo "</tr>\n";
}
mysql_free_result($result);


?>
</table>
</div>
<?php
}
else {echo "you can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";}
?>
</body>
</html>
