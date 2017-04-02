
<link rel="stylesheet" type="text/css" href="CSS/style.css" /> 
<?php
include 'book_db.php';

$con=new DB_con();
$isbn=$_POST["ISBN"];
$title=$_POST["Title"];
$author=$_POST["Author"];
$field=$_POST["Field"];
$language=$_POST["Language"];
$resume=$_POST["Resume"];
$img=$_POST["Image"];
$date=$_POST["Date"];
$con->insert($isbn,$title,$author,$field,$language,$resume,$img,$date);
echo "successfull";
?>