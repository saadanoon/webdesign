<html>
<head>

<title>books</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
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

include 'book_db.php';
$con=new DB_con();

$res=$con->display();
echo '<a  href="admin.php">home</a>';

while($row=mysqli_fetch_row($res))
{
    echo "<br>";
echo "&nbsp &nbsp &nbsp";
$img= $row[0];
echo '<img src="books/'.$img.'" height="100px" width="100px"/>';
echo "<br>";
echo $row[1];
echo "&nbsp &nbsp";
echo $row[2];
echo "<br><br><br>";
}
// Number of seconds until it times out.
 
// Check if the timeout field exists.

}
?>
</body>
</html>