<?php
function genProductPreview($images){
    ?>
   <div class="product_preview">
      <div class="product_preview-preview">
          <img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_01.webp" alt="" class="product_preview-preview-image">
      </div>
      <div class="product_preview-slideshow"> 
        <ul class="product_preview-slideshow-list">  <!-- images will be dynamically added froom db -->
          <?php 
          foreach($images as $image){
            ?>

            <li class="product_preview-slideshow-list-slide"><img src="<?=$image['url']?>" alt="" class="product_preview-slideshow-list-slide-image"></li>

            <?php 
          }
          
            ?>
          
          
          <!-- <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_02.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_03.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_04.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li>
          <li class="product_preview-slideshow-list-slide"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/101479_babolat_05.webp" alt="" class="product_preview-slideshow-list-slide-image"></li> -->
        </ul>

      </div>

    </div>

    <?php
}