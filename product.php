<?php
include './php/layouts/head.php';

include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/discounts.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

// include './php/components/slideshow.php';
// include './php/components/slide.php';a
include './php/components/standard_button.php';
require './php/components/light_button.php';
include './php/components/wide_button.php';
include './php/components/ugly_button.php';
include './php/components/show.php';

//logging /registration
require './php/layouts/register.php';
require './php/components/input.php';
require './php/components/password_input.php';
require './php/components/logging.php';
require './php/components/reg_policy.php';
require './php/components/profile.php';



include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
// api
require './php/api/connection.php';
require './php/api/get_product_data.php';
require './php/api/get_reviews.php';
require './php/api/reviewing.php';

//prod info
// require './php/components/digit_balls.php';
require './php/components/discount_display.php';
require './php/components/review_tiles.php';

session_start();
$prodId = $_GET['id'];
$prodData = getProductData($prodId);
$prodName = $prodData['name'];
$reviewData = getReviews($prodId);
$prodPrice = $prodData['price'];
$stockQuantity = $prodData['quantity'];
$prodThumbnailUrl = '';
foreach ($prodData['images'] as $image) {
  if (isset($image['is_thumbnail']) && $image['is_thumbnail'] === 1) {
    $prodThumbnailUrl  = $image['url'];
    break;
  };
};
$prodDataJson = json_encode($prodData);
?>
<?php genHeader() ?>
<main class="main">
  <!-- <script src="/js/components/magnifier.js"></script> -->
  <script src="/js/cart_manager.js" defer></script>
  <section class="dashboard">
    <?php genProductPreview($prodData['images'], $prodThumbnailUrl) ?>
    <div class="dashboard-pulpit">
      <div class="dashboard-pulpit-header">
        <div class="dashboard-pulpit-header-new_best">
          <?php
          if ($prodData['is_new']) {
          ?>
            <img src="./res/icon/new.svg" alt="nowość" title="Nowość" class="dashboard-pulpit-header-new_best-new_img">
          <?php
          } elseif ($prodData['is_bestseller']) {
          ?>
            <img src="./res/icon/trophy.svg" alt="bestseller" title="Bestseller" class="dashboard-pulpit-header-new_best-bestseller_img">
          <?php
          }
          ?>
        </div>
        <?php genRateBalls($prodData['rating_score'], count($prodData['reviews']), false, '#opinions') ?>
        <div class="dashboard-pulpit-header-title">
          <h3 class="dashboard-pulpit-header-title-name"><?= $prodData['name'] ?></h3>
          <div class="dashboard-pulpit-header-title-manufacturer">
            <img src="<?= $prodData['manufacturer']['url'] ?>" alt="" class="dashboard-pulpit-header-title-manufacturer-image">
            <h4 class="dashboard-pulpit-header-title-manufacturer-name"><a href="" class="dashboard-pulpit-header-title-manufacturer-name-link"><?= $prodData['manufacturer']['name'] ?></a></h4>
          </div>
        </div>
        <div class="dashboard-pulpit-header-price">
          <div class="dashboard-pulpit-header-price-value">
            <?= $prodData['price'] ?>
            <span class="dashboard-pulpit-header-price-value-currency">zł</span>
            <?php displayDiscount($prodData['discount']) ?>
          </div>
          <p class="dashboard-pulpit-header-price-before">Najniższa cena z 30 dni: <span class="dashboard-pulpit-header-price-before-value">
              <?= $prodData['last_price'] ?></span>
            <span class="dashboard-pulpit-header-price-value-before-currency">zł</span>
          </p>
        </div>
      </div>
      <hr class="dashboard-pulpit-line">
      <div class="dashboard-pulpit-variants">
        <h4 class="dashboard-pulpit-variants-title">Opcje:</h4>
        <div class="dashboard-pulpit-variants-sizes">
          <?php
          if ($prodData['variant_type'] === 'basic') {
          ?>
            <div class="dashboard-pulpit-variants-grip_size">
              <label for="grip_size" class="dashboard-pulpit-variants-grip_size-label">Grubość uchwytu:</label>
              <p class="dashboard-pulpit-variants-grip_size-value"><?= $prodData['grip_size']['value'] ?></p>
            </div>
            <div class="dashboard-pulpit-variants-length">
              <label for="length" class="dashboard-pulpit-variants-length-label">Długość [cm]:</label>
              <p class="dashboard-pulpit-variants-length-value"><?= $prodData['length']['value'] ?></p>
            </div>
          <?php
          } else {
          ?>
            <div class="dashboard-pulpit-variants-sizes-size">Grubość uchwytu:
              <div class="dashboard-pulpit-variants-sizes-size-show">Tabela rozmiarów</div>
              <table class="dashboard-pulpit-variants-sizes-size-table hide ">
                <thead>
                  <tr>
                    <th>Oznaczenia amerykańskie
                      [cale / ≈ cm]</th>
                    <th>Oznaczenia europejskie</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>4 / ≈ 10</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>4 1/8 / ≈ 10,4</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>4 1/4 / ≈ 10,8</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>4 3/8 / ≈ 11</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>4 1/2 / ≈ 11,4</td>
                    <td>4</td>
                  </tr>
                </tbody>
              </table>
            </div>

        </div>
        <div class="dashboard-pulpit-variants-length">
          <p class="dashboard-pulpit-variants-length-title">Długość [cm]:</p>

        </div>
      <?php
          }
      ?>
      <div class="dashboard-pulpit-variants-pattern">
        <label for="pattern" class="dashboard-pulpit-variants-pattern-label">Układ strun:</label>
        <p class="dashboard-pulpit-variants-pattern-value"><?= $prodData['grid_pattern']['value'] ?></p>
      </div>
      <div class="dashboard-pulpit-variants-material">
        <label for="material" class="dashboard-pulpit-variants-material-label">Materiał:</label>
        <p class="dashboard-pulpit-variants-material-value"><?= $prodData['material']['value'] ?></p>
      </div>
      <div class="dashboard-pulpit-variants-cover">
        <label for="cover" class="dashboard-pulpit-variants-cover-label">Pokrowiec:</label>
        <p class="dashboard-pulpit-variants-cover-value"><?= $prodData['cover']['value'] ?></p>
        </select>
      </div>
      </div>
      <hr class="dashboard-pulpit-line">
      <div class="dashboard-pulpit-add">
        <div class="dashboard-pulpit-add-amount">
          <input type="hidden" class="dashboard-pulpit-add-amount-stock_quantity_input" value=<?= $prodData['quantity'] ?>>
          <?php
          if ($prodData['variant_type'] === 'basic') {
          ?>
            <input type="number" class="dashboard-pulpit-add-amount-quantifier" name="quantifier" id="quantifier" value=1 min=1 max=<?= $prodData['quantity'] ?>>
          <?php
          } else {
          ?>
            <label for="quantifier" class="dashboard-pulpit-add-amount-label">Ilość:</label>
            <input type="number" class="dashboard-pulpit-add-amount-quantifier" name="quantifier" id="quantifier" value=0 min=0 max=0>
          <?php
          }
          ?>
        </div>
        <div class="dashboard-pulpit-add-availability">
          <?php
          if ($prodData['variant_type'] === 'config') {
          ?>
            <p class="dashboard-pulpit-add-availability-message">Skonfiguruj produkt, aby sprawdźić jego dostępność.</p>
            <img class="dashboard-pulpit-add-availability-ball" src="./res/icon/favicon.svg" alt="ball">
            <?php genStandardButton('Do koszyka', true,  '', "addProductToCart(makeCartItem($prodId, '$prodName', $prodPrice, '$prodThumbnailUrl') );updateBasketNumber('cart')"); ?>

            <input type="hidden" id="myHiddenField" name="field_name" value="the_value_to_submit">
          <?php
          } elseif ($prodData['quantity'] > 5) {
          ?>
            <p class="dashboard-pulpit-add-availability-message">Produkt dostępny</p>
            <img class="dashboard-pulpit-add-availability-ball" src="./res/icon/favicon.svg" alt="ball">
            <?php genStandardButton('Do koszyka', true,  '', "addProductToCart(makeCartItem($prodId, '$prodName', $prodPrice, '$prodThumbnailUrl') );updateBasketNumber('cart')"); ?>
          <?php
          } elseif ($prodData['quantity'] > 0) {
          ?>
            <p class="dashboard-pulpit-add-availability-message">Uwaga! Zostało mniej niż 5 szt.</p>
            <img class="dashboard-pulpit-add-availability-ball" src="./res/icon/favicon.svg" alt="ball">
            <?php genStandardButton('Do koszyka', true, '', "addProductToCart(makeCartItem($prodId, '$prodName', $prodPrice, '$prodThumbnailUrl') );updateBasketNumber('cart')"); ?>
          <?php
          } else {
          ?>
            <p class="dashboard-pulpit-add-availability-unavailable">Produkt niedostępny</p>
          <?php
          }
          ?>
        </div>
        <!-- <button class="dashboard-pulpit-add-button">Do koszyka</button> -->
      </div>
    </div>
  </section>
  <section class="description">
    <h2 class="description-head">Opis</h2>
    <p class="description-text"><?= $prodData['description'] ?></p>
  </section>
  <section class="warranty">
    <h3 class="warranty-head">Gwarancja</h3>
    <h4 class="warranty-time">Ten produkt objęty jest gwarancją na okres &nbsp;
      <span class="warranty-time-number"> <?= $prodData['warranty']['time'] ?> </span> miesięcy.
    </h4>
    <p class="warranty-text"><?= $prodData['warranty']['description'] ?></p>
  </section>
  <section class="opinions" id="opinions">
    <h3 class="opinions-head">Recenzje klientów</h3>
    <form action="/php/api/reviewing.php" method="POST" class="opinions-write">
      <div class="opinions-write-rate_wrapper">
        <label for="" class="opinions-write-rate_wrapper-new_rate_label">Twoja ocena</label>
        <input type="number" name="new_rate" id='new_rate' class="opinions-write-rate_wrapper-new_rate" min=1 max=5 value=5>
      </div>
      <div class="opinions-write-review_wrapper">
        <label for="new_review" class="opinions-write-review_wrapper-new_review_label">Napisz recencję</label>
        <textarea name="new_review" class="opinions-write-review_wrapper-new_review" id="new_review" maxlength="600" required></textarea>
        <?php
        if ($_SESSION['user_name']) {
        ?>
          <p class="opinions-write-review_wrapper-agreement">*Przesyłając opinię zgadzasz się na upublicznienie swojego imienia i nazwiska.</p>
        <?php
          genStandardButton('Prześlij', true);
        } else {
        ?>
          <p class="opinions-write-review_wrapper-not_logged hide_textarea ">Musisz być zalogowany, żeby napisać recenzję.</p>
        <?php
        };
        ?>
      </div>
      <p class="opinions-write-error_output"></p>
      <input type="hidden" name="prod_id" value="<?= $prodId ?>">
    </form>
    <div class="opinions-wrapper">
      <?= genReviewTiles($reviewData) ?>
    </div>
  </section>
  <script>
    console.log("prodData loaded");
    const prodDataJson = JSON.parse(<?php echo json_encode($prodDataJson); ?>);
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof prodConfig === 'function') {
        prodConfig();
      }
    });
  </script>
  <script src="./js/product_config.js"></script>
  <script src="./js/write_review.js"></script>
  <script src="./js/cart_anim.js"></script>
</main>
<?php genFooter() ?>