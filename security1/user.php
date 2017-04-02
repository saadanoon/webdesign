<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
include 'connectdb.php';
class users
{

public function delete_user($username)
{
global $mysqli;
$mysqli->query("DELETE FROM member WHERE username='$username'");

   echo "<script> alert('deleted successfully');
window.location='deluser.php';
 </script>";

$mysqli->close();
}



 function login($username, $password) {
global $mysqli;
$rs = $mysqli->query("SELECT ID, username, password, function FROM member WHERE username='$username' AND password='$password' AND function='0'");
$rsd = $mysqli->query("SELECT username, password, function FROM member WHERE username='$username' AND password='$password' AND function='1'");
//$row=mysqli_fetch_array($rs);
if(mysqli_num_rows($rs)>0)
	
{
	
	while($row=mysqli_fetch_array($rs))
{
	$var=$row['ID'];
	

}




session_start();
$_SESSION["login"] = "YES";

$_SESSION["ID"]=$var;
$session_id=session_id();
$_SESSION["username"] = $username;
header("Location: home.php");
}


else if(mysqli_num_rows($rsd)>0)
{
session_start();
$session_id=session_id();
$_SESSION["login"] = "YES";
$_SESSION["username"] = $username;
header("Location: admin.php?session_id=".$session_id);
}
else {
session_start();
$_SESSION['login'] = "NO";

echo "<script> alert('wrong username and password');
window.location='first.php';
 </script>";

}


$mysqli->close();
}


function registration($fname,$lname,$uname,$password,$function)
{
global $mysqli;
$check = $mysqli->query("SELECT username FROM member WHERE username='$uname'");
 if (mysqli_num_rows($check)!= 0)
  {
echo "<script> alert('username already exist');
window.location='registration.php';
 </script>";
  }
else if($fname!=''&& $uname!='' && $password!='')
{
global $mysqli;
$query=$mysqli->query("insert into member(firstname,lastname,username,password,function) values ('$fname','$lname','$uname','$password','0')");
echo "<script> alert('registration successfull. Go to home for login');
window.location='registration.php';
 </script>";
}
else
{
echo "<script> alert('Fill all important fields');
window.location='registration.php';
 </script>";
}
$mysqli->close();
}
}
?>

