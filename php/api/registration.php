<?php
require './connection.php';
require '../utilities/reg_log_util.php';
function setCustomerData()
{
  // print_r($_POST);
  global $user, $host, $password, $db_name;
  // Create connection
  $conn = new mysqli($host, $user, $password, $db_name);
  // Check connection
  if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
  }

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO customers(first_name, last_name, email, password_hash,gender,  tax_number,is_registered) VALUES (?, ?, ?,?,?,?,1)");

  $errorMessages = validate();; //validating email, first/lastname, password, tax_numver (if not empoty)
  if (empty($errorMessages) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitizedFirstName = sanitizeInputValue($_POST['first_name']);
    $sanitizedLastName = sanitizeInputValue($_POST['last_name']);
    $sanitizedEmail = sanitizeInputValue($_POST['email']);
    $hashedPassword = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $sanitizedGender = sanitizeInputValue($_POST['sex']);
    $taxNumber = NULL;
    if (!empty($_POST['tax_number'])) {
      $taxNumber = sanitizeInputValue($_POST['tax_number']);
    }


    $stmt->bind_param("ssssss",  $sanitizedFirstName, $sanitizedLastName, $sanitizedEmail, $hashedPassword, $sanitizedGender, $taxNumber);

    try {
      if ($stmt->execute()) {
        //       echo '

        //automatic logging
        session_start();
        //user id will be his id from db, the last insert
        $newestId = $conn->insert_id;
        $_SESSION['user_id'] = $newestId;
        $_SESSION['user_name'] = $sanitizedFirstName;
        $stmt->close();
        $conn->close();
        // header('Location: registered.php'); //redirect to my congratulations page
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
          "success" => true,
          "message" => "registered",
          "redirect" => "registered.php"
        ]);
        exit; //close reg form
      }
    } catch (mysqli_sql_exception $e) { //catches db error, np double email entry
      error_log("e is ", $e->getCode());
      error_log("Database execution error: " . $stmt->error);
      error_log("Error: ", $conn->errno);
      //since email should be unique...
      $responseMessage = ['dataBaseError' => "Rejestracja nieudana. Prawdopodobnie adres email jest już zajęty."];
      if (isset($stmt)) $stmt->close();
      if (isset($conn)) $conn->close();
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode([

        "success" => false,
        "message" => $responseMessage
      ]);
      exit;
    };
  } else {

    header('Content-Type: application/json; charset=utf-8');

    $stmt->close();
    $conn->close();
    //read the errorMessages array??? put to message json...
    // $errors = [];
    // foreach ($errorMessages as $error) {
    //   $errors[] = $error;
    // }
    echo json_encode([

      "success" => false,
      "message" => $errorMessages
    ]);
  }
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
  // if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  //   return $errorMessages;;
  // };
  if (empty($_POST['email'])) {
    $errorMessages['emailError'] = "Email jest wymagany";
  } else {
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMessages['emailError'] = "Proszę podać właściwy format email (np.: nazwa@domena.com)";
    };
  }
  //check name
  if (empty($_POST['first_name'])) {
    $errorMessages['firstNameError'] = "Imię jest wymagane.";
  } else {
    $firstName = trim($_POST['first_name']);
    if (!preg_match("/^\p{Lu}\p{Ll}+$/u", $firstName)) {
      $errorMessages['firstNameError'] = "Podaj poprawną formę swojego imienia (np. Piotr, Łukasz, Anna)";
    }
  }
  //check last name
  if (empty($_POST['last_name'])) {
    $errorMessages['lastNameError'] = "Nazwisko jest wymagane.";
  } else {
    $lastName = trim($_POST['last_name']);
    if (!preg_match("/^\p{Lu}\p{Ll}+(-\p{Lu}\p{Ll}+)?$/u", $lastName)) {
      $errorMessages['lastNameError'] = "Podaj poprawną forme swojego nazwiska";
    }
  }
  //check password
  if (empty($_POST['password'])) {
    $errorMessages['passwordError'] = "Hasło jest wymagane";
  } else {
    $password = trim($_POST['password']);
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
      $errorMessages['passwordError'] = "Hasło musi się składać z conajmniej: 8 znaków, 1 dużej litery, 1 cyfry, 1 ze znaków [@$!%*?&]. Nie może mieć mieć odstępów między znakami. ";
    }
  }
  //check tax number , if not empty
  if (!empty($_POST["tax_number"])) {
    $taxNumber = trim($_POST["tax_number"]);
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