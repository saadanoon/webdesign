<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
include 'user.php';
$con=new users();
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$uname=$_POST["username"];
$password=$_POST["password"];
$con->registration($fname,$lname,$uname,$password,'0');
?>

