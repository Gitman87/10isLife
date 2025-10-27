<?php
require './connection.php';





// }
// function checkPosts(){
//   if($_SERVER["REQUEST_METHOD"] == "POST"){

//   }
// }
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

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO customers(first_name, last_name, email, password_hash,gender,  tax_number,is_registered) VALUES (?, ?, ?,?,?,?,1)");

  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $taxNumber = '';
  if ($_POST['tax_number'] === '') {
    global $taxNumber;
    $taxNumber = NULL;
  } else {
    $taxNumber = $_POST['tax_number'];
  }
  $stmt->bind_param("ssssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashedPassword, $_POST['sex'], $taxNumber);

  $stmt->execute();
  header('Content-Type: application/json; charset=utf-8');
  echo '
{
 "success":true,
 "message":"registered"

}  ';
  $stmt->close();
  $conn->close();
}
function sanitizeInputValue($inputValue){
  $inputValue = trim($inputValue);
  $inputValue = stripslashes($inputValue);
  $inputValue = htmlspecialchars(($inputValue));
  return $inputValue;

}
function validate()
{
  $errorMessages = [];
  //check mail
  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    return;
  }
  if (empty($_POST['email'])) {
    $errorMessages['emailError'] = "Email is required";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errorMessages['emailError'] = "Unproper email format.";
  }
  //check name
  if(empty($_POST['first_name'])){
    $errorMessages['firstNameError'] = "First name is requerd."
  };








  return $errorMessages;
}
// $valErrors = validate();
// $_SESSION['register_data'] = $_POST;

// setCustomerData();

setCustomerData();
// if ((empty($valErrors) && $_SERVER["REQUEST_METHOD"] == "POST")) {

//   //clear post variables???
//   unset($_SESSION['register_data']);
//   // unset errors
// }


// funkcja ma zwracac tablice asocjacyjną no elo