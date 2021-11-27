<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tam";
$na= $_POST["nam"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  

// sql to delete a record
$sql = ("DELETE FROM addproject where Projectname = '".$na."'");

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?>
