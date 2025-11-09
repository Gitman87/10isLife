<?php
function genReviewTiles($prodReviews)
{
    $customersIds = [];
    foreach ($prodReviews as $id) {
        $customersIds[] = $id['customer_id'];
    }
    // echo $prodReviews
    // echo 'Customers ids are: ' . $customersIds[0];
    $customersFullNames = customerFullName(array_keys($customersIds));
?>

    <?php
    for ($i = 0; $i < count($prodReviews); $i++) {
    ?>
        <div class="review">

            <div class="review-head">
                <?= genRateBalls($prodReviews[$i]['rating'], count($prodReviews), true) ?>
            </div>
            <p name="" id="" class="review-text"><?= $prodReviews[$i]['opinion'] ?></p>
            <!-- <p class="review-opinion">/p> -->
            <p class="review-stamp">
                <?php $dateArray = explode(' ', $prodReviews[$i]['review_date']);
                array_pop($dateArray);
                $date = implode($dateArray); ?>
            <div class="review-stamp-time"><?= $date ?></div>
            <div class="review-stamp-full_name"><?= $customersFullNames[$i] ?></div>
            </p>
        </div>
    <?php
    }
    ?>

    <!-- $rating = '';
    $opinion = '';
    $time = ''; -->
<?php
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
        $assocResult = $result->fetch_assoc();
        $fullName = $assocResult['first_name'] . ' ' . $assocResult['last_name'];
        $customersFullNameArray[] = $fullName;
    }

    return $customersFullNameArray;
}
