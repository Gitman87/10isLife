

<?php
function genReviewTiles($prodReviews)
{
    $customerName = ' ';

    $rating = '';
    $opinion = '';
    $time = '';
}
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
        if ($row = $result->fetch_assoc()) {
            $customersFullNameArray = $row;
        } else {
            echo "No data";
            return [];
        }
    }


    return $customersFullNameArray;
}
