<?php
function genDigitBalls($number)
{
?>
    <ul class="digit_balls">
        <?php
        for ($i = 0; $i < $number; $i++) {
        ?>
            <li class="digit_balls-ball"><button class="digit_balls-ball-button"><?= $i ?></button></li>

        <?php

        }
        ?>
    </ul>
<?php



}
