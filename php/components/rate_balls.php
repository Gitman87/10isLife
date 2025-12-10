<?php
function genRateBalls($rate, $numberOfOpinions, $isReview = false, $url)
{
    $grayBallsNumber = 5 - round($rate);
?>
    <div class="rate">
        <ul class="rate-balls">
            <?php
            //orange balls
            for ($i = 0; $i < (5 - $grayBallsNumber); $i++) {
            ?>
                <li class="rate-balls-ball">
                    <img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img">
                </li>
            <?php
            };

            // gray balls
            for ($i = 0; $i < $grayBallsNumber; $i++) {
            ?>
                <li class="rate-balls-ball">
                    <img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img_gray">
                </li>
            <?php
            };
            ?>
        </ul>
        <?php
        if ($isReview) {
        ?>
            <div class="rate-opinions">
                <p class="rate-opinions-score">
                    <span class="rate-opinions-score-average"><?= $rate ?></span>/5
                </p>
            </div>
        <?php
        } else {
        ?>
            <div class="rate-opinions">
                <p class="rate-opinions-score">
                    <span class="rate-opinions-score-average"><?= $rate ?></span><span class="rate-opinions-score-of">/5</span>
                    <span class="rate-opinions-score-number">(<?= $numberOfOpinions ?><a href="<?= $url ?>" class="rate-opinions-score-number-link"> opinii</a>)</span>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
