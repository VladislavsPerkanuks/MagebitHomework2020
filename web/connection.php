<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'Vladislavs_Homework';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass);

if (!$mysqli) {
    die('Could not connect: ');
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$mysqli->query($sql)) {
    die("Error creating database: ".$mysqli->error);
}

$mysqli->close();

