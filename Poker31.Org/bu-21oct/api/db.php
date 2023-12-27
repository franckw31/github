<?php

$db = "dbs9616600";
$host = "db5011397709.hosting-data.io";
$user = 'dbu5472475';
$pass = 'Kookies7*';

//PDO Connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e){
    //echo "Connection failed: " . $e->getMessage();
}

function p($arr){
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
}