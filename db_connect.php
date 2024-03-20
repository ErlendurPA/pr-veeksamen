<?php

$server = "localhost";
$user = "root";
$pw = "root";
$db = "fjellticket";

$conn = mysqli_connect($server, $user, $pw, $db);

if (!$conn) {
    echo "Connection failed!";
}
