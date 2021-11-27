<?php

session_start();

define('HOMEURL', 'http://localhost//ProjectManagement2/');

define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASS', '');
define('DB_NAME', 'tam') ;

 $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASS);
 $db_select = mysqli_select_db($conn,DB_NAME);

?>