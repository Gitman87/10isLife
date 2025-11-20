<?php

function getProductData($id)
{
    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
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
        error_log("statement error" . $conn->error);
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
        error_log("statement error" . $conn->error);
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
        error_log("statement error" . $conn->error);
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
        error_log("statement error" . $conn->error);
    }
    $attributeId = 1;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['grip_size'] = [];
    $prodArray['grip_size'] = $result->fetch_assoc();
    // echo 'grip size length is ' . $prodArray['grip_size']['value'];
    // ----------------------length------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 3;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['length'] = [];
    $prodArray['length'] = $result->fetch_assoc();

    // -----------------------------grip_variants---------------------------------------------------
    // grip sizes - attribute id = 1
    $stmt = $conn->prepare("SELECT
    product_variants.child_id,
    product_variants.attribute_variant_id,
    attribute_variants.value
FROM
    product_variants
INNER JOIN
    attribute_variants
    ON product_variants.attribute_variant_id = attribute_variants.attribute_variant_id
WHERE
    product_variants.parent_id = ?
    AND attribute_variants.attribute_id = ?; ");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 1;
    $stmt->bind_param("ss", $id, $attributeId);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['grip_variants'] = [];
    // $prodArray['config_variants'] = $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['grip_variants'][] = $row;
    };
    print_r($prodArray['grip_variants']);
    // ------------------------------length_variants---------------------------------------------------
    // grip sizes - attribute id = 1
    $stmt = $conn->prepare("SELECT
    product_variants.child_id,
    product_variants.attribute_variant_id,
    attribute_variants.value
FROM
    product_variants
INNER JOIN
    attribute_variants
    ON product_variants.attribute_variant_id = attribute_variants.attribute_variant_id
WHERE
    product_variants.parent_id = ?
    AND attribute_variants.attribute_id = ?; ");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 3;
    $stmt->bind_param("ss", $id, $attributeId);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['length_variants'] = [];
    // $prodArray['config_variants'] = $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['length_variants'][] = $row;
    };
    print_r($prodArray['length_variants']);
    // --------------------grid_pattern----------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 2;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['grid_pattern'] = [];
    $prodArray['grid_pattern'] = $result->fetch_assoc();

    // --------------------material----------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 4;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['material'] = [];
    $prodArray['material'] = $result->fetch_assoc();

    // --------------------cover---------------------------------
    $stmt = $conn->prepare("SELECT attribute_variants.attribute_variant_id, attribute_variants.value FROM attribute_variants JOIN product_attributes ON attribute_variants.attribute_variant_id = product_attributes.attribute_variant_id
    WHERE attribute_variants.attribute_id = ? AND product_attributes.product_id=?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $attributeId = 5;
    $stmt->bind_param("ss", $attributeId, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['cover'] = [];
    $prodArray['cover'] = $result->fetch_assoc();

    // ........................reviews--------------------------
    $stmt = $conn->prepare("SELECT reviews.customer_id, reviews.rating, reviews.opinion, review_date from reviews WHERE product_id = ?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
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

    // --------------------warranties-------------------------------------
    $stmt = $conn->prepare("SELECT warranty.description, warranty.time FROM warranty WHERE product_id = ?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $stmt->bind_param("s",  $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['warranty'] = [];
    $prodArray['warranty'] = $result->fetch_assoc();
    // print_r($prodArray['warranty']);
    //calc amount of time ledt befor exp
    // ===============return all gathered info about product========
    // print_r($prodArray['warranty']['time']);
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
