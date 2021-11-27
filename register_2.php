<?php  include("consts2.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
        <title>SeaShells Project Manager</title>
    </head>

    <body>
        <h1>SeaShells</h1>
        <h2>Welcome!</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>
        
        <h3>Please enter your details</h3>
        <br><br>

        <form action="" method="POST">
        <label for="fname">First Name: </label><input type="text" id="fname" name="firstname" ><br><br>
        <label for="lname">Last Name: </label><input type="text" id="lname" name="lastname"><br><br>
        <label for="no">Phone number: </label><input type="text" id="no" name="phno"><br><br>
        <label for="dob">Date of Birth: </label> <input type="date" id="dob" name="dob"><br><br>
        <label for="username">Username: </label> <input type="text"  id="usname" name="username"><br><br>
        <label for="password">Password: </label><input type="password" id="pwo"  name="password"><br><br>
        <label for="cpassword">Confirm Password: </label><input type="password" id="confim"  name="cpwo"><br>
        <input type="submit" class="button4" style="background-color:#3ae4a3" name="submit"></input>
        </form>
        <br><br>

    </body>
    <?php 


if(isset($_POST["submit"]))
{
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $dob = $_POST['dob'];
   $phno = $_POST['phno'];
   $username = $_POST["username"];
   $password = md5($_POST["password"]);

   $sql = "insert into registration set firstname = '$firstname', lastname = '$lastname', dob = '$dob' , phno = '$phno' , username = '$username', password = '$password'";
   $res = mysqli_query($conn, $sql);


   if($res == True)
   {
       $_SESSION['add'] = '<div class="sucess"> Admin Added</div>';
       header('location:'.HOMEURL.'projectManagement2.php');
   }
   else{

    $_SESSION['add'] = '<div class="error">Failed to add admin</div>';
    header('location:'.HOMEURL.'register_2.php');

   }
}

?>
</html>