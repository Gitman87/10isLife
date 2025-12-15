<?php
function getProdBrowserData($sortOption, $limit, $start, $brandOption)
{

    $offset = $start;
    global $user, $host, $password, $db_name;
    $conn = new mysqli($host, $user, $password, $db_name);
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    }

    $prodArray = [];
    $whereCondition = '';
    if ($brandOption !== 'all' && is_numeric($brandOption) && (int)$brandOption > 0) {
        $manufacturerId = (int)$brandOption;
        $whereCondition .= " AND products.manufacturer_id = {$manufacturerId}";
    } else {
        $whereCondition = '';
    };
    if ($sortOption === 'name') {
        $stmt = $conn->prepare("SELECT products.product_id FROM products WHERE products.product_id < 101 {$whereCondition} ORDER BY products.name LIMIT ? OFFSET ?;");
        if (!$stmt) {
            error_log("statement error" . $conn->error);
        }
        $stmt->bind_param("ii",  $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $prodArray[] = $row;
        }
        if (empty($prodArray)) {
            echo "No data";
            return [];
        }
    } elseif ($sortOption === 'price_asc') {
        $stmt = $conn->prepare("SELECT products.product_id FROM products WHERE products.product_id < 101 {$whereCondition} ORDER BY products.price ASC LIMIT ? OFFSET ?;");
        if (!$stmt) {
            error_log("statement error" . $conn->error);
        }
        $stmt->bind_param("ii",  $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $prodArray[] = $row;
        }
        if (empty($prodArray)) {
            echo "No data";
            return [];
        }
    } elseif ($sortOption === 'price_desc') {
        $stmt = $conn->prepare("SELECT products.product_id FROM products WHERE products.product_id < 101 {$whereCondition} ORDER BY products.price DESC LIMIT ? OFFSET ?;");
        if (!$stmt) {
            error_log("statement error" . $conn->error);
        }
        $stmt->bind_param("ii",  $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $prodArray[] = $row;
        }
        if (empty($prodArray)) {
            echo "No data";
            return [];
        }
    } elseif ($sortOption === 'bestsellers') {
        $stmt = $conn->prepare("SELECT products.product_id FROM products WHERE products.is_bestseller = 1 AND products.product_id < 101 {$whereCondition}  ORDER BY products.name LIMIT ? OFFSET ?;");
        if (!$stmt) {
            error_log("statement error" . $conn->error);
        }
        $stmt->bind_param("ii",  $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $prodArray[] = $row;
        }
        if (empty($prodArray)) {
            echo "No data";
            return [];
        }
    }

    return $prodArray;
}
function getTotalProductCount($sortOption, $brandOption)
{
    global $user, $host, $password, $db_name;
    $conn = new mysqli($host, $user, $password, $db_name);
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    }
    $whereCondition = "products.product_id < 101";
    if ($sortOption === 'bestsellers') {
        $whereCondition .= " AND products.is_bestseller = 1";
    }
    if ($brandOption !== 'all' && is_numeric($brandOption) && (int)$brandOption > 0) {
        $manufacturerId = (int)$brandOption;
        $whereCondition .= " AND products.manufacturer_id = {$manufacturerId}";
    }
    $stmt = $conn->prepare("SELECT COUNT(products.product_id) FROM products WHERE {$whereCondition};");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $numberOfProducts = (int)$row[0];
    return $numberOfProducts;
}
function getManufacturersData()
{
    global $user, $host, $password, $db_name;
    $conn = new mysqli($host, $user, $password, $db_name);
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT manufacturer.name, manufacturer.manufacturer_id  FROM manufacturer");
    if (!$stmt) {
        error_log("statement error" . $conn->error);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $manufacturers = [];
    while ($row = $result->fetch_assoc()) {
        $manufacturers[] = $row;
    }
    if (empty($manufacturers)) {
        echo "No data";
        return [];
    }
    return $manufacturers;
}
