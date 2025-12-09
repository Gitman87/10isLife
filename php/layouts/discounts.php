<?php
function genDiscounts()
{
    $tileBrowserData = array(1, 7, 23, 48, 55, 69, 74, 89)
?>
    <section class="discounts">
        <?php genTileBrowser($tileBrowserData, 'Obniżki cen')
        ?>
    </section>
<?php
}
