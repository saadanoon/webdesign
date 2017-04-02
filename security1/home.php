<?php //session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />

<title>Online library</title>

</head>

<?php  include("db.php");


 ?>
 <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","getlivesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<body style="background-color:#E9967A;">
<?php
session_start();
if(!isset($_SESSION["login"]))
{ echo " login first please!";
}
else if(isset($_SESSION["login"]))
{
	echo  "Welcome ".$_SESSION["username"];
	$v=$_SESSION["ID"];
  echo '<div id="txt">
 <fieldset>
 <legend>&nbsp;<b>Home </b>&nbsp;</legend>
 
  <h2>Welcome to our online library!</h2>
  <p>
   The content of this website is adapted to the needs of members.
  </p>
   <p>
   The purpose of this online library is to get access to the library online and be able to borrow books availables.
   </p>
  <p>
   Also,the staff of the library will be able now to carry out all operations of lending and returning books remotely..</fieldset>
  </p>
  <form>
 <a href="a4.php?id=5">Check your profile here</a></br>
Search your favourite page here:</br> </br><input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form> </br>';



 
  include("down.php");
 
  
 echo " </div>";
}
 ?>
  
</body>
</html>
