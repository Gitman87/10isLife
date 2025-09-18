<?php
function genStandardButton($title, $url, $callback){
    ?>

        <button class="standard_button" onclick="<?=$callback?>">
        <div class="standard_button-wrapper">
            <a href="<?=$url?>" class="standard_button-wrapper-link"><?=$title?></a>
        </div>
        </button>
    <?php
}