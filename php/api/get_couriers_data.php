<?php
require './php/api/connection.php';

function getCouriersData()
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
    $result = $conn->query("SELECT  *  FROM couriers ");
    if (!$result) {
        error_log("statement error" . $conn->error);
    }
    $couriersData = [];
    // $couriersData = $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
        $couriersData[]  = $row;
    };
    // else {
    //     echo "No data";
    //     return [];
    // }

    if (empty($couriersData)) {
        echo "No data";
        return [];
    };
    // print_r($couriersData);
    return $couriersData;
}
