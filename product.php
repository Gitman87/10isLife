<?php
include './php/layouts/head.php';

include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/discounts.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

// include './php/components/slideshow.php';
// include './php/components/slide.php';
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
include './php/components/breadcrumbs.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';
// api
require './php/api/connection.php';
require './php/api/get_product_data.php';
//prod info
require './php/components/digit_balls.php';

session_start();
$prodData = getProductData(1);
?>

<?php genHeader() ?>
<?php genBreadCrumbs() ?>
<main class="main">
  <section class="dashboard">
    <?php genProductPreview($prodData['images']) ?>
    <div class="dashboard-pulpit">
      <div class="dashboard-pulpit-header">
        <div class="dashboard-pulpit-header-title">
          <h3 class="dashboard-pulpit-header-title-name"><?= $prodData['name'] ?></h3>
          <div class="dashboard-pulpit-header-title-manufacturer">
            <img src="<?= $prodData['manufacturer']['url'] ?>" alt="" class="dashboard-pulpit-header-title-manufacturer-image">
            <h4 class="dashboard-pulpit-header-title-manufacturer-name"><a href="" class="dashboard-pulpit-header-title-manufacturer-name-link"><?= $prodData['manufacturer'][0] ?></a></h4>
          </div>

        </div>
        <div class="dashboard-pulpit-header-rating">
          <?php genRateBalls() ?>
        </div>
        <div class="dashboard-pulpit-header-price">
          <p class="dashboard-pulpit-header-price-value"><?= $prodData['price'] ?><span class="dashboard-pulpit-header-price-value-currency">zł</span></p><span class="dashboard-pulpit-header-price-percent"><?= $prodData['discount'] ?>%</span>
          <p class="dashboard-pulpit-header-price-before">Najniższa cena z 30 dni: <span class="dashboard-pulpit-header-price-before-value"><?= $prodData['last_price'] ?></span><span class="dashboard-pulpit-header-price-value-before-currency">zł</span></p>
        </div>
      </div>
      <div class="dashboard-pulpit-variants">
        <h5 class="dashboard-pulpit-variants-title">Opcje:</h5>
        <div class="dashboard-pulpit-variants-slideshow">
          <ul class="dashboard-pulpit-variants-slideshow-list">
            <li class="dashboard-pulpit-variants-slideshow-list-variant"><a href="" class="dashboard-pulpit-variants-slideshow-list-variant-link"><img src="./res/img/products/rackets/babolat/babolat_pure_aero/140468_babolat_01.jpg" alt="" class="dashboard-pulpit-variants-slideshow-list-variant-link-image" title="attribute_name"></a></li>
          </ul>
        </div>
        <div class="dashboard-pulpit-variants-sizes">
          <div class="dashboard-pulpit-variants-sizes-show">Rozmiar:<span class="dashboard-pulpit-variants-sizes-show-table">Tabela rozmiarów</span></div>
          <?= genDigitBalls($prodData['grip_size']) ?>

        </div>
        <div class="dashboard-pulpit-variants-length">
          <label for="length" class="dashboard-pulpit-variants-length-label">Długość [cm]:</label>
          <?= genDigitBalls($prodData['length']) ?>


        </div>
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
          <p class="dashboard-pulpit-variants-cover-value"><?= $prodData['material']['value'] ?></p>

          </select>

        </div>
        <div class="dashboard-pulpit-variants-add">
          <div class="dashboard-pulpit-variants-add-amount">
            <button class="dashboard-pulpit-variants-add-amount-minus">-</button>
            <div class="dashboard-pulpit-variants-add-amount-value">0</div>
            <button class="dashboard-pulpit-variants-add-amount-lus">+</button>

          </div>
          <!-- <button class="dashboard-pulpit-add-button">Do koszyka</button> -->

          <?php genStandardButton('Do koszyka', true,  '', '') ?>

        </div>

      </div>


    </div>


  </section>
  <section class="description">
    <h2 class="description-tile">Opis</h2>
    <p class="description-text"><?= $prodData['description']['description'] ?></p>
  </section>



</main>

<?php genFooter() ?>