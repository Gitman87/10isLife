<?php
require './php/api/connection.php';
include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/hero.php';
include './php/layouts/discounts.php';
require './php/layouts/gen_register.php';

include './php/components/header_link.php';
include './php/components/slideshow.php';
include './php/components/slide.php';
include './php/components/standard_button.php';
include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/breadcrumbs.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
require './php/components/input.php';


require './php/api/get_product_data.php';



$prodData = getProductData(1);
?>

  
  <?php genHeader()?>
  <?php genBreadCrumbs()?>
    <main class="main">

    <?php genRegister() ?>
    </main>
  <?php genFooter() ?>