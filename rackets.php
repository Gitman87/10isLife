<?php
include './php/layouts/head.php';
include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/hero.php';
include './php/layouts/discounts.php';
include './php/layouts/recommendation.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

// include './php/components/breadcrumbs.php';

//logging /registration
require './php/layouts/register.php';
require './php/components/input.php';
require './php/components/password_input.php';
require './php/components/logging.php';
require './php/components/reg_policy.php';
require './php/components/profile.php';

include './php/components/slideshow.php';
include './php/components/slide.php';

include './php/components/standard_button.php';
include './php/components/light_button.php';
include './php/components/wide_button.php';
include './php/components/ugly_button.php';
include './php/components/show.php';

include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
//product
include './php/product.php';
include './php/api/get_reviews.php';
include './php/api/reviewing.php';
//cart
// require './php/cart.php';
//api
require './php/api/get_tile_data.php';
require './php/api/connection.php';
// require './php/api/get_tile_data.php';

//new products
require './php/layouts/new_products.php';
session_start();
?>
<?php genHeader() ?>
<main class="main">
    <?php genNewProducts() ?>
</main>
<?php genFooter() ?>