<?php include('consts2.php');?>
<link rel="stylesheet" href="styles.css">
<div class="main-content">
    <div class="wrapper">
    <h1>SeaShells</h1>
        <h2>Managing your projects with ease</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br>
        <h1>Update Project</h1>

        <?php

        $id =$_GET['id'];

        $sql = "select * from addproject where id = $id";

        $res = mysqli_query($conn,$sql);

        if($res == true)
        {
            
            $count = mysqli_num_rows($res);
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);

                $Projectname = $row['Projectname'];
                $Topic = $row['Topic'];
                $Field = $row['Field'];


            }
            else
            {
                header('location:' .HOMEURL.'viewproj2.php');
            }

        }
    

        ?>

        <form action="" method="POST">
            <div class="table-div">
            <table class="table-30">
                <tr><td>Project Name</td>
                <td>
                    <input type="text" name="Projectname" value="<?php echo $Projectname; ?>">
                </td>
                </tr>
                <br>
                <tr><td>Title</td>
                <td>
                    <input type="text" name="Topic" value="<?php echo $Topic; ?>">
                </td>
                </tr>
                <br>

                <tr><td>Field</td>
                <td>
                    <input type="text" name="Field" value="<?php echo $Field; ?>">
                </td>
                </tr>
                <tr>
                <td colspan="3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="submit" class="btn-primary">
                </td>
                </tr>
            </table>
            </div>
        </form>

</div>
</div>

<?php

if(isset($_POST['submit']))
{
$id = $_POST['id'];
$Projectname = $_POST['Projectname'];
$Topic = $_POST['Topic'];
$Field = $row['Field'];

$sql = "update addproject set  Projectname = '$Projectname', Topic = '$Topic', Field = '$Field' where id = '$id'";

$res = mysqli_query($conn,$sql);

if($res == true)
{
    $_SESSION['update'] = "<div class='sucess'>Project Update Sucessfull</div>";
    header('location:' .HOMEURL. 'viewproj2.php');
}
else{
    $_SESSION['update'] = "<div class='error'>Project Update Failed</div>";
    header('location:' .HOMEURL.'viewproj2.php');
}
}

?>
