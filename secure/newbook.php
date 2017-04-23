
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
$img=$_POST["image"];
$date=$_POST["Date"];
if(isset($_FILES['image']))
{
    $file=$_FILES['image']['type'];
}
if($file=="image/jpg" || $file== "image/gif" || $file=="image/png")

{
$con->insert($isbn,$title,$author,$field,$language,$resume,$file_type,$date);
//echo "successfull";
}
else{
    echo "error";
}
?>