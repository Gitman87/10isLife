<?php
function genReviewTiles($prodReviews)
{
    $customersIds = [];
    foreach ($prodReviews as $id) {
        $customersIds[] = $id['customer_id'];
    }
    // for($i; i$< count($prodReviews);$i++){
    //     $customersIds[] =
    // }
    // echo var_dump($customersIds)
    // print_r(array_keys($customersIds));
    // echo $prodReviews
    // echo 'Customers ids are: ' . $customersIds[0];
    // $customersFullNames = customerFullName($customersIds);
    // print_r($customersFullNames);
?>

    <?php
    foreach ($prodReviews as $prodReview) {
    ?>
        <?php $dateArray = explode(' ', $prodReview['review_date']);
        array_pop($dateArray);
        $date = implode($dateArray);
        $fullName = $prodReview['first_name'] . ' ' . $prodReview['last_name'];




        ?>
        <div class="review">

            <div class="review-head">
                <?= genRateBalls($prodReview['rating'], count($prodReviews), true) ?>
            </div>
            <p name="" id="" class="review-text"><?= $prodReview['opinion'] ?></p>
            <!-- <p class="review-opinion">/p> -->
            <div class="review-stamp">

                <div class="review-stamp-time"><?= $date ?></div>
                <div class="review-stamp-full_name"><?= $fullName ?></div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- $rating = '';
    $opinion = '';
    $time = ''; -->
<?php
}
// function customerFullName($idArray)
// {
//     global $user, $host, $password, $db_name;
//     // Create connection
//     $conn = new mysqli($host, $user, $password, $db_name);
//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
//     $customersFullNameArray = [];
//     for ($i = 0; $i < count($idArray); $i++) {
//         $stmt = $conn->prepare("SELECT first_name, last_name FROM customers WHERE customer_id=?");
//         if (!$stmt) {
//             die("statement error" . $conn->error);
//         }
//         // echo ($idArray[0]);
//         $stmt->bind_param("s", $idArray[$i]);
//         $stmt->execute();
//         $result = $stmt->get_result();
//         $assocResult = $result->fetch_assoc();
//         $fullName = $assocResult['first_name'] . ' ' . $assocResult['last_name'];
//         $customersFullNameArray[] = $fullName;
//     }

//     return $customersFullNameArray;
// }
