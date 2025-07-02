<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// Load DB credentials securely
$config = include(dirname(__DIR__, 2) . '/db_config.php');

define('DB_SERVER', $config['host']);
define('DB_USERNAME', $config['username']);
define('DB_PASSWORD', $config['password']);
define('DB_NAME', $config['database']);

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$gmailid = ''; // YOUR gmail email
$gmailpassword = ''; // YOUR gmail password
$gmailusername = ''; // YOUR gmail User name

?>