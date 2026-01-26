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
session_start();

?>


<?php genHeader() ?>
<main class="main">

  <?php

  $slideShowData = array(

    array(
      'header' => 'Najlepsza odzież!',
      'details' => 'Stylowe i funkcjonalne ciuchy.',
      'img' => '../res/img/odziez.webp',
      'url' => './clothes.php'
    ),
    array(
      'header' => 'Najlepsze rakiety!',
      'details' => 'Unikatowe modele renomowanych producentów',
      'img' => '../res/img/rakiety.webp',
      'url' => './rackets.php'

    ),
    array(
      'header' => 'Najlepsze buty!',
      'details' => 'Na każdy rodzaj nawierzchni.',
      'img' => '../res/img/buty.webp',
      'url' => './shoes.php'

    ),
    array(
      'header' => 'Najlepsze piłki!',
      'details' => 'Żeby było co podkręcać.',
      'img' => '../res/img/pilki.webp',
      'url' => './balls.php'

    ),
    array(
      'header' => 'Najlepsze akcesoria',
      'details' => 'Zbyś mógł skupić się tylko  na grze',
      'img' => '../res/img/akcesoria.webp',
      'url' => './accessories.php'

    ),

  );

  genHero($slideShowData) ?>
  <?php genRecommendation() ?>
  <?php genDiscounts() ?>


</main>

<?php genFooter() ?>