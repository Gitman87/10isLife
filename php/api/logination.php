<?php
require './connection.php';
require './registration.php'; //i have useful functions there
function logIn()
{

    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
    }
    $sanitizedInputEmail = sanitizeInputValue($_POST['email']);
    $inputPassword = trim($_POST['password']);
    // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->bind_param("s",  $sanitizedInputEmail);
    try {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $userData = $result->fetch_assoc();
            $hashedPassword = $userData['password_hash'];

            //check if user data is empty, if is htrer was now matchin email
            if ($userData && password_verify($inputPassword, $hashedPassword)) {
                //now I can start session
                session_start();
                $_SESSION['user_id'] = $userData['customer_id'];
                $_SESSION['user_name'] = $userData['customer_name'];

                $stmt->close();
                $conn->close();
                //redirect to main page
                header('Location: index.php');
            }
        } else {
            $stmt->close();
            $conn->close();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["success" => false, "message" => "Nieprawidłowy email lub hasło."]); //for security purposes
            exit;
            // Invalid email or password - for security reason

        }
    } catch (mysqli_sql_exception $e) {
        error_log("Database execution error:  " . $stmt->error);
        $responseMessage = ['dataBaseError' => "Logowanie nieudane . "];
        if (isset($stmt)) $stmt->close();
        if (isset($conn)) $conn->close();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            "success" => false,
            "message" => "Wystąpił błąd serwera. Spróbuj ponownie."
        ]);
        exit;
    }
}
logIn();
