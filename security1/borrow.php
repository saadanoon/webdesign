<style type="text/css">
body {
	background-color:#E9967A;
	font-family:Arial, Helvetica, sans-serif;
}
#don {
   border:3px double #996633;
   border-radius:10px;
   width:80%;
   text-align:center;
   background-color:#00FFFF;
}

.important {
    font-size:9px;
	text-align:left;
	margin-left:20px;
}

</style>

<body>
<?php
 session_start();
   include("db.php");
  include("user.php");
 $dbb=new PDO('mysql:host=localhost;dbname=library','root','');
  //$rep1=$dbb->query("select * from member where ID='".$_SESSION['user']['ID']."'");
  // $vrac1=$rep1->fetch();
  
  $rep=$dbb->query("select * from borrow where ID=" . $_SESSION['ID']);
  echo "<center><div id='don'>";
  $vrac=$rep->fetch();
    if($vrac==null){
	  $rep=$dbb->prepare("insert into borrow values (?,?,NOW(),DATE_ADD(NOW(),INTERVAL 7 DAY))");
	  if ($rep->execute(array($_SESSION['ID'],$_POST['hidisbn']))==true) {
	    $rep1=$dbb->query("select * from book where ISBN='" . $_POST['hidisbn'] . "'");
		$vrac1=$rep1->fetch();
	    echo '<h3>Receipt </h3>';
		echo '<p>Member : ' . $_SESSION['username']. '</p>';
		echo '<p>ID : ' . $_SESSION['ID'] . '</p>';
		echo '<p>Book : ' . $vrac1['Title'] . '</p>';
		echo '<p>Author : ' . $vrac1['Autor'] . '</p>';
		echo '<p>ISBN : ' . $vrac1['ISBN'] . '</p>';
		echo '<p><input type="button" value="Print" onclick="window.print();" />';
		echo '<input type="button" value="Go back" onclick="location.href=\'book2.php\'" /></p>';
		echo '<p class="important">Important : This receipt should be printed and given to the responsible of books in the library</p>';

	    $rep->closecursor();
	  }
		
   }else{
	  echo '<h3>You have already borrowed</h3>';
	  echo '<p>You have borrowed the book with ISBN ' . $vrac['ISBN'] . '</p>';
	  echo '<p>In ' . $vrac['dateborrow'] . '</p>';
	  echo '<p>You have to return it back in ' . $vrac['dateback'] . '</p>';
	  echo '<p><input type="button" value="Go back" onclick="location.href=\'book2.php\'" /></p>';
	  $rep->closecursor(); 
	}
	
	
    echo "</div></center>";
?>
</body>