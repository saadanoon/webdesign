<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />

<title>Online library</title>

</head>
<body style="background-color:#E9967A;">

<?php
 //include("./include/base-donnee-poo.php"); 
$bdd=new PDO('mysql:host=localhost;dbname=library','root','');?>


<body> 
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

  
<div id="corps">
     <div id="category">
       <fieldset>
         <legend>Categories</legend>
         <form action="book2.php" method="post">
         <table>
         <tr>
         <td>
         <label for="langue">Language :</label>
         </td>
         <td>
         <select name="langue" id="langue">
          <option value="French" <?php if(isset($_POST['langue']) && $_POST['langue']=='Frenchs') echo 'selected'; ?>>French</option>
          <option value="English" <?php if(isset($_POST['langue']) && $_POST['langue']=='English') echo 'selected'; ?>>English</option>
          </select></td>
          </tr>
          <tr>
          <td>
          <label for="domaine">Field :</label></td>
          <td>
           <select name="domaine" id="domaine">
            <option value="computer engineering" <?php if(isset($_POST['domaine']) && $_POST['domaine']=='computer engineering') echo 'selected'; ?>>Computer engineering</option>
            <option value="Science" <?php if(isset($_POST['domaine']) && $_POST['domaine']=='Science') echo 'selected'; ?>>Science</option>
            <option value="Art" <?php if(isset($_POST['domaine']) && $_POST['domaine']=='Art') echo 'selected'; ?>>Art</option>
            <option value="History" <?php if(isset($_POST['domaine']) && $_POST['domaine']=='History') echo 'selected'; ?>>History</option>
           </select></td>
           </tr>
           <tr>
           <td colspan="2" align="right"><input type="submit" value="submit" name="validate" /></td>
           </tr>
           </table>
           </form>
       </fieldset>
     </div>

     <div id="search">
      <fieldset>
        <legend>Search</legend>
        <form action="book2.php" method="post">
          <table>
            <tr>
             <td colspan="2">Search by:</td>
            </tr>
            <tr>
              <td><input type="checkbox" id="chktitre" name="chktitre" <?php if(isset($_POST['chktitre'])) echo 'checked'; ?> /><label for="chktitre">Title</label></td>
              <td><input type="checkbox" id="chkauth" name="chkauth" <?php if(isset($_POST['chkauth'])) echo 'checked'; ?> /><label for="chkauth">Author</label></td>
            </tr>
            <tr>
             <td colspan="2"><input type="text" name="txtchrch" onkeyup="showHint(this.value)" <?php if(isset($_POST['txtchrch'])) echo "value='" . $_POST['txtchrch'] . "'" ; ?> /></td>
			 <td> <p> Suggestions: <span id="txtHint"></span></p></td>
            </tr>
            <tr>
             <td colspan="2" align="right"><input type="submit" value="search" name="search" /></td>
			
            </tr>
          </table>
          </form>
      </fieldset>
     </div>
    
    <div id="catalogue">
      <?php
	   if(isset($_POST['langue']) && isset($_POST['domaine']))
		   $cond = "where Language='$_POST[langue]' and Field='$_POST[domaine]'";
	   else $cond = "where Language like '%' and Field like '%'";
	   if(isset($_POST['txtchrch'])){
	    if(isset($_POST['chktitre'])) $cond .= " and title like '%" . $_POST['txtchrch'] . "%'";
		if(isset($_POST['chkauth'])) $cond .= " and Autor like '%" . $_POST['txtchrch'] . "%'";
	   }
		  
	   if(isset($_GET['page'])) $page=$_GET['page'];
	   else $page=1;
	  $count=($page-1)*10;
	   $rep=$bdd->query("select count(*) from book $cond");
	   $vrac=$rep->fetch();
	   $rep->closeCursor();
	  $total=$vrac[0];
	   $total=ceil($total/20);
	  echo "<table><caption>";
	   for($i=1;$i<=$total;$i++)
	  echo '<a href="book2.php?page=' . $i . '" />' . "$i </a>";
	   echo '</caption><tr height="90%">';
	   $rep=$bdd->query("select book.ISBN, Title,Autor,Image,Resume,ID,dateborrow,dateback from book left join borrow on book.ISBN=borrow.ISBN $cond LIMIT $count, 10");
	   while($vrac=$rep->fetch()){
			echo '<td width="80%" rowspan="2"><img id="topimg" src=./books/' . $vrac['Image'] . ' " />';
			echo "<p><b> Title : </b> $vrac[Title] </p>";
			echo "<p><b> Author : </b> $vrac[Autor] </p>";
			echo "<div id='resum'><p> $vrac[Resume] </p></div></td>";
			if ($vrac['ID']==null) echo '<td><p>Available</p><br/><br/><br/><br/></td></tr><tr><td><form name="pretfrm" method="post" action="borrow.php"><input type="hidden" name="hidisbn" value="' . $vrac['ISBN'] . '" /><input type="submit" value="Borrow" name="btnbrrow"  onclick=" submit();"  /></form></td></tr>';
			else echo "<td><p>Borrowed in <br/>$vrac[dateborrow]</p><p>Will be returned back in <br/> $vrac[dateback]</p></td></tr><tr><td><input type='button' value='borrow' disabled/></td></tr>";
	   };
	   echo "</table>";
	   $rep->closeCursor();
	?>
    </div>
  </div>
  <form method="post" action="logout.php">
   <table>
    
    <tr>
      <td align="right" colspan="2"> logout from here <input type="submit" value="Logout" /> </td>
	  <td> <a href="./ajax/pollvote.php"> Before you log out vote for our online library</a></td>
	   
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
		<td>                    </td>
	  <td> <a href="test.php"> or leave a comment here </a></td>
	  </tr>
   
   </table>
   </form>
  
</body>
</html>
