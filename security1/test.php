<!DOCTYPE html>
<meta charset= 'UTF-8'>
<title>comment (xss)</title>
</head>
<body>

<h3> Post comment</h3>

<form action="test.php" method="POST">
<textarea name="content" rows= "3" cols="100"></textarea>
<br/>
<input type= "submit" value="post" /> </br> </br> </br>

</form>

<?php

setcookie("sername","admin",time()+3600);
setcookie("pasword","xss",time()+3600);
echo '<input type="button" value="Go back" onclick="location.href=\'book2.php\'" />.</br>';
if ($_POST["content"]!=null)
	
{
	$fp= fopen('comments.txt','a');
	fwrite($fp,$_POST["content"]."<hr/>");
	fclose($fp);
}
echo nl2br (file_get_contents('comments.txt'));
?>


</body>
</html>