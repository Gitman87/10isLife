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
require './php/api/get_prod_browser_data.php';

// require './php/api/get_tile_data.php';

//new products
require './php/layouts/new_products.php';
//browser
require './php/layouts/prod_browser.php';
session_start();
?>
<?php genHeader() ?>
<main class="main">
    <main class="main">

        <?php

        $slideShowData = array(

            array(
                'header' => 'Babolat',
                'details' => 'Francuskie przedsiębiorstwo zajmujące się produkcją sprzętu tenisowego. Produkuje m.in. rakiety tenisowe, buty, naciągi do rakiet tenisowych czy też odzież tenisową. ',
                'img' => '../res/img/brands/large-res/babolat.webp',
                'url' => 'https://www.youtube.com/@babolat'
            ),
            array(
                'header' => 'Dunlop',
                'details' => 'Dunlop jest jednym z najstarszych producentów tenisowych. Za ich produktami przemawia przede wszystkim jakość, co zauważyć można w proponowanych piłkach.',
                'img' => '../res/img/brands/large-res/dunlop.webp',
                'url' => 'https://www.youtube.com/@DunlopSports'

            ),
            array(
                'header' => 'Head',
                'details' => 'Około trzydzieści procent zawodników z pierwszej setki rankingu ATP używa rakiet tej marki w tym tacy gracze jak Novak Djokovic.',
                'img' => '../res/img/brands/large-res/head.webp',
                'url' => 'https://www.youtube.com/@headtennis'

            ),
            array(
                'header' => 'Pacific',
                'details' => ' Marka PACIFIC powstała z połączenia firm Fisher Tennis & Racket Division w 2009 roku.',
                'img' => '../res/img/brands/large-res/pacific.webp',
                'url' => 'https://www.youtube.com/@PacificTennis'

            ),
            array(
                'header' => 'Prokennex',
                'details' => 'Firma skupia się na tym aspekcie swoich produktów, promując się jako „firma naukowo-projektowa”, a nie standardowy producent rakiet.',
                'img' => '../res/img/brands/large-res/prokennex.webp',
                'url' => 'https://prokennex.com/'

            ),
            array(
                'header' => 'Wilson',
                'details' => 'ZWilson na arenie międzynarodowej to wiodący producent sprzętu sportowego dla dyscyplin, w których „liczy się piłka".',
                'img' => '../res/img/brands/large-res/wilson.webp',
                'url' => 'https://www.youtube.com/@WilsonRacquet'

            ),
            array(
                'header' => 'Yonex',
                'details' => 'Yonex to marka, która łączy japońską precyzję z innowacyjnym podejściem do projektowania sprzętu sportowego.',
                'img' => '../res/img/brands/large-res/yonex.webp',
                'url' => 'https://www.youtube.com/@yonexcom'

            ),

        );

        genHero($slideShowData) ?>

    </main>

</main>
<?php genFooter() ?>