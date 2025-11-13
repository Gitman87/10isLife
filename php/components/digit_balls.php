<?php
function genDigitBalls($array, $name = 'digit_ball')
{
?>
    <ul class="digit_balls">
        <?php
        for ($i = 0; $i < count($array); $i++) {
            $id = $name . '_' . $array[$i]['value'];
            if ($i == 0) {
        ?>
                <!-- mark first ball as checked -->
                <li class="digit_balls-item">
                    <input type="radio" name="<?= $name ?>" id="<?= $id ?>" class="digit_balls-item-ball" value="<?= $array[$i]['value']  ?>" checked>
                    <label for="<?= $id ?>" class="digit_balls-item-label"><?= $array[$i]['value'] ?></label>
                </li>
            <?php
            } else {
            ?>
                <li class="digit_balls-item">
                    <input type="radio" name="<?= $name ?>" id="<?= $id ?>" class="digit_balls-item-ball" value="<?= $array[$i]['value'] ?>">
                    <label for="<?= $id ?>" class="digit_balls-item-label"><?= $array[$i]['value'] ?></label>
                </li>
            <?php
            }
            ?>

        <?php
        }
        ?>
    </ul>
<?php

}
