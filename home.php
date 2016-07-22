<?php
session_start();
if ($_POST['family_admin']) {$_SESSION['family_admin'] = $_POST['family_admin'];}
if ($_SESSION['username']){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/menu_style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Items to your Wish List</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

function disp_confirm2()
{
var r=confirm("Are you sure you want to delete your account?");
if (r==true)
  {
  alert("You have just deleted your account.");
  window.location.href("http://searlesgiftlist.duckdns.org/deleteusers2.php");
  }

}

function loadList()
{
var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("ListView").innerHTML = xmlhttp.responseText;
									}
						};
	xmlhttp.open("GET", "ajax.php?list=<?php echo $_SESSION['username']; ?>", true);
	xmlhttp.send();
	

}

function addItem()
{
var itemname = document.getElementById("itemname").value;
var website = document.getElementById("website").value;
var cost = document.getElementById("cost").value;
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("UploadAlert").innerHTML = xmlhttp.responseText;
                                                                        }
                                                };
        xmlhttp.open("GET", "upload2.php?username=<?php echo $_SESSION['username']; ?>&itemname=" + itemname + "&website=" + website + "&cost=" + cost, true);
        xmlhttp.send();


setTimeout(function(){
	$("#UploadAlert").show();
	}, 1000);

setTimeout(function(){
        $("#UploadAlert").hide();
        }, 3000);

loadList();
}

function delItem(id)
{
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("UploadAlert").innerHTML = xmlhttp.responseText;
                                                                        }
                                                };
        xmlhttp.open("GET", "delete.php?username=<?php echo $_SESSION['username']; ?>&id=" + id, true);
        xmlhttp.send();


	setTimeout(function()
	{
        	$("#UploadAlert").show();
        }, 1000);

	setTimeout(function()
	{
        	$("#UploadAlert").hide();
        }, 3000);

	loadList();
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
<!-- <div class="outer">	
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
-->
<?php include("menubar.php"); ?>

<table>

  <tr>
	<td>Add an item to your wishlist <br> <small> Logged in as 
	<?php echo $_SESSION['username']?> </small></td>
	<td colspan='2'><p>To share this list with someone, copy and paste the following URL:</p>
		<form name="urlstuff" action=""><input name="address" size="65" readonly
			value="http://searlesgiftlist.duckdns.org/list.php?list=<?php echo $_SESSION['username'] ?>" />
			</form>
  </tr> 

  <tr>
	<td>Item</td><td>Store/Website</td><td>Cost</td>
  </tr>
  <tr>
	<td><form method="post" action="upload2.php"><input type="text" id="itemname" size="35"></td>
	<td><input type="text" id="website" size="60"></td>
	<td><input type="text" id="cost" size="10"></form></td>
  </tr>
  <tr>
        <td colspan="3">
	<button id="showlist" onClick="loadList()">Show List</button>
	<button id="submititem" onClick="addItem()">Add Item</button></td>
  </tr>
</table>
<div id="ListView">


</div>

<div style="display: none; position: absolute; top: 50%; left: 50%; background-color: red; color: white; " id="UploadAlert">
<h1>Test</h1>
</div>
<?php
}
else {echo "you can't do that, you're not logged in!<br><a href='index.php'>Log in</a>";}
?>
</html>
