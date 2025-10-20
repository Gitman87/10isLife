<?php

function genPasswordInput($label, $type, $id, $name)
{

?>

    <div class="password_input">
        <label for="<?= $id ?>"><?= $label ?></label>

        <div class="password_input-wrapper">
            <input type="<?= $type ?>" id="<?= $id ?>" name="<?= $name ?>" />
            <?php genShowPassword('Pokaż', "togglePassword(this,'Pokaż','UKRYJ','$id')") ?>
        </div>
    </div>

<?php


}
?>