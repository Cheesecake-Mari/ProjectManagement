<?php  include("consts2.php"); ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="styles.css">

        <title>SeaShells Project Manager</title>
    </head>

    <body>
        <h1>SeaShells</h1>
        <h2>Managing your projects with ease</h2>
        <br><br>
     
        <img src="clip.png" width="300" 
        height="300">
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }

            if(isset($_SESSION['nologin']))
            {
                echo $_SESSION['nologin'];
                unset ($_SESSION['nologin']);
            }
            




            
            ?>
            <br><br>
        
        <h3>LOGIN</h3>
        <br><br>
        <form action="" method="post">
        <label for="uname">Username: </label> <input type="text" id="usname" name="username"><br><br>
        <label for="pword">Password: </label><input type="password" id="pwo" name="password"><br><br>
        <input type="submit" class="button4" style="background-color:#3ae4a3" name="submit"></input>
        </form>
        <br><br>
        <p style="font-family:cursive ; font-style: italic;">Not registered yet? Make an account!</p>
        <a href="register_2.php" class="button4" style="background-color:#6ef5a6" >Register</a><br><br>

    </body>
</html>

<?php


if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from registration where username='$username' and password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $_SESSION['login'] = "<div class='sucess'>Login Sucessful</div>";

        $_SESSION['user'] = $username; //checki user is logged in,unset by logout!

        header('location:'.HOMEURL.'menu2.php');
    }
    else{
        $_SESSION['login'] = "<div class='error text-center'>Login failed, Try again</div>";
        header('location:'.HOMEURL.'projectManagement2.php');

    }
}
?>
