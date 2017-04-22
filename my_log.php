<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="library"; // Database name 
$tbl_name="my_log"; // Table name 

 $db=mysql_connect("$host", "$username", "$password"); 
if(!$db)
{

  // Handle error
  echo "<p>Unable to connect to database</p>";
}
 mysql_select_db("$db_name")or die("cannot select DB");

function write_mysql_log($message, $db)
{
  // Check database connection
  if( ($db instanceof MySQL) == false) {
    return array(status => false, message => 'MySQL connection is invalid');
  }
 
  // Check message
  if($message == '') {
    return array(status => false, message => 'Message is empty');
  }
 
  // Get IP address
  if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }
 
  // Get requested script
  if( ($request_uri = $_SERVER['REQUEST_URI']) == '') {
    $request_uri = "REQUEST_URI_UNKNOWN";
  }
 
  // Escape values
  $message     = $db->escape_string($message);
  $remote_addr = $db->escape_string($remote_addr);
  $request_uri = $db->escape_string($request_uri);
 
  // Construct query
  $sql = "INSERT INTO my_log (remote_addr, request_uri, message) VALUES('$remote_addr', '$request_uri','$message')";
 
  // Execute query and save data
  $result = $db->query($sql);
 
  if($result) {
    return array(status => true);  
  }
  else {
    return array(status => false, message => 'Unable to write to the database');
  }
$something_happened = rand(0,1);
 
if($something_happened == 1) {
  write_mysql_log("Something happened!", $db);
}
}
?>