<?php
function genRateBalls($rate, $numberOfOpinions, $isReview = false)
{
    $grayBallsNumber = 5 - $rate;
?>
    <div class="rate">
        <ul class="rate-balls">
            <?php
            for ($i = 0; $i < $rate; $i++) {
            ?>
                <li class="rate-balls-ball">
                    <img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img">
                </li>
            <?php
            };


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
                    <span class="rate-opinions-score-average"><?= $rate ?></span>
                    /5
                </p>
            </div>
        <?php
        } else {
        ?>
            <div class="rate-opinions">
                <p class="rate-opinions-score">
                    <span class="rate-opinions-score-average"><?= $rate ?></span>
                    /5
                </p>
                <span class="rate-opinions-number">(<?= $numberOfOpinions ?><a href="" class="rate-opinions-number-link"> opinii)</a></span>
            </div>
        <?php
        }
        ?>
    </div>


<?php
}
