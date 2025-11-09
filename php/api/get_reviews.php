<?php
function getReviews($productId)
{

    global $user, $host, $password, $db_name;
    // Create connection
    $conn = new mysqli($host, $user, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT reviews.product_id, reviews.rating, reviews.opinion, reviews.review_date, customers.first_name, customers.last_name FROM reviews, customers WHERE reviews.product_id =
    ? AND customers.CUSTOMER_ID = reviews.customer_id;");
    if (!$stmt) {
        die("statement error" . $conn->error);
    }
    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $result = $stmt->get_result();


    $reviewArray = $result->fetch_all(MYSQLI_ASSOC);
    // print_r($reviewArray);
    // echo json_encode($reviewArray);
    return  $reviewArray;
}
