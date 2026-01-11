<?php
function genNumberInput($label, $id, $name, $value = 1, $max = 5)
{
?>

    <div class="number_input_wrapper">

        <label class="number_input_wrapper-label" for="<?= $id ?>"><?= $label ?></label>

        <div class="number_input_wrapper-number_input">
            <input type="hidden" class="number_input_wrapper-number_input-input" min="1" max="<?= $max ?>" step="1" name="<?= $name ?>" id="<?= $id ?>" value="<?= $value ?>">
            <button type="button" class="number_input_wrapper-number_input-minus_button">
                -
            </button>
            <div class="number_input_wrapper-number_input-value_wrapper">

                <span class="number_input_wrapper-number_input-value_wrapper-value"><?= $value ?></span>
            </div>
            <button type="button" class="number_input_wrapper-number_input-plus_button">
                +
            </button>
        </div>
    </div>

<?php


}
