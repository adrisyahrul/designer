<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'app-designer');
 
/* Attempt to connect to MySQL database */
$link = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysql_select_db("app-designer");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>