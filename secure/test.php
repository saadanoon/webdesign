<!DOCTYPE html>
<?php
function _e($string){

echo   htmlspecialchars($string,ENT_QUOTES,'UTF-8');
}
?>
<meta charset= 'UTF-8'>
<title>comment (xss)</title>
</head>
<body style="background-color:#E9967A;">

<h3> Post comment</h3>

<form action="test.php" method="POST">
<textarea name="content" rows= "3" cols="100" placeholder="write your comment here.."></textarea>
<br/>
<input type= "submit" value="post" /> </br> </br>
</form>



</body>
</html>




<?php


setcookie("username","admin",time()+3600);
setcookie("pasword","xss",time()+3600);
 echo '<input type="button" value="Go back" onclick="location.href=\'book2.php\'" /></br></br>';
if (isset($_POST["content"]))
	
{
	$fp= fopen('comments.txt','a');
	fwrite($fp,$_POST['content']."<hr/>");
	fclose($fp);
}
//echo nl2br (file_get_contents('comments.txt'));

_e(file_get_contents('comments.txt')); 
echo '</br>';

?>

