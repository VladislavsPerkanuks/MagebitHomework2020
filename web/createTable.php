<?php

include('connection.php');

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$date   = date('y-m-d');

$sql = "CREATE TABLE IF NOT EXISTS users_email (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   email VARCHAR(50) NOT NULL UNIQUE,
   date  DATE
   )";

if (!$mysqli->query($sql)) {
    echo "Error creating table: ".$mysqli->error;
}
