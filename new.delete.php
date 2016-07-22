<?php 
session_start();
if ($_SESSION['username']){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Your Christmas List</title>
</head>
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<link href="loginstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">

table{background-color: white;}

</style>


<script type="text/javascript">

function disp_confirm(fname)
{
var r=confirm("Are you sure you want to delete this item?");
if (r==true)
  {
    window.location.href = "delete.php?id=" + fname; 
     }
}

function description(fname, desc)
{
var description2 = prompt("Type you description here:",desc)
if (description2)
  {
  window.location.href("http://192.168.105.250/amber/Login/newdesc.php?desc=" + description2 + "& fname=" + fname)  
  }
else 
  {
  alert("Please make sure your popup blocker is turn off.")
  }
}

</script>


<body>

<div class="outer">	
	<div id="menu4">
		<ul>
		<li><a href="additem.php" target="_self">Home</a></li>
		<li><a href="new.php" target="_self">View Your List</a></li>
		<li><a href="otherlists.php" target="_self">View Other Lists</a></li>
		<?php if ($_SESSION['user_level'] < 3) { ?>
		<li><a href="signup.php" target="_self">Add User</a></li>
		<li><a href="deleteusers.php" target="_self">View/Delete Users</a></li>
		<?php } ?>
		<li><a href="password.php" target="_self">Change Password</a></li>
		<li><a href="logout.php" target="_self">Logout</a></li>
	</ul>
</div>
</div>

<form action="delete.php" method="post">
<?php

$username = "searlesg_neddis";
$password = "hcEz8dL2";
$hostname = "localhost";	
mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");

$username2 = $_SESSION['username'];

if (!mysql_connect($hostname, $username, $password))
    die("Can't connect to database");

if (!mysql_select_db('searlesg_searles'))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT item, website, cost, id FROM upload WHERE username = '$username2'");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_numb = mysql_num_fields($result) - 1;
$fields_num = mysql_num_fields($result);

?>
<table style='width: 65%;'><tr><td colspan=3><h1><?php echo  ucfirst($username2); ?>'s Christmas list</h1></tr><tr>
<?php
// printing table headers
for($i=0; $i<$fields_numb; $i++)
{
    $field = mysql_fetch_field($result);
   
      echo "<td><h3>{$field->name}</h3></td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $key => $cell){
       if ($key == 1){ $acell = wordwrap($cell, 50, "<br />\n", true); 
                if (parse_url($cell, PHP_URL_SCHEME)){
        		echo "<td style='border-top: thin dashed black;'><a href='$cell'>$acell</a></td>"; }
        		else{echo "<td style='border-top: thin dashed black;'>$acell</td>"; }}
        if ($key == 0 || $key == 2){ echo "<td style='border-top: thin dashed black;'>$cell</td>"; }
        if ($key == 3) {echo "<td style='border-top: thin dashed black'><input type='button' 
        onclick='disp_confirm($cell)' value='delete'>";

    echo "</tr>\n";
    }
}
}
mysql_free_result($result);

}
else {echo "You can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";};
?>
</form>


</td>
</tr>
</table>

</div>


</body>
</html>
