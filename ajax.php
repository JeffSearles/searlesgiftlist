<?php 
$username2 = $_GET["list"];

include("../private/dbinfo.php");
mysql_connect($hostname, $username, $password)
        or die("Unable to connect to MySQL");


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
    foreach($row as $key => $cell)
    {
       if ($key == 1)
       {
       		$acell = wordwrap($cell, 50, "<br />\n", true);
                if (parse_url($cell, PHP_URL_SCHEME))
		{
                        echo "<td style='border-top: thin dashed black;'><a href='$cell'>$acell</a></td>";
		}
                else
		{
			echo "<td style='border-top: thin dashed black;'>$acell</td>"; 
		}
	}

        if ($key == 0 || $key == 2)
	{
		echo "<td style='border-top: thin dashed black;'>$cell</td>";
	}
        if ($key == 3)
	{
		echo "<td style='border-top: thin dashed black'><input type='button'
        	onclick='delItem($cell)' value='delete'>";
    		echo "</tr>\n";
    	}
     }
}

mysql_free_result($result);

//}
?>
</form>


</td>
</tr>
</table>

