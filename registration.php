<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title> Registration </title>
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
</head>
<body>
<a  href="index.php">home</a>
<h2 class="head1"> Kindly fill the form </h2>
<div class="reg">
<form  id="myForm" action="newm.php" method="post">

FirstName:<input type="text" name="fname"><br> <br>
LastName:<input type="text" name="lname"><br> <br>
UserName:<input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
</div>
<div class="btn">
 <button id="sub">Save</button>
 
</div>
</form>
<span id="result"></span>
<script src="jquery-3.2.0.min.js" type="text/javascript"></script>
<script src="my_script.js" type="text/javascript"></script>
</body>
</html>