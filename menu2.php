<?php  include("consts2.php"); ?>
    <!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
        <title>SeaShells Project Manager</title>
    </head>

    <body>
        <h2 style="color: azure;">Welcome</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100">
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }

        if(isset($_SESSION['add']))
        {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
        }
        ?>
        <br><br><br>
        <a href="addproj2.php" class="button4" style="background-color:#7ae6e0">Add Project</a><br><br>

        <a href="viewproj2.php" class="button4" style="background-color:#6ef5a6">Manage exsisting projects</a><br><br>

        <a href="clients2.php" class="button4" style="background-color:#30cfad">Add Clients</a><br><br>
        
        <a href="viewclients2.php" class="button4" style="background-color:#30cfad">Manage exsisting Clients</a><br><br>
    
      

    </body>
</html>