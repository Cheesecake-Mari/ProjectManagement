<?php
        
        $C_fname = $_POST['fna'];
        $C_lname = $_POST['lna'];
        $phno = $_POST['no'];
        $proname = $_POST['pna'];
      
    
        $conn = new mysqli('localhost', 'root', '', 'tam');
        if($conn->connect_error)
        {
            die('Connection Failed: '.$conn->connect_error);
        }
        else{
            $stmt = $conn->prepare("insert into clients (firstname, lastname, phone, project_name) values(?,?,?,?)");
            $stmt->bind_param("ssis", $C_fname,$C_lname,$phno, $proname);
            $stmt->execute();
            echo "Client Added Sucessfully";
            $stmt->close();
            $conn->close();
        }
    
    ?>
            
        </body>
    </html>
    
    