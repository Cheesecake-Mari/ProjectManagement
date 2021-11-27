
<?php

include("consts2.php");

$id = $_GET['id'];

$sql = "delete from clients where id = $id";

$res = mysqli_query($conn, $sql);

if($res==true)
{
$_SESSION['delete']  = "<div class='sucess'>Client deleted sucessfully</div>";
header('location:' .HOMEURL. 'viewclients2.php');
}
else
{
$_SESSION['delete'] = "<div class='error'>Failed to delete</div>";
header('location:' .HOMEURL. 'viewclients2.php');
}


?>
