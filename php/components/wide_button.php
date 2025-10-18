<?php
function genWideButton($title, $type = "button", $callback = '')
{
?>
    <button class="wide_button" type="<?= $type ?>" onclick="<?= $callback ?>">
        <div class="wide_button-wrapper">
            <span class="wide_button-wrapper-link"><?= $title ?></span>
        </div>

    </button>

<?php

}
