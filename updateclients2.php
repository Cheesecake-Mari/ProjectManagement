<?php include('consts2.php');?>

<link rel="stylesheet" href="styles.css">
<div class="main-content">
    <div class="wrapper">
    <h1>SeaShells</h1>
        <h2>Managing your projects with ease</h2>
        <br>
        <img src="clip.png" width="100" 
        height="100"><br><br>
        <h1>Update Clients</h1>

        <?php

        $id = $_GET['id'];

        $sql = "select * from clients where id = $id";

        $res = mysqli_query($conn,$sql);

        if($res == true)
        {
            
            $count = mysqli_num_rows($res);
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);

                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $phone = $row['phone'];
                $project_name = $row['project_name'];


            }
            else
            {
                header('location:' .HOMEURL.'viewclients2.php');
            }

        }
    

        ?>

        <form action="" method="POST">
            <div class="table-div">
            <table class="table-30">
                <tr><td>Project Name</td>
                <td>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                </td>
                </tr>
                <br>
                <tr><td>Title</td>
                <td>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                </td>
                </tr>
                <br>

                <tr><td>Field</td>
                <td>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                </td>
                </tr>
                <tr>
                <br>

                <tr><td>Field</td>
                <td>
                    <input type="text" name="project_name" value="<?php echo $project_name; ?>">
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
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$phone = $_POST['phone'];
$project_name = $_POST['project_name'];

$sql = "update clients set  firstname = '$firstname', lastname = '$lastname', phone = '$phone', project_name = '$project_name'  where id = '$id'";

$res = mysqli_query($conn,$sql);

if($res == true)
{
    $_SESSION['update'] = "<div class='sucess'>Client Update Sucessfull</div>";
    header('location:' .HOMEURL. 'viewclients2.php');
}
else{
    $_SESSION['update'] = "<div class='error'>Client Update Failed</div>";
    header('location:' .HOMEURL.'viewclients2.php');
}
}

?>
