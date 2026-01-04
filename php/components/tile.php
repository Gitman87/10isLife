<?php


function genTile($id)
{
    // echo "tutaj musi byc tile";
    $tileData = getTileData($id);
    // print_r($tileData);
?>
    <li class="tile">
        <a href="./product.php?id=<?php echo $tileData['product_id'] ?>" class="tile-link">
            <div class="tile-link-img_wrapper">
                <img src="<?php echo $tileData['thumbnail']['url'] ?>" class="tile-link-img_wrapper-img" alt="product photo">
            </div>
            <?php
            if ($tileData['discount'] != NULL) {
            ?>
                <div class="tile-link-discount"><?php echo $tileData['discount'] ?>%</div>
            <?php
            }
            ?>
            <div class="tile-link-details">
                <p class="tile-link-details-name"><?php echo $tileData['name'] ?></p>
                <p class="tile-link-details-price"><span class="tile-link-details-price-new"><?php echo $tileData['price'] ?>zł</span><del class="tile-link-details-price-old"><?php echo $tileData['last_price'] ?>zł</del></p>

                <?php genRateBalls($tileData['rating_score'], count($tileData['reviews']), false, '') ?>
            </div>
        </a>
    </li>
<?php
}
