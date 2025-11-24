<?php
function genProductPreview($images, $thumbnailUrl)
{
  $safeThumbnailUrl = htmlspecialchars($thumbnailUrl, ENT_QUOTES, 'UTF-8');
?>
  <div class="product_preview">
    <div class="product_preview-preview">
      <!-- <img src="res/img/products/rackets/Babolat/100_babolat_01.webp" alt="" class="product_preview-preview-image"> -->
      <img src="<?= $safeThumbnailUrl ?>" alt="product preview" class="product_preview-preview-image" id="magnified_image">
    </div>
    <div class="product_preview-slideshow">
      <ul class="product_preview-slideshow-list"> <!-- images will be dynamically added froom db -->
        <?php
        foreach ($images as $image) {
        ?>
          <li class="product_preview-slideshow-list-slide"><button class="product_preview-slideshow-list-slide-button"><img src="<?= $image['url'] ?>" alt="product image" class="product_preview-slideshow-list-slide-button-image"></button></li>

        <?php
        }

        ?>
      </ul>
    </div>
  </div>
  <script src="/js/components/product_preview.js"></script>
  <!-- <script src="/js/components/magnifier.js"></script> -->
<?php
}
