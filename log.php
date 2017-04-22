<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
include 'user.php';
$name=$_GET["username"]; 
$password=Md5($_GET["pwd"]);
$con=new users();
$con->login($name,$password);

?>


