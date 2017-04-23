<?php
  // include("log.php");
  session_start();
  $dbb=new PDO('mysql:host=localhost;dbname=library','root','');
  $rep=$dbb->query("select ID,firstname,lastname,username,password,function from member where username='sara2' and password='sara23'");
  $vrac=$rep->fetch();
  if(!$vrac==null){
    $_SESSION['user']=$vrac;
  }
  // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
  