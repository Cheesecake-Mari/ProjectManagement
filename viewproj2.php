<?php  include("consts2.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
        <title>SeaShells Project Manager</title>
    </head>

    <body>
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
                        <th>  Project Name  </th>
                        <th>  Topic  </th>
                        <th>  Field  </th>
                        <th>  Alter  </th>
                    </tr>

                    <?php
                    $sql = "select * from addproject";
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
                                $Projectname = $rows['Projectname'];
                                $Topic = $rows['Topic'];
                                $Field = $rows['Field'];

                                ?>
                                <tr>
                        <td><?php echo $no ?></td>
                        <br>
                        <td><?php echo $Projectname ?></td>
                        <br>
                        <td><?php echo $Topic ?></td>
                        <br>
                        <td><?php echo $Field ?></td>
                        <br>
                        <td>    
                        <a href="<?php echo HOMEURL;?>updateproj2.php?id=<?php echo $id ?>" class ="btn-secondary">  Update  </a><br>
                        <a href="<?php echo HOMEURL;?>delete2.php?id=<?php echo $id ?>" class ="btn-ter"> Delete  </a>
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
