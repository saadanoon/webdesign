<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>


<title>add a book </title>
<link rel="stylesheet" type="text/css" href="CSS/style.css?version=21" />
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
<div class="add">
<form action="newbook.php" method="post">

ISBN: &nbsp &nbsp   <input type="number" name="ISBN"><br> <br>
Title: &nbsp &nbsp &nbsp  <input type="text" name="Title"><br> <br>
Author:&nbsp &nbsp <input type="text" name="Author"><br><br>
Field: &nbsp &nbsp &nbsp <input type="text" name="Field"><br><br>
Language:<input type="text" name="Language"><br><br>
Resume:&nbsp &nbsp<input type="text" name="Resume"><br><br>
Image: &nbsp &nbsp  <input type="file" name="Image"><br><br>
Date: &nbsp &nbsp &nbsp  <input type="date" name="Date"><br><br>
</div>
<div class="btn4">
<input type="submit">
</div>
</form>';
}
?>
</body>
</html>