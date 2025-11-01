<?php

function getProductData($id)
{
    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    // --------------------product data------------------------
    $stmt = $conn->prepare("SELECT
    products.product_id,
    products.name,
    products.description,
    products.price,
    last_price,
    quantity,
    is_bestseller,
    products.is_new,
    products.is_discount,
    products.variant_type
FROM
    products

WHERE

 products.product_id = ?;
    ");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray = [];
    if ($row = $result->fetch_assoc()) {
        $prodArray = $row;
    } else {
        echo "No data";
        return [];
    }
    // print_r($prodArray); //rekurencyjny print


    // ---------------------product images---------------------
    $stmt = $conn->prepare("SELECT
    product_images.image_id,
    product_images.url,
    product_images.is_thumbnail

FROM
    product_images
WHERE
    product_images.product_id = ?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $prodArray['images'] = [];

    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['images'][] = $row;
    };
    // ----------------manufacturers and man.photos----------------
    $stmt = $conn->prepare("SELECT
    manufacturer.name, manufacturer_images.url
FROM
    products,
    manufacturer,
    manufacturer_images
WHERE
    products.manufacturer_id = manufacturer.manufacturer_id
        AND manufacturer.manufacturer_id = manufacturer_images.manufacturer_id
        AND products.product_id = ?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['manufacturer'] = [];
    if ($row = $result->fetch_assoc()) {
        $prodArray['manufacturer'][] = $row;
    } else {
        echo "No data";
        return [];
    }
    // print_r($result);

    print_r($prodArray);
    // $prodArray['manufacturer_name'] = result['name'];
    // $prodArray['manufacturer_photo']
    // -----------------------attributes---------------------------

    // ===============return all gathered info about product========
    return $prodArray;
}
