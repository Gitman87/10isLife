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
    // print_r($prodArray['images'][2]);
    // ---------------------% discount calc-------------------------
    $prodArray['discount'] = round(($prodArray['price'] * 100) / $prodArray['last_price']);


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
    $prodArray['manufacturer'] =  $result->fetch_assoc();

    // =============================attributes===================================================
    // -----------------------------grip size----------------------------------------------------
    // grip sizes - attribute id = 1
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id = ?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $attributeId = 1;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['grip_size'] = [];
    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['grip_size'][] = $row;
    };

    // print_r($prodArray['grip_size'][4]);
    // echo 'grip size length is ' . count($prodArray['grip_size']);

    // ----------------------length------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $attributeId = 3;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['length'] = [];
    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['length'][] = $row;
    };
    // print_r($prodArray['length'][4]);
    // echo 'grip size length is ' . count($prodArray['length']);

    // --------------------grid_pattern----------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $attributeId = 2;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['grid_pattern'] = [];
    $prodArray['grid_pattern'] = $result->fetch_assoc();
    // while ($row = $result->fetch_assoc()) {
    //     // print_r($row);
    //     $prodArray['length'][] = $row;
    // };
    // print_r($prodArray['grid_pattern']['value']);
    // --------------------material----------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $attributeId = 4;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['material'] = [];
    $prodArray['material'] = $result->fetch_assoc();
    // while ($row = $result->fetch_assoc()) {
    //     // print_r($row);
    //     $prodArray['length'][] = $row;
    // };
    // print_r($prodArray['material']['value']);
    // --------------------cover---------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $attributeId = 5;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['cover'] = [];
    $prodArray['cover'] = $result->fetch_assoc();
    // while ($row = $result->fetch_assoc()) {
    //     // print_r($row);
    //     $prodArray['length'][] = $row;
    // };
    // print_r($prodArray['cover']['value']);
    // ............................--------------------------reviews--------------------------
    $stmt = $conn->prepare("SELECT reviews.customer_id, reviews.rating, reviews.opinion, review_date from reviews WHERE product_id = ?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $stmt->bind_param("s",  $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['reviews'] = [];

    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['reviews'][] = $row;
    };
    //calculate average rating
    $prodArray['rating_score'] = calcRating($prodArray['reviews']);
    // print_r($prodArray['rating_score']);
    // print_r($prodArray['reviews']);
    // --------------------warranties-------------------------------------
    $stmt = $conn->prepare("SELECT warranty.description, warranty.time FROM warranty WHERE product_id = ?;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $stmt->bind_param("s",  $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['warranty'] = [];
    $prodArray['warranty'] = $result->fetch_assoc();
    // print_r($prodArray['warranty']);
    //calc amount of time ledt befor exp
    // ===============return all gathered info about product========
    print_r($prodArray['warranty']['time']);
    return $prodArray;
}
function calcRating($reviews)
{
    $rates = [];
    foreach ($reviews as $review) {
        $rates[] = $review['rating'];
    }
    $average = round(array_sum($rates) / count($rates), 1);
    return $average;
}
// function calcWarrantyTime
function customerFullName($idArray)
{
    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $customersFullNameArray = [];
    foreach ($idArray as $id) {
        $stmt = $conn->prepare("SELECT first_name, last_name FROM customers WHERE customer_id=?");
        if (!$stmt) {
            die("statement error" . $conn->error);
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assocResult = $result->fetch_assoc();
        $fullName = $assocResult['first_name'] . ' ' . $assocResult['last_name'];
        $customersFullNameArray[] = $fullName;
    }

    return $customersFullNameArray;
}
