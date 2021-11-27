<?php

$con=mysqli_connect("localhost","root","","tam");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM addproject");

echo "<table align= center border='1' style=\"border: 1px; top:15px; left: 10px; background-color: cornsilk\">
<tr>
<th>Project Name</th>
<th>Topic</th>
<th>Field</th>
</tr>";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['Projectname'] . "</td>";
echo "<td>" . $row['Topic'] . "</td>";
echo "<td>" . $row['Field'] . "</td>";
echo "</tr>";
}
echo "</table>";

/*while($row = mysqli_fetch_array($result))
{

echo "<table > 
<tr>
<td>" . $row['Projectname'] . "</td>
<td>" . $row['Topic'] . "</td>
<td>" . $row['Field'] . "</td>
</tr>
</table>";
}*/


mysqli_close($con);
?>-->




<?php  include("consts2.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title style="color: white;">SeaShells Project Manager</title>
    </head>

<body style="color: white;">
<h1>SeaShells</h1>
        <h2>Delete Project</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>

        <form action="delete.php" method="post">
        <label for="pno">Enter name of project to delete: </label> <input type="text" id="pno" name="nam"><br><br>
        <input type="submit" class="button4" style="background-color:#3ae4a3" name="del"></input>
        </form>
        <br><br>
</body>
</html>