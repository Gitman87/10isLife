<?php
function genDigitBalls($array)
{
?>
    <ul class="digit_balls">
        <?php
        for ($i = 0; $i < count($array); $i++) {
        ?>
            <li class="digit_balls-ball"><button class="digit_balls-ball-button"><?= $array[$i]['value'] ?></button></li>
        <?php
        }
        ?>
    </ul>
<?php

}
