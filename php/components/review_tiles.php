<?php
function genReviewTiles($prodReviews)
{
    $customersIds = [];
    foreach ($prodReviews as $id) {
        $customersIds[] = $id['customer_id'];
    }
    // echo $prodReviews
    echo 'Customers ids are: ' . $customersIds[0];
    $customersFullNames = customerFullName(array_keys($customersIds));
?>
    <section class="reviews">
        <?php
        for ($i = 0; $i < count($prodReviews); $i++) {
        ?>
            <div class="review">
                <?= genRateBalls($prodReviews[$i]['rating'], count($prodReviews), true) ?>;
                <p class="review-opinion"><?= $prodReviews[$i]['opinion'] ?></p>
                <p class="review-stamp">
                    <span class="review-stamp-time"><?= $prodReviews[$i]['review_date'] ?></span>
                    <span class="review-stamp-full_name"><?= $customersFullNames[$i] ?></span>
                </p>
            </div>
        <?php
        }
        ?>
    </section>
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
