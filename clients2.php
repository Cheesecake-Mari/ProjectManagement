<?php  include("consts2.php"); include("checklog2.php");?>
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
        <h2>Welcome!</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            
            ?>
        
        <h3>Please enter client details</h3>
        <br><br>

        <form action="" method="post">
        <label for="fname">First Name: </label><input type="text" id="firstname" name="firstname" ><br><br>
        <label for="lname">Last Name: </label><input type="text" id="lastname" name="lastname"><br><br>
        <label for="no">Phone number: </label><input type="text" id="phone" name="phone"><br><br>
        <tr>
                <td  ><label for="pname">Project Name: </label></td>
                <td>
                    <select name="project_name">
 
                    <?php 
                    
                    $sql = "select * from addproject";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row= mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $Projectname = $row['Projectname'];


                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $Projectname; ?></option>

                            <?php
                        }

                    }
                    else
                    {
                        ?>
                        <option value="1">No added categories</option>
                        <?php
                    }
                    
                    
                    ?>
                    </select>
                </td>
            </tr>
            <br>
            <br>
        <input type="submit" class="button4" style="background-color:#3ae4a3" name="submit"></input>
        </form>
        <br><br>

    </body>
    
</html>
<?php
if(isset($_POST["submit"]))
{
   
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $phone = $_POST['phone'];
   $project_name = $_POST['project_name'];
  

   $sql = "insert into clients set firstname = '$firstname', lastname = '$lastname' , phone = '$phone' , project_name = '$project_name'";
   $res = mysqli_query($conn, $sql);


   if($res == True)
   {
       $_SESSION['add'] = '<div class="sucess"> Client Added</div>';
       header('location:'.HOMEURL.'clients2.php');
   }
   else{

    $_SESSION['add'] = '<div class="error">Failed to add client</div>';
    header('location:'.HOMEURL.'clients2.php');
   }
}

?>