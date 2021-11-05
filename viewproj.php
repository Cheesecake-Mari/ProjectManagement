<!DOCTYPE html>
<html>
    <head>
        <style>
            body{background-image: linear-gradient(rgb(5, 34, 61), rgb(32, 139, 139)); text-align:center; background-color:rgb(52, 51, 58);}
            h1,h2,h3{font-family:Verdana, Geneva, Tahoma, sans-serif; color: azure;}
            a.button4{display:inline-block;padding:0.3em 1.2em;margin:0 0.1em 0.1em 0;
                border:0.16em solid rgba(255,255,255,0);
                border-radius:2em;box-sizing: border-box;text-decoration:none;font-family:'Roboto',sans-serif;
                font-weight:300;color:#FFFFFF;text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);text-align:center;
                transition: all 0.2s}
                a.button4:hover{border-color: rgba(255,255,255,1);}
                @media all and (max-width:30em){a.button4{display:block;margin:0.2em auto;}}  
            label,p{color: cornsilk; font-family: monospace;font-size: larger;}
        </style>
        <title>SeaShells Project Manager</title>
    </head>

    <body>
        <h1>SeaShells</h1>
        <h2>Managing your projects with ease</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br>
        
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
?>
        
    </body>
</html>
