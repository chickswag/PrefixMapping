<?php

$servername     = "localhost";
$username       = "Smartz";
$password       = "Devbox-123";
$dbname         = "PrefixMapping";

// Create connection
$connect_db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connect_db->connect_error) {
    die("Connection failed: " . $connect_db->connect_error);
}
else{
    echo "Connected successfully";
}


