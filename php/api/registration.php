<?php
require './connection.php';



function setCustomerData()
{
  // print_r($_POST);
  global $user, $host, $password, $db_name;
  // Create connection
  $conn = new mysqli($host, $user, $password, $db_name);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // echo ' 12 linkijka';
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO customers(first_name, last_name, email, password_hash, customer_type, is_registered) VALUES (?, ?, ?,?, 'B2C', 1)");
  // echo ' 14 linkijka';
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt->bind_param("ssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashedPassword);
  // echo ' 18 linkijka';
  $stmt->execute();
  echo 'success';
  $stmt->close();
  $conn->close();
}
setCustomerData();
// funkcja ma zwracac tablice asocjacyjną no elo