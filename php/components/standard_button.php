<?php
function genStandardButton($title, $is_button = false, $url = '', $callback = '')
{
    if ($is_button) {
?>
        <button class="standard_button" onclick="<?= $callback ?>">
            <div class="standard_button-wrapper">
                <span class="standard_button-wrapper-link"><?= $title ?></span>
            </div>

        </button>
    <?php
    } else {
    ?>
        <div class="standard_button" onclick="<?= $callback ?>">
            <div class="standard_button-wrapper">
                <a href="<?= $url ?>" class="standard_button-wrapper-link"><?= $title ?></a>
            </div>
        </div>
<?php
    }
}
