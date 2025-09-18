<?php
function genHeaderLink($title, $url){
    ?>
   <li class="header_link">
                        <a href="<?=$url?>" class="header_link-link"><?=$title?></a>
    </li>

    <?php
}