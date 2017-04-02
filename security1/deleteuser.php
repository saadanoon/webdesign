<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
include 'user.php';
$con=new users();

$username=$_POST["username"];
$con->delete_user($username);

?>