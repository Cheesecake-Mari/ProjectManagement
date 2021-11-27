<?php
        ob_start();
    $username = $_POST['una'];
    $password = $_POST['pwo'];

    $conn = new mysqli('localhost', 'root', '', 'tam');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $username = $password =  "";
        $err = "";
        
        if(empty(trim($_POST['una'])) || empty(trim($_POST['pwo'])))
        {
            $err = "Please enter username + password";
        }
        else{
            $username = trim($_POST['una']);
            $password = trim($_POST['pwo']);
        }
        if(empty($err))
{
    $sql = "SELECT id, username, password FROM registration WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["una"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page  header("Location: menu.html");
                            header("Location: menu.html");
                            
                            
                            
                        }
                       else{ echo("You cannot log in right now, Try again");}
                    }

                }

    }
}    


}


?>



