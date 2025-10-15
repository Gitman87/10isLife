<?php
function genLightButton($title, $is_button = FALSE, $url = '', $callback = '')
{
    if ($is_button) {
?>
        <button class="light_button" onclick="<?= $callback ?>">
            <div class="light_button-wrapper">
                <span class="light_button-wrapper-link"><?= $title ?></span>
            </div>

        </button>
    <?php
    } else {
    ?>
        <div class="light_button" onclick="<?= $callback ?>">
            <div class="light_button-wrapper">
                <a href="<?= $url ?>" class="light_button-wrapper-link"><?= $title ?></a>
            </div>
        </div>
<?php
    }
}
