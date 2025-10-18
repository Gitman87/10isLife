<?php
function wideButton($title, $type = "button", $callback = '')
{
?>
    <button class="standard_button" type="<?= $type ?>" onclick="<?= $callback ?>">
        <div class="standard_button-wrapper">
            <span class="standard_button-wrapper-link"><?= $title ?></span>
        </div>

    </button>

<?php

}
