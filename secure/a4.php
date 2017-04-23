<html>
<head>
<title> profile </title>
<body>
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<?php
$mysqli = new mysqli("localhost", "root", "", "library");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$id = $_GET['id'];

/* create a prepared statement */



if ($stmt = $mysqli->prepare("SELECT * FROM member WHERE ID=?")) {

    /* bind parameters for markers */
	
    $stmt->bind_param("i", $id);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    //$stmt->bind_result($firstname);

    /* fetch value */
   // $stmt->fetch();
   
   $result = $stmt->get_result();
   
   echo "<table>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>Function</th>
<th>Password</th>

</tr>";
 while($row = $result->fetch_assoc()) {
//while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['function'] . "</td>";
     echo "<td>" . $row['password'] . "</td>";
    echo "</tr>";
}
echo "</table>";
//while ($row = $result->fetch_assoc()) {
    // do something with $row
//}

   // printf(" the firstname of %s is %s\n", $user, $firstname);

    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();
?>
</body>
</html>