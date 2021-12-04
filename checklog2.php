<?php


if (!isset($_SESSION['user']))
{
    $_SESSION['nologin'] = "<div class='error'>Please login</div>";
    header('location:'.HOMEURL.'projectManagement2.php');
}
?>