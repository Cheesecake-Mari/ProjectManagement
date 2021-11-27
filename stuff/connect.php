<?php
            

    $firstname = $_POST['fna'];
    $lastname = $_POST['lna'];
    $dob = $_POST['dob'];
    $number = $_POST['no'];
    $username = $_POST['una'];
    $password = $_POST['pwo'];

    $conn = new mysqli('localhost', 'root', '', 'tam');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{$username = $password = $confirm_password = "";
        $username_err = $password_err = $confirm_password_err = "";
        
            // Check if username is empty
            if(empty(trim($_POST["una"]))){
                $username_err = "Username cannot be blank";
            }
            else{
                $sql = "SELECT id FROM registration WHERE username = ?";
                $stmt = mysqli_prepare($conn, $sql);
                if($stmt)
                {
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    
        
                    // Set the value of param username
                    $param_username = trim($_POST['una']);

        
                    // Try to execute this statement
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1)
                        {
                            $username_err = "This username is already taken"; 
                        }
                        else{
                            $username = trim($_POST['una']);
                        }
                    }
                    else{
                        echo "Something went wrong";
                    }
                }
            }
        
            mysqli_stmt_close($stmt);
        
        
        // Check for password
        if(empty(trim($_POST['pwo']))){
            $password_err = "Password cannot be blank";
        }
        elseif(strlen(trim($_POST['pwo'])) < 5){
            $password_err = "Password cannot be less than 5 characters";
        }
        else{
            $password = trim($_POST['pwo']);
        }
        
        // Check for confirm password field
        if(trim($_POST['pwo']) !=  trim($_POST['cpwo'])){
            $password_err = "Passwords should match";
        }

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("insert into registration(firstName, lastname, dob, phno,username,password) values(?,?,?,?,?,?)");
        $stmt->bind_param("sssiss", $firstname,$lastname,$dob,$number,$param_username,$param_password);
        $stmt->execute();
        echo "Registration Sucessful";
        $stmt->close();
        $conn->close();
        
    }
    else{
        echo($password_err);
        echo($username_err);
    }
    }

?>



