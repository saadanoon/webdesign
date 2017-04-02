<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
include 'book_db.php';
$con=new DB_con();
$isbn=$_POST["ISBN"];
$con->delete($isbn);
?>