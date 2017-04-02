<?php
session_start();
if(isset($_SESSION["login"]))
{

echo "hello";
echo $_SESSION['username'];
echo $_SESSION["ID"];
}
?>