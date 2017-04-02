<?php
   $con=mysqli_connect("localhost", "root", "") or die (mysqli_error());
mysqli_select_db($con,'library') or die(mysqli_error($con));
 
 $title=$_POST["title"];
 
  
 $result=mysqli_query($con,"SELECT * FROM member where firstname like '%$title%'");
 $found=mysqli_num_rows($result);
 
 if($found>0){
    while($row=mysqli_fetch_array($result)){
    echo "<li>username=$row[username]</br>";
    echo "<li>firstname=$row[firstname]</br>";
    echo "<li>lastname=$row[lastname]</br>";
echo "</br>";
           
    }   
 }else{
    echo "<li>No username Found</li>";
 }
 // ajax search
?>
