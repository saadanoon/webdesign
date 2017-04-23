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
<script src="jquery-3.2.0.min.js" type="text/javascript"></script>
<script>var unloaded = false;
$(window).on('beforeunload', unload);
$(window).on('unload', unload);  
function unload(){      
    if(!unloaded){
        $('body').css('cursor','wait');
        $.ajax({
            type: 'get',
            async: false,
            url: 'index.php',
            success:function(){ 
                unloaded = true; 
                $('body').css('cursor','default');
            },
            timeout: 5000
        });
    }
}
</script>
<?php
session_start();
ini_set('session.use_only_cookies', 0);
ini_set('session.cookie_lifetime', 0) ;
/*$now = time(); // Checking the time now when home page starts.
//echo".$now";

        if ($now > $_SESSION['expire'])
       {
           session_destroy();
          // echo "Your session has expired! <a href='http://localhost/security/index.php'><br/>Login here</a>";
 }*/
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
 
Search your favourite page here:</br> </br><input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form> </br>';



 
  include("down.php");
 
  
 echo " </div>";
}
 ?>
  
</body>
</html>
