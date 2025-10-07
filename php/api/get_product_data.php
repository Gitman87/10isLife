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
    manufacturer.name,
    products.variant_type
FROM
    products,
    manufacturer
WHERE
    products.manufacturer_id = manufacturer.manufacturer_id 
    AND products.product_id = ?;
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

    //product images

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

    $prodArray['images']=[];

    while($row=$result->fetch_assoc()){
      print_r($row);
      $prodArray['images'][]=$row;

    };
    return $prodArray;
}
