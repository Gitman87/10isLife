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
