<?php

function genDigitBalls($rawVariants,  $name = 'digit_ball', $currentValue = null)
{
    $uniqueVariants = [];
    $seenValues = [];

    foreach ($rawVariants as $variant) {
        $value = (string)$variant['value'];

        if (!isset($seenValues[$value])) {
            $uniqueVariants[] = [
                'attribute_variant_id' => $variant['attribute_variant_id'],
                'value' => $value,
            ];
            $seenValues[$value] = true;
        }
    }
    if ($currentValue === null && !empty($uniqueVariants)) {
        $currentValue = $uniqueVariants[0]['value'];
    }
?>
    <ul class="digit_balls">
        <?php foreach ($uniqueVariants as $variant):
            $value = $variant['value'];
            $id = $name . '_' . str_replace(['.', ',', ' '], ['_'], $value);

            $isChecked = ($value == (string)$currentValue) ? 'checked' : '';
        ?>
            <li class="digit_balls-item">
                <input
                    type="radio"
                    name="<?= $name ?>"
                    id="<?= $id ?>"
                    class="digit_balls-item-ball"
                    value="<?= $value ?>"
                    data-variant-id="<?= $variant['attribute_variant_id'] ?>"
                    <?= $isChecked ?>>
                <label for="<?= $id ?>" class="digit_balls-item-label"><?= $value ?></label>
            </li>
        <?php endforeach; ?>
    </ul>
<?php
}
?>