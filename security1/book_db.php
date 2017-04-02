<link rel="stylesheet" type="text/css" href="CSS/style.css" />

<?php
include 'connectdb.php';
class DB_con
{
public function insert($isbn,$title,$author,$field,$language,$resume,$img,$date)
{
global $mysqli;
$res=$mysqli->query("INSERT into book(ISBN,Title,Autor,Field,Language,Resume,Image,Addingdate) values ('$isbn','$title','$author','$field','$language','$resume','$img','$date')");

echo "<script> alert('successfull');
window.location='addbook.php';
 </script>";
 $mysqli->close();
}


public function display()
{
global $mysqli;
$res = $mysqli->query("SELECT Image,ISBN, Title FROM book");
return $res;
$mysqli->close();
}


public function delete($isbn)
{
global $mysqli;

$mysqli->query("DELETE FROM book WHERE ISBN=$isbn");

echo "<script> alert('Deleted successfully');
window.location='delete.php';
 </script>";

$mysqli->close();
}

}
?>