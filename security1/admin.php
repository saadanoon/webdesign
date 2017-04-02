<html>
<head><link rel="stylesheet" type="text/css" href="CSS/style.css" /> 
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
echo "Welcome &nbsp";
echo $_SESSION['username'];

echo '<a class="reg2" href="logout.php">logout</a>';
 echo '<ul>'; 
 echo '<div class="topmenu">';
 echo  '<li><a href="./browse.php"><b>Browse books</b></a></li><br>';
  echo '<li><a href="./delete.php"><b>Delete a book</b></a></li><br>';
  echo '<li><a href="./addbook.php"><b>Add a book</b></a></li><br>';
  echo '<li><a href="./deluser.php"><b>Delete a user</b></a></li><br>';
  echo '<li><a href="./ajax.php"><b>Search user</b></a></li><br>';
echo '</div>';
  echo '</ul>';
 
 $timeout = 1200; // Number of seconds until it times out.
 
// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];

    if($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
         header("Location: logout.php");
    } 
} 
  
// Update the timout field with the current time.
$_SESSION['timeout'] = time();
}




?>

</body>
</html>
  