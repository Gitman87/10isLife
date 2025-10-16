<?php
include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/hero.php';
include './php/layouts/discounts.php';
include './php/layouts/recommendation.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';


//logging /registration
require './php/layouts/gen_register.php';
require './php/components/input.php';
require './php/components/logging.php';

include './php/components/slideshow.php';
include './php/components/slide.php';

include './php/components/standard_button.php';
include './php/components/light_button.php';
include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
include './php/product.php';



?>


<?php genHeader() ?>
<main class="main">

  <?php genHero() ?>
  <?php genRecommendation() ?>
  <?php genDiscounts() ?>


</main>

<?php genFooter() ?>