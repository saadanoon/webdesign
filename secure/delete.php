<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>delete a book </title>
<link rel="stylesheet" type="text/css" href="CSS/style.css?version=1" />
 </head>
<body>
<?php
session_start();
if(!isset($_SESSION["login"]))
{
echo "login first";
}
 else if($_SESSION["login"] == "YES")
{
echo '<a  href="admin.php">home</a>
<div class="del">
<form action="delbook.php"  method="post">

ISBN:  <input type="number" name="ISBN"><br><br>
</div>

<button class="btn6" type="submit" name="button"><strong>DELETE</strong></button>

</form>';
}
?>
</body>
</html>
