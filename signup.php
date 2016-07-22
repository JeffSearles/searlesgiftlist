<?php
session_start();
if ($_SESSION['user_level'] > 2 || !$_SESSION['username']) {
header("Location: test.php");
}

?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Add a User</title>


<style type="text/css">
img { width: 200px; }
table, td { border: none; }
td.links { background: #999999; font-size: 25px; border: thin black solid; }
a.whistle { margin-left: 8%; color: black; }
body { background: #000000; }

p { text-align: center; font-size: 20px; }
form { text-align: center; }

</style>
<link href="loginstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="menu_style.css" type="text/css" />
</head>
<body>

<?php
include("menubar.php");

if ($_SESSION['username']){
include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");
mysql_select_db('searlesg_searles');


$sql="SELECT distinct family_admin FROM log_in";
$result=mysql_query($sql);

$options="";



?>
<div class="notpic">


<table>
<tr>
<td style=" width: 800px; ">



<h3>You are adding a user</h3>
<form action="signup2.php" method="post">
Username: <input name="username" type="text" size="20"/><br />
Password: <input name="password" type="password" size="20"/><br />
<?php if ($_SESSION['user_level'] < 3){

echo "<SELECT NAME='family_admin'>";
echo "<OPTION VALUE=0>Select Family Administrator</OPTION>";
while ($row=mysql_fetch_array($result)) {

    $family_admin=$row["family_admin"];
    echo "<OPTION VALUE=\"$family_admin\">".$family_admin."</OPTION>";
}

}

	}
?>
</SELECT> 
<input type="submit" value="Submit" />
</form>
</td>
</tr>
</table>

</div>

</body>
</html>
