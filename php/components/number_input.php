<?php
function genNumberInput($label, $id, $name, $value = 1)
{
?>

    <div class="number_input_wrapper">

        <label class="number_input_wrapper-label" for="<?= $id ?>"><?= $label ?></label>
        <div class="number_input_wrapper-number_input" min="1" max="5" step="1" value="1" id="<?= $id ?>" name="<?= $name ?>">
            <button type="button" class="number_input_wrapper-number_input-minus_button">
                <span class="number_input_wrapper-number_input-minus_button-minus">-</span>
            </button>
            <div class="number_input_wrapper-number_input-value_wrapper">
                <span class="number_input_wrapper-number_input-value_wrapper-value"><?= $value ?></span>
            </div>
            <button type="button" class="number_input_wrapper-number_input-plus_button">
                <span class="number_input_wrapper-number_input-plus_button-plus">+</span>
            </button>
        </div>
    </div>

<?php


}
