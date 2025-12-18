<?php
require __DIR__ . '/connection.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
    unset($_SESSION['verified_cart']);
}
function verifyBasket()
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

    //data from verify_basket.js
    $jsonData = file_get_contents('php://input');
    $storedCart = json_decode($jsonData, true);

    if (!$storedCart || !is_array($storedCart)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["success" => false, "message" => ["cart" => "Koszyk jest pusty."]]);
        exit;
    }

    $errorMessages = [];
    //extract ids of the items drom the cart
    $ids = array_map(function ($item) {
        return (int)$item['id'];
    }, $storedCart);
    $idList = implode(',', $ids);

    //get actual data from db
    $result = $conn->query("SELECT products.product_id,products.name, products.price,  products.quantity FROM products WHERE products.product_id IN ({$idList});");


    $realProducts = [];
    $verifiedCart = [];
    $isValid = true;
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $realProducts[$row['product_id']] = $row;
        }
    }

    foreach ($storedCart as $item) {
        $id = (int)$item['id'];
        $requestedQuantity = (int)$item['quantity'];
        $clientPrice = isset($item['price']) ? (float)$item['price'] : 0;

        if (!isset($realProducts[$id])) {
            $isValid = false;
            $errorMessages[] = "Produkt o id $id nie istnieje.";
            continue;
        }
        // if exists
        $product = $realProducts[$id];
        $actualPrice = (float)$product['price'];
        if ($product['quantity'] < $requestedQuantity) {
            $isValid = false;
            if ($product['quantity'] <= 0) {
                $errorMessages[] = "Produkt '" . $product['name'] . "' jest wyprzedany.Usu";
            } else {
                $errorMessages[] = "Produkt '" . $product['name'] . "' ma tylko " . $product['quantity'] . " szt. na stanie.";
            }
        }
        //check the price
        if (abs($actualPrice - $clientPrice) > 0.01) {
            $isValid = false;
            $errorMessages[] = "Cena produktu '" . $product['name'] . "' uległa zmianie. Aktualna cena to: " . number_format($actualPrice, 2) . " zł.";
        }
        $verifiedCart[] = [
            "id" => $id,
            "name" => $product['name'],
            "price" => (float)$product['price'],
            "quantity" => $requestedQuantity,
            "total" => (float)$product['price'] * $requestedQuantity
        ];
    }
    header('Content-Type: application/json; charset=utf-8');

    if ($isValid) {
        session_regenerate_id(true); //for security???
        //for passing the correct cart to cjeckout page
        $_SESSION['verified_cart'] = $verifiedCart;
        //check if user is logged
        $isLogged = false;
        $isLogged = isset($_SESSION['user_id']);
        echo json_encode([
            "success" => true,
            "isLogged" => $isLogged,
            "redirect" => "checkout.php"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => $errorMessages,

        ]);
    }

    $conn->close();
    exit;
    echo 'VerfifiedCart is ' . $verifiedCart;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyBasket();
}
