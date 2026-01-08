<?php
require './php/api/connection.php';

function getCustomerData($id)
{
  global $user, $host, $password, $db_name;
  // Create connection
  $conn = new mysqli($host, $user, $password, $db_name);
  // Check connection
  if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
    exit;
  }

  // prepare and bind
  // prepare and bind
  $customerData = NULL;
  $stmt = $conn->prepare("SELECT  *  FROM customers JOIN  customer_address ON customers.customer_id = customer_address.customer_id  WHERE customers.customer_id = ? ");
  if (!$stmt) {
    error_log("statement error" . $conn->error);
  }
  $stmt->bind_param("i",  $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $customerData = $result->fetch_assoc();
  // while ($row = $result->fetch_assoc()) {
  //   $customerData[] = $row;
  // }
  if (empty($customerData)) {
    echo "No data";
    return [];
  }
  // print_r($customerData);
  return $customerData;
}
