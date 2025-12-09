<?php

function getTileData($id)
{

    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT
    products.product_id,
    products.name,
    products.price,
    products.last_price,
    products.is_discount
FROM
    products
WHERE
    products.product_id = ?;
    ");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray = [];
    if ($row = $result->fetch_assoc()) {
        $prodArray = $row;
    } else {
        echo "No data";
        return [];
    }
    // ---------------------% discount calc-------------------------
    $prodArray['discount'] = round(($prodArray['price'] * 100) / $prodArray['last_price']);
    // ........................reviews--------------------------
    $stmt = $conn->prepare("SELECT reviews.customer_id, reviews.rating, reviews.opinion, review_date from reviews WHERE product_id = ?;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $stmt->bind_param("i",  $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $prodArray['reviews'] = [];

    while ($row = $result->fetch_assoc()) {
        // print_r($row);
        $prodArray['reviews'][] = $row;
    };
    //calculate average rating
    $prodArray['rating_score'] = calcRating($prodArray['reviews']);
    // ---------------------product images---------------------
    $stmt = $conn->prepare("SELECT
    product_images.image_id,
    product_images.url
FROM
    product_images
WHERE
    product_images.product_id = ?
AND
    product_images.is_thumbnail = 1;");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $prodArray['thumbnail'] = [];
    $prodArray['thumbnail'] = $result->fetch_assoc();


    return $prodArray;
    //
    // stars_number
    // opinion_number
    // thumbnail_url
    // $prodData['reviews']
    // $prodData['rating_score']
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
