<?php

$servername     = "localhost";
$username       = "root";
$password       = "Devbox-123";
$dbname         = "PrefixMap";

// Create connection
$connect_db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connect_db->connect_error) {
    die("Connection failed: " . $connect_db->connect_error);
}
else{
    $sql = "SELECT * FROM PrefixMap";
    $query = $connect_db->query($sql);
    $query_results = $query->fetch_all();

    $getData = $query_results;

    echo "Connected successfully";
}


