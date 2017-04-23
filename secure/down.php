<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
 <div id="laune">
 <fieldset id="une">
 <legend>Recommended book</legend>
  <?php
  $rep=$bdd->query('select * from book where Addingdate=(select max(Addingdate) from book) LIMIT 0,1;');
  while ($vrac = $rep->fetch()){
   echo '<p> <img src="./books/' . $vrac['Image'] . '"' . 'width="150px" height="200px" /> </p>';
   echo '<p><b> ISBN : </b>' . $vrac['ISBN'] . '</p>';
   echo '<p><b> Title : </b>' . $vrac['Title'] . '</p>';
   echo '<p><b> Author : </b>' . $vrac['Autor'] . '</p>';
   echo '<p><b> Description : </b>' . $vrac['Resume'] . '</p>';
 }
  $rep->closeCursor();
  ?> 
  
  
  </fieldset>
 </div>
  <form method="post" action="book2.php">
   <table>
    
    <tr>
      <td align="right" colspan="2"> Search your desired books <input type="submit" value="Search" /> </td>
    </tr>
   </table>
   </form>
  <form method="post" action="logout.php">
   <table>
    
    <tr>
      <td align="right" colspan="2"> logout from here <input type="submit" value="Logout" /> </td>
    </tr>
   </table>
   </form>
   
     
 
  
 <div id="pied">
   <p>     ---Copy rights  2017/2018---
 </p>
 </div>