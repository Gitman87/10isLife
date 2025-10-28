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

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO customers(first_name, last_name, email, password_hash,gender,  tax_number,is_registered) VALUES (?, ?, ?,?,?,?,1)");

  $errorMessages = validate(); //validating email, first/lastname, password, tax_numver (if not empoty)
  if (empty($errorMessages) && $_SERVER["REQUEST_METHOD"] == "POST") {

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
  } else {

    //read the errorMessages array??? put to message json...
    $errors = [];
    foreach ($errorMessages as $error) {
      $errors[] = $error;
    }
    echo '
{
 "success":false,
 "message":' . json_encode($errorMessages) . '

}  ';
  }
}
function sanitizeInputValue($inputValue)
{
  $inputValue = trim($inputValue);
  $inputValue = stripslashes($inputValue);
  $inputValue = htmlspecialchars(($inputValue));
  return $inputValue;
}
function NipCheckSum($taxNumber)
{
  $onlyDigitsNIP = preg_replace('/[^0-9]/', '', $taxNumber);
  if (strlen($onlyDigitsNIP) !== 10) {
    return false;
  }
  $digitsArrayNIP = str_split($onlyDigitsNIP);
  $weights = [6, 5, 7, 2, 3, 4, 5, 6, 7];
  $lastDigitNIP = (int)end($digitsArrayNIP);
  $sum = 0;
  for ($i = 0; $i < 9; $i++) {
    $sum += ((int)$digitsArrayNIP[$i] * $weights[$i]);
  }
  $reminder = $sum % 11;
  if ($reminder === $lastDigitNIP) {
    return true;
  } else {
    return false;
  }
}
function validate()
{
  // echo 'backend validating started';
  $errorMessages = [];
  //check mail
  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    return;
  };
  if (empty($_POST['email'])) {
    $errorMessages['emailError'] = "Email jest wymagany";
  } else {
    $email = sanitizeInputValue($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMessages['emailError'] = "Hasło musi się składać z conajmniej: 8 znaków, 1 dużej litery, 1 cyfry, 1 ze znaków [@$!%*?&]. Nie może mieć mieć odstępów między znakami. ";
    };
  }
  //check name
  if (empty($_POST['first_name'])) {
    $errorMessages['firstNameError'] = "Imię jest wymagane.";
  } else {
    $firstName = sanitizeInputValue($_POST['first_name']);
    if (!preg_match("/^\p{Lu}\p{Ll}+$/u", $firstName)) {
      $errorMessages['firstNameError'] = "Podaj poprawną formę swojego imienia (np. Piotr, Łukasz, Anna)";
    }
  }
  //check last name
  if (empty($_POST['last_name'])) {
    $errorMessages['lastNameError'] = "Imię jest wymagane.";
  } else {
    $lastName = sanitizeInputValue($_POST['first_name']);
    if (!preg_match("/^\p{Lu}\p{Ll}+(-\p{Lu}\p{Ll}+)?$/u", $lastName)) {
      $errorMessages['lastNameError'] = "Podaj poprawną forme swojego nazwiska";
    }
  }
  //check password
  if (empty($_POST['password'])) {
    $errorMessages['passwordError'] = "Hasło jest wymagane";
  } else {
    $password = sanitizeInputValue($_POST['password']);
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
      $errorMessages['passwordError'] = "Hasło musi się składać z conajmniej: 8 znaków, 1 dużej litery, 1 cyfry, 1 ze znaków [@$!%*?&]. Nie może mieć mieć odstępów między znakami. ";
    }
  }
  //check tax number , if not empty
  if (!empty($_POST["tax_number"])) {
    $taxNumber = sanitizeInputValue($_POST["tax_number"]);
    if (!preg_match("/^\d{3}-\d{3}-\d{2}-\d{2}$/", $taxNumber)) {
      $errorMessages['tax_number'] = "Tylko polski NIP. Musi się składać z 10 cyfr, np 123-456-78-90";
    } elseif (!nipCheckSum($taxNumber)) {
      $errorMessages['tax_number'] = "Podaj prawidłowy NIP. Zły checksum.";
    }
  }
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