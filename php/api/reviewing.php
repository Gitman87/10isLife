<?php
require './php/api/connection.php';
require './php/utilities/reg_log_util.php';
function setReview()
{
    // print_r($_POST);
    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
    };
    $stmt = $conn->prepare("INSERT INTO reviews(product_id,customer_id,rating,opinion, review_date) VALUES (?,?,?,?,?)");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sanitizedRate = sanitizeInputValue($_POST['new_rate']);
        $sanitizedReviewText = sanitizeInputValue($_POST['new_review']);
        $userId = $_SESSION['user_id'];
        $sanitizedProdId = sanitizeInputValue($_POST['prod_id']);
        $reviewDate = date('Y-m-d H:i:s');
        $stmt->bind_param("sssss", $sanitizedProdId, $userId, $sanitizedRate, $sanitizedReviewText, $reviewDate);
        try {
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                echo json_encode([
                    "success" => true,
                    "message" => "review sent"

                ]);
                exit;
            };
        } catch (mysqli_sql_exception $e) {
            error_log("e is ", $e->getCode());
            error_log("Database execution error: " . $stmt->error);
            error_log("Error: ", $conn->errno);
            //since email should be unique...
            $responseMessage = ['dataBaseError' => "Zapisanie recenzji nieudane. Pradowpodobnie zdublowany rekord."];
            if (isset($stmt)) $stmt->close();
            if (isset($conn)) $conn->close();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([

                "success" => false,
                "message" => $responseMessage
            ]);
            exit;
        }
    } else {

        header('Content-Type: application/json; charset=utf-8');

        $stmt->close();
        $conn->close();

        echo json_encode([
            "success" => false,
            "message" => "review failed"
        ]);
        exit;
    }
}
// setReview();
