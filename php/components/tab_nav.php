<?php
function genTabNav($titleArray, $is_button = false, $callbackArray = [], $urlArray = [])
{

    $length = count($titleArray);
?>


    <nav class="tab_nav">


        <?php
        for ($i = 0; $i < $length; $i++) {

            if ($is_button) {

                // genTabbutton();

        ?>
                <button class="tab_nav-button" type="button" data-tab_nav-button-number="<?= $i ?>" onclick="<?= $callbackArray[$i] ?>">
                    <?= $titleArray[$i] ?>

                </button>
            <?php
            } else {
            ?>


                <a href="<?= $urlArray[$i] ?>" class="tab_nav-button"><?= $titleArray[$i] ?></a>



        <?php
            }
        }
        ?>
    </nav>
    <script src="./js/components/toggle_tab_nav.js"></script>
<?php

}
