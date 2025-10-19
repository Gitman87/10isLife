<?php
include './php/layouts/footer.php';
include './php/layouts/header.php';
include './php/layouts/hero.php';
include './php/layouts/discounts.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

include './php/components/slideshow.php';
include './php/components/slide.php';
include './php/components/standard_button.php';
require './php/components/light_button.php';
include './php/components/wide_button.php';
include './php/components/ugly_button.php';


include './php/components/tile_browser.php';
include './php/components/tile.php';
include './php/components/breadcrumbs.php';
include './php/components/rate_balls.php';
include './php/components/product_preview.php';

require './php/api/connection.php';

require './php/api/get_product_data.php';

require './php/components/input.php';
require './php/components/logging.php';
require './php/layouts/register.php';


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
          <h3 class="dashboard-pulpit-header-title-name">products.name</h3>
          <div class="dashboard-pulpit-header-title-manufacturer">
            <img src="./res/img/brands/logo-babolat.webp" alt="" class="dashboard-pulpit-header-title-manufacturer-image">
            <h4 class="dashboard-pulpit-header-title-manufacturer-name"><a href="" class="dashboard-pulpit-header-title-manufacturer-name-link"> manufafturer.name</a></h4>
          </div>

        </div>
        <div class="dashboard-pulpit-header-rating">
          <?php genRateBalls() ?>
        </div>
        <div class="dashboard-pulpit-header-price">
          <p class="dashboard-pulpit-header-price-value">products.price<span class="dashboard-pulpit-header-price-value-currency">zł</span></p><span class="dashboard-pulpit-header-price-percent">clac%</span>
          <p class="dashboard-pulpit-header-price-before">Najniższa cena z 30 dni: <span class="dashboard-pulpit-header-price-before-value">products.last_price</span><span class="dashboard-pulpit-header-price-value-before-currency">zł</span></p>


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
          <ul class="dashboard-pulpit-variants-sizes-list">
            <li class="dashboard-pulpit-variants-sizes-list-size"><button class="dashboard-pulpit-variants-sizes-list-size-number">0</button> </li>
            <li class="dashboard-pulpit-variants-sizes-list-size"><button class="dashboard-pulpit-variants-sizes-list-size-number">1</button> </li>
            <li class="dashboard-pulpit-variants-sizes-list-size"><button class="dashboard-pulpit-variants-sizes-list-size-number">2</button> </li>
            <li class="dashboard-pulpit-variants-sizes-list-size"><button class="dashboard-pulpit-variants-sizes-list-size-number">3</button> </li>
            <li class="dashboard-pulpit-variants-sizes-list-size"><button class="dashboard-pulpit-variants-sizes-list-size-number">4</button> </li>
          </ul>

        </div>
        <div class="dashboard-pulpit-variants-length">
          <label for="length" class="dashboard-pulpit-variants-length-label">Długość [cm]:</label>
          <select name="length" id="" class="dashboard-pulpit-variants-length-select">
            <option value="67.3" class="dashboard-pulpit-variants-length-select-option">67.3</option>
            <option value="68.5" class="dashboard-pulpit-variants-length-select-option">68.5</option>
            <option value="69" class="dashboard-pulpit-variants-length-select-option">69</option>
            <option value="69.2" class="dashboard-pulpit-variants-length-select-option">69.2</option>
            <option value="69.5" class="dashboard-pulpit-variants-length-select-option">69.5</option>
            <option value="69.8" class="dashboard-pulpit-variants-length-select-option">69.8</option>
            <option value="70" class="dashboard-pulpit-variants-length-select-option">70</option>
          </select>

        </div>
        <div class="dashboard-pulpit-variants-pattern">
          <label for="pattern" class="dashboard-pulpit-variants-pattern-label">Układ strun:</label>
          <select name="pattern" id="" class="dashboard-pulpit-variants-pattern-select">
            <option value="16x17" class="dashboard-pulpit-variants-pattern-select-option">16x17</option>
            <option value="16x18" class="dashboard-pulpit-variants-pattern-select-option">16x18</option>
            <option value="16x19" class="dashboard-pulpit-variants-pattern-select-option">18x19</option>
            <option value="18x16" class="dashboard-pulpit-variants-pattern-select-option">18x16</option>
            <option value="18x19" class="dashboard-pulpit-variants-pattern-select-option">18x19</option>
            <option value="18x20" class="dashboard-pulpit-variants-pattern-select-option">18x20</option>
          </select>

        </div>

        <div class="dashboard-pulpit-variants-material">
          <label for="material" class="dashboard-pulpit-variants-material-label">Materiał:</label>
          <select name="material" id="" class="dashboard-pulpit-variants-material-select">
            <option value="aluminium" class="dashboard-pulpit-variants-material-select-option">Aluminium</option>
            <option value="grafit" class="dashboard-pulpit-variants-material-select-option">Grafit</option>
            <option value="kompozyt" class="dashboard-pulpit-variants-material-select-option">Kompozyt</option>

          </select>

        </div>
        <div class="dashboard-pulpit-variants-cover">
          <label for="cover" class="dashboard-pulpit-variants-cover-label">Pokrowiec:</label>
          <select name="cover" id="" class="dashboard-pulpit-variants-cover-select">
            <option value="brak" class="dashboard-pulpit-variants-cover-select-option">brak</option>
            <option value="3/4" class="dashboard-pulpit-variants-cover-select-option">3/4</option>
            <option value="pełny" class="dashboard-pulpit-variants-cover-select-option">Pełny</option>

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


</main>

<?php genFooter() ?>