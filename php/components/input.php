<?php 
function genInput($label, $type, $id, $name){
    ?>
    <div class="input">
    <label for="<?=$id?>"><?=$label?></label>
    <input type="<?=$type?>" id="<?=$id?>" name="<?=$name?>"/>
    </div>

    <?php


}