
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
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
include './php/product.php';



?>

  
  <?php genHeader()?>
 <main class="main">

  <?php genHero() ?>
  <section class="recommendation">
    <div class="recommendation-animation">
        <p class="recommendation-animation-text">
          <span  style="--i:1;">w</span>
          <span  style="--i:2;">s</span>
          <span  style="--i:3;">z</span>
          <span  style="--i:4;">y</span>
          <span  style="--i:5;">s</span>
          <span  style="--i:6;">t</span>
          <span  style="--i:7;">k</span>
          <span  style="--i:8;">o</span>
        </p>
        <div class="recommendation-animation-container">
          <img src="./res/icon/favicon.svg" alt="ball" class="recommendation-animation-container-ball">
        </div>
    </div>
    <div class="recommendation-paragraph">
      <div class="recommendation-paragraph-text">
      <p class="recommendation-paragraph-text-one">czego</p> 
      <p class="recommendation-paragraph-text-two">chcesz</p>
      </div>
      
      <img src="./res/img/djoko_signature.webp" alt="djoko signature" class="recommendation-paragraph-signature">
    </div>
    <img src="./res/img/djoko.jpg" alt="" class = "recommendation-background">

   </section>
   <?php genDiscounts() ?>

  
</main>
  
  <?php genFooter() ?>

