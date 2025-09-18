<?php
function genTile($tile){
    ?>
       <li class="tile">
                <img src="<?php echo $tile['img'] ?>" class="tile-img" alt="product photo">
                <div class="tile-discount"><?php echo $tile['discount%'] ?></div>
                <div class="tile-details">
                    <p class="tile-details-name"><?php echo $tile['productName'] ?></p>
                    <p class="tile-details-price"><span class="tile-details-price-new"><?php echo $tile['newPrice'] ?></span><del class="tile-details-price-old"><?php echo $tile['oldPrice'] ?></del></p>
                    <div class="tile-details-rate">
                        <ul class="tile-details-rate-balls">
                            <li class="tile-details-rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="tile-details-rate-balls-ball-img"></li>
                            <li class="tile-details-rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="tile-details-rate-balls-ball-img"></li>
                            <li class="tile-details-rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="tile-details-rate-balls-ball-img"></li>
                            <li class="tile-details-rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="tile-details-rate-balls-ball-img"></li>
                            <li class="tile-details-rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="tile-details-rate-balls-ball-img"></li>
                        </ul>
                        <p class="tile-details-rate-opinions">(<span class="tile-details-rate-opinions-number"><?php echo $tile['opinionNumber'] ?></span>)</p>
                    </div>

                </div>
             
            </li>
           <?php
        }