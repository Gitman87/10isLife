<?php
function genNewProducts()
{
    $tileBrowserData = array(20, 38, 55, 61, 72, 82, 95)
?>
    <section class="new_products">
        <?php genTileBrowser($tileBrowserData, 'Nowości')
        ?>
    </section>
<?php
}
