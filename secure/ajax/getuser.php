<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$conn = new mysqli("localhost","root", "", "library");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM member WHERE id = '".$q."'";
$result = $conn->query($sql);

echo "<table>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>Function</th>

</tr>";
 while($row = $result->fetch_assoc()) {
//while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['function'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
$conn->close();
?>
</body>
</html>