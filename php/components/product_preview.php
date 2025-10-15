<?php
function genProductPreview($images)
{
  $thumbnailSrc = '';
  foreach ($images as $image) {
    if ($image['is_thumbnail'] == 1) {

      $thumbnailSrc = $image['url'];
    }
  }
?>
  <div class="product_preview">
    <div class="product_preview-preview">
      <!-- <img src="res/img/products/rackets/Babolat/100_babolat_01.webp" alt="" class="product_preview-preview-image"> -->
      <img src="<?= $thumbnailSrc  ?>" alt="product preview" class="product_preview-preview-image">

    </div>
    <div class="product_preview-slideshow">
      <ul class="product_preview-slideshow-list"> <!-- images will be dynamically added froom db -->
        <?php
        foreach ($images as $image) {
        ?>

          <li class="product_preview-slideshow-list-slide"><img src="<?= $image['url'] ?>" alt="product image" class="product_preview-slideshow-list-slide-image"></li>

        <?php
        }

        ?>



      </ul>

    </div>

  </div>

<?php
}
