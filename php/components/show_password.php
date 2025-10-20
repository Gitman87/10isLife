<?php

function genShowPassword($show, $callback = '')
{
?>
    <!-- <script src="./js/components/toggle_password.js"></script> -->
    <button class="show_password" type="button" onclick=<?= $callback ?>><?= $show ?></button>

<?php
}
