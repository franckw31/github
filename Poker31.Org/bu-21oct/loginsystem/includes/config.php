<?php
define('DB_SERVER','db5014475609.hosting-data.io');
define('DB_USER','dbu4008125');
define('DB_PASS' ,'Kookies7*l');
define('DB_NAME', 'dbs12036816');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

