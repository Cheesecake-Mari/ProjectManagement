<?php  include("consts2.php"); include("checklog2.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
        <title>SeaShells Project Manager</title>
    </head>

    <body>
    <div class="divbutton">
    <a href="menu2.php" class="myButton" style="background-color:#6ef5a6" >MENU</a>
    <a href="logout2.php" class="myButton" style="background-color:#6ef5a6" >LOGOUT</a><br><br>
        </div>
        <h1>SeaShells</h1>
        <h2>Managing your projects with ease</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br>
        <?php
        if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
        <?php
        if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
?>
<br><br>
        <div class="table-div" > 

        <table class="table-full" align="center">
                    <tr>
                        <th>  Srno  </th>
                        <br>
                        <th>  First Name  </th>
                        <br>
                        <th>  Last Name  </th>
                        <br>
                        <th>  Phone number  </th>
                        <br>
                        <th>  Project ID </th>
                        <br>
                        <th>  Alter  </th>
                    </tr>

                    <?php
                    $sql = "select * from clients";
                    $res = mysqli_query($conn, $sql);
                    $no = 1;

                    if($res == True)
                    {
                        $rows = mysqli_num_rows($res);
                        if($rows>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $firstname = $rows["firstname"];
                                $lastname = $rows["lastname"];
                                $phone = $rows['phone'];
                                $project_name = $rows['project_name'];

                                ?>
                                <tr>
                        <td><?php echo $no ?></td>
                        <br>
                        <td><?php echo  $firstname ?></td>
                        <br>
                        <td><?php echo $lastname ?></td>
                        <br>
                        <td><?php echo $phone ?></td>
                        <br>
                        <td><?php echo $project_name ?></td>
                        <br>
                        <td>    
                        <a class="myButton2" href="<?php echo HOMEURL;?>updateclients2.php?id=<?php echo $id ?>" class ="btn-secondary">  Update  </a><br>
                        <a class="myButton2" href="<?php echo HOMEURL;?>deleteclients2.php?id=<?php echo $id ?>" class ="btn-ter"> Delete  </a>
                        </td>
                        <br><br>
                    </tr>


                                <?php
                                $no += 1;
                            }
                        }
                    }
                    else
                    {

                    }

                    ?>
                    
                </table>
        
        </div>
        
    </body>
</html>
