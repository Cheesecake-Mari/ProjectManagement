<?php  include("consts2.php"); 
include("checklog2.php");?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>SeaShells Project Manager</title>
    </head>
    <body>
        <div class="divbutton">
    <a href="menu2.php" class="myButton" style="background-color:#6ef5a6" >MENU</a>
    <a href="logout2.php" class="myButton" style="background-color:#6ef5a6" >LOGOUT</a><br><br>
        </div>
        <h1>SeaShells</h1>
        <h2>Add Project</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }


            
            ?>
        <form action="" method="post">
        <label for="Projectname">Project name : </label><input type="text" id="fname" name="Projectname"><br><br>
        <label for="Topic">Topic: </label><input type="text" id="lname" name="Topic"><br><br>
        <label for="Field">Field: </label> <input type="text" id="dob" name="Field"><br><br>
        <input type="Submit" class="button4" style="background-color:#3ae4a3" name="submit">
        </form>
    </body>
</html>
<?php

if(isset($_POST["submit"]))
{
   $Projectname = $_POST["Projectname"];
   $Topic = $_POST["Topic"];
   $Field = $_POST["Field"];
   

   $sql = "insert into addproject set Projectname = '$Projectname', Topic = '$Topic', Field = '$Field'";
   $res = mysqli_query($conn, $sql);


   if($res == True)
   {
       $_SESSION['add'] = '<div class="sucess"> Project Added</div>';
       header('location:'.HOMEURL.'addproj2.php');
   }
   else{

    $_SESSION['add'] = '<div class="error">Failed to add project</div>';
    header('location:'.HOMEURL.'addproj2.php');
   }
}

?>