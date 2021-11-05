<!DOCTYPE html>
<html>
    <head>
    <style>
            body{ background-image: linear-gradient(rgb(5, 34, 61), rgb(32, 139, 139));text-align:center; background-color:rgb(52, 51, 58);}
            h1,h2{font-family:Verdana, Geneva, Tahoma, sans-serif;}
            a.button4{display:inline-block;padding:0.3em 1.2em;margin:0 0.1em 0.1em 0;
                border:0.16em solid rgba(255,255,255,0);
                border-radius:2em;box-sizing: border-box;text-decoration:none;font-family:'Roboto',sans-serif;
                font-weight:300;color:#FFFFFF;text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);text-align:center;
                transition: all 0.2s}
                a.button4:hover{border-color: rgba(255,255,255,1);}
                @media all and (max-width:30em){a.button4{display:block;margin:0.2em auto;}}       
        </style>
        <title>SeaShells Project Manager</title>
    </head>

<body>
<h1>SeaShells</h1>
        <h2>Delete Project</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>

        <label for="pno">Enter name of project to delete: </label> <input type="text" id="pno" name="pno"><br><br>
        <input type="Submit" class="button4" style="background-color:#6bf7c1">
        <br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tam";
$na= $_POST["name"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM addproject WHERE Projectname=$na";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
</body>
</html>