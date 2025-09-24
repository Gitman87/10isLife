
<?php
include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/hero.php';
include './php/layouts/discounts.php';

include './php/components/header_link.php';
include './php/components/slideshow.php';
include './php/components/slide.php';
include './php/components/standard_button.php';
include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/breadcrumbs.php';
include './php/components/rate_balls.php';
?>

  
  <?php genHeader()?>
  <?php genBreadCrumbs()?>
 <main class="main">
  <section class="dashboard">
    <div class="dashboard-view">
      <div class="dashboard-view-main">
          <img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_01.webp" alt="" class="dashboard-view-main-image">
      </div>
      <div class="dashboard-view-slideshow"> 
        <ul class="dashboard-view-slideshow-list">  <!-- images will be dynamically added froom db -->
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_02.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_03.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_04.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
          <li class="dashboard-view-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="dashboard-view-slideshow-list-slide-image"></li>
        </ul>

      </div>

    </div>
    <div class="dashboard-pulpit">
      <div class="dashboard-pulpit-header">
        <div class="dashboard-pulpit-header-title">
          <h3 class="dashboard-pulpit-header-title-name">Babolat Pure Aero</h3>
          <div class="dashboard-pulpit-header-title-manufacturer">
            <img src="./res/img/brands/logo-babolat.webp" alt="" class="dashboard-pulpit-header-title-manufacturer-image">
            <h4 class="dashboard-pulpit-header-title-manufacturer-name">Babolat</h4>
          </div>
          <div class="dashboard-pulpit-header-rating">
            <?php genRateBalls() ?>
          </div>
        </div>
      </div>

    </div>


  </section>

  
</main>
  
  <?php genFooter() ?>

