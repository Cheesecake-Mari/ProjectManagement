<?php
require_once "config.php";

    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
    

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $firstname = $_POST['fna'];
    $lastname = $_POST['lna'];
    $dob = $_POST['dob'];
    $number = $_POST['no'];

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM registration WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
   /* $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong, unable to redirect! :( ";
        }
    }
    mysqli_stmt_close($stmt);*/
        $stmt = $conn->prepare("insert into registration(firstName, lastname, dob, phno ,username,password) values(?,?,?,?,?,?)");
        $stmt->bind_param("sssiss", $firstname,$lastname,$dob,$number,$param_username,$param_password);
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_execute($stmt))
        {
            header("location: projectManagement.html");
        }
        else{
            echo "Something went wrong, unable to redirect! :( ";
        }
        $stmt->close();
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            body{background-image: linear-gradient(rgb(5, 34, 61), rgb(32, 139, 139)); text-align:center; background-color:rgb(52, 51, 58);}
            h1,h2,h3{font-family:Verdana, Geneva, Tahoma, sans-serif; color: azure;}
            input.button4{display:inline-block;padding:0.3em 1.2em;margin:0 0.1em 0.1em 0;
                border:0.16em solid rgba(255,255,255,0);
                border-radius:2em;box-sizing: border-box;text-decoration:none;font-family:'Roboto',sans-serif;
                font-weight:300;color:#FFFFFF;text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);text-align:center;
                transition: all 0.2s}
                a.button4:hover{border-color: rgba(255,255,255,1);}
                @media all and (max-width:30em){a.button4{display:block;margin:0.2em auto;}}  
            label,p{color: cornsilk; font-family: monospace; font-size: larger;}
        </style>
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

        <form action="" method="post">
        <label for="fname">First Name: </label><input type="text" id="fname" name="fna" ><br><br>
        <label for="lname">Last Name: </label><input type="text" id="lname" name="lna"><br><br>
        <label for="no">Phone number: </label><input type="text" id="no" name="no"><br><br>
        <label for="dob">Date of Birth: </label> <input type="date" id="dob" name="dob"><br><br>
        <label for="uname">Username: </label> <input type="text"  id="usname" name="username"><br><br>
        <label for="pword">Password: </label><input type="password" id="pwo"  name="password"><br><br>
        <label for="cpword">Confirmn Password: </label><input type="password" id="cpwo"  name="confrim_password"><br><br>
        <input type="submit" class="button4" style="background-color:#3ae4a3" name="reg"></input>
        </form>
        <br><br>

    </body>
    
</html>