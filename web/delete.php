<?php

include('createTable.php');

$id = $_GET['id'];

$sql = "DELETE FROM users_email WHERE id = '$id'";

$result = $mysqli->query($sql);

if ($result) {
    include('tableContents.php');
}