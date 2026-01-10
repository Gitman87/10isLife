<?php

function genShow($show, $callback = '')
{
?>
    <!-- <script src="./js/components/toggle_password.js"></script> -->
    <button class="show" class="show_button" type="button" onclick="<?= $callback ?>"><?= $show ?></button>

<?php
}
