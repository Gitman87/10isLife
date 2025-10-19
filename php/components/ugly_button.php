<?php
function genUglyButton($title, $is_button = false, $url = '', $callback = '')
{ {
        if ($is_button) {
?>
            <button class="ugly_button" onclick="<?= $callback ?>">
                <div class="ugly_button-wrapper">
                    <span class="ugly_button-wrapper-link"><?= $title ?></span>
                </div>

            </button>
        <?php
        } else {
        ?>
            <div class="ugly_button" onclick="<?= $callback ?>">
                <div class="ugly_button-wrapper">
                    <a href="<?= $url ?>" class="ugly_button-wrapper-link"><?= $title ?></a>
                </div>
            </div>
<?php
        }
    }
}

?>