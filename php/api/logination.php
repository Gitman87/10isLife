<?php
require './connection.php';
function logIn()
{

    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO customers(first_name, last_name, email, password_hash,gender,  tax_number,is_registered) VALUES (?, ?, ?,?,?,?,1)");
}
