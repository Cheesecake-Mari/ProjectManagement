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
    else{
        $stmt = $conn->prepare("insert into registration(firstName, lastname, dob, phno,uname,pass) values(?,?,?,?,?,?)");
        $stmt->bind_param("sssiss", $firstname,$lastname,$dob,$number,$username,$password);
        $stmt->execute();
        echo "Registration Sucessful";
        $stmt->close();
        $conn->close();
    }

?>



