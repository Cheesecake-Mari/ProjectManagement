<!DOCTYPE html>
<html>
    <head>
        <style>
            body{background-image: linear-gradient(rgb(5, 34, 61), rgb(32, 139, 139)); text-align:center; background-color:rgb(52, 51, 58);}
            h1,h2,h3{font-family:Verdana, Geneva, Tahoma, sans-serif; color: azure;}
            input.button4{display:inline-block;padding:0.3em 1.2em;margin:0 0.1em 0.1em 0;
                border:0.16em solid rgba(255,255,255,0);
                border-radius:2em;box-sizing: border-box;text-decoration:none;font-family:'Roboto',sans-serif;
                font-weight:300;color:#FFFFFF;text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);text-align:center;
                transition: all 0.2s}
                input.button4:hover{border-color: rgba(255,255,255,1);}
                @media all and (max-width:30em){a.button4{display:block;margin:0.2em auto;}}  
            label,p{color: cornsilk; font-family: monospace; font-size: larger;}
        </style>
        <title>SeaShells Project Manager</title>
    </head>
    <body>
        <h1>SeaShells</h1>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br><br>

        <?php
        
    $Projectname = $_POST['pna'];
    $topic = $_POST['tna'];
    $field = $_POST['fee'];
  

    $conn = new mysqli('localhost', 'root', '', 'tam');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into addproject(Projectname, topic, field) values(?,?,?)");
        $stmt->bind_param("sss", $Projectname,$topic,$field);
        $stmt->execute();
        echo "Project Created Sucessfully";
        $stmt->close();
        $conn->close();
    }

?>
        
    </body>
</html>

