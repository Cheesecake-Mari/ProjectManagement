<?php
 include("consts.php");

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from admin where username='$username' and password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $_SESSION['login'] = "<div class='sucess'>Login Sucessful</div>";

        $_SESSION['user'] = $username; //checki user is logged in,unset by logout!

        header('location:'.HOMEURL.'menu.html');
    }
    else{
        $_SESSION['login'] = "<div class='error text-center'>Login failed, Try again</div>";
        header('location:'.HOMEURL.'projectManager.html');

    }
}
?>