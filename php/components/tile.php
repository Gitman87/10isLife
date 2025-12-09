<?php


function genTile($id)
{
    $tileData = getTileData($id);
    // print_r($tileData);
?>

    <li class="tile">
        <img src="<?php echo $tileData['thumbnail']['url'] ?>" class="tile-img" alt="product photo">
        <div class="tile-discount"><?php echo $tileData['discount'] ?>%</div>
        <div class="tile-details">
            <p class="tile-details-name"><?php echo $tileData['name'] ?></p>
            <p class="tile-details-price"><span class="tile-details-price-new"><?php echo $tileData['price'] ?></span><del class="tile-details-price-old"><?php echo $tileData['last_price'] ?></del></p>

            <?php genRateBalls($tileData['rating_score'], count($tileData['reviews']), false, '') ?>
        </div>
    </li>

<?php
}
