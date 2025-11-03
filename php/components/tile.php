<?php
function genTile($tile)
{
?>
    <li class="tile">
        <img src="<?php echo $tile['img'] ?>" class="tile-img" alt="product photo">
        <div class="tile-discount"><?php echo $tile['discount%'] ?></div>
        <div class="tile-details">
            <p class="tile-details-name"><?php echo $tile['productName'] ?></p>
            <p class="tile-details-price"><span class="tile-details-price-new"><?php echo $tile['newPrice'] ?></span><del class="tile-details-price-old"><?php echo $tile['oldPrice'] ?></del></p>

            <?php genRateBalls(3, 5) ?>


        </div>

    </li>
<?php
}
