<?php
require './connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function verifyCheckoutList()
{
    //check i verify_cart still exist
    if (!$_SESSION['verified_cart']) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["success" => false, "message" => ["cart" => "Zweryfikowany koszyk nie istnieje"]]);
        exit;
    }
    global $user, $host, $password, $db_name;

    $conn = new mysqli($host, $user, $password, $db_name);

    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
        exit;
    }
    $idList = [];
    foreach ($_SESSION['verfifiedCart'] as $item) {
        $idList[] = $item['id'];
    }
    $errorMessages = [];
    $priceErrorMessages = [];
    $weightErrorMessages = [];
    $volumeErrorMessages = [];
    $quantityErrorMessages = [];

    //setting up connetion
    global $user, $host, $password, $db_name;

    $conn = new mysqli($host, $user, $password, $db_name);

    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
        exit;
    }
    //get actual data from db

    $result = $conn->query("SELECT products.product_id,products.name, products.price,  products.quantity, products.weight_kg, products.width_cm, products.height_cm, products.length_cm FROM products WHERE products.product_id IN ({$idList});");

    $realProducts = [];
    $verifiedCart = [];
    $isValid = true;
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $realProducts[$row['product_id']] = $row;
        }
    }

    //check each checkout list products' data


}
