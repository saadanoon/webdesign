<?php
$con=mysqli_connect("localhost", "root", "") or die (mysqli_error());
$mysqli = new mysqli('localhost','root',"",'library');
//mysqli_select_db($con,'online') or die(mysqli_error($con));
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
