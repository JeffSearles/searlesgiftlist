<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo ucfirst($_GET['list'])."'s Wish List"?></title>
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<link href="loginstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">

table{background-color: white;}
h1 {background-color: white; margin-bottom:0px;}
</style>

</head>
<body>

<?php
include("../private/dbinfo.php");
include("menubar.php");

mysql_connect($hostname, $username, $password) 
	or die("Unable to connect to MySQL");

$username2 = $_GET['list'];

if (!mysql_connect($hostname, $username, $password))
    die("Can't connect to database");

if (!mysql_select_db('searlesg_searles'))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT item, website, cost FROM upload WHERE username = '$username2'");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);


echo "<table><tr><td colspan=3><h1>" . ucfirst($username2) . "'s Christmas list</h1></td></tr><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
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
        if ($key == 1){ $acell = wordwrap($cell, 65, "<br />\n", true); 
                if (parse_url($cell, PHP_URL_SCHEME)){
                echo "<td style='border-top: thin dashed black;'><a href='$cell'>$acell</a></td>"; }
                	else{echo "<td style='border-top: thin dashed black;'>$acell</td>"; }}
                if ($key == 0){ echo "<td style='border-top: thin dashed black; width: 20%;'>$cell</td>"; }
                if ($key == 2){ echo "<td style='border-top: thin dashed black;'>$cell</td>"; }
    
	}
echo "</tr>\n";
}
mysql_free_result($result);


?>


</td>
</tr>
</table>




</body>
</html>
