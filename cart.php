<?php
include './php/layouts/head.php';

include './php/layouts/header.php';
include './php/layouts/footer.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

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
// api
require './php/api/connection.php';
require './php/api/get_product_data.php';

//cart

session_start();

?>
<?php genHeader() ?>

<main class="main_basket">
    <section class="basket_content">
        <h2 class="basket_content-title">Koszyk</h2>
        <ul class="basket_content-list">
        </ul>
    </section>
    <aside class="basket_summary">
        <h3 class="basket_summary-title">Podsumowanie</h3>
        <dl class="basket_summary-details">
            <dt class="basket_summary-details-term">Ilość produktów:</dt>
            <dd class="basket_summary-details-quantity"></dd>
            <dt class="basket_summary-details-term">Suma:</dt>
            <dd class="basket_summary-details-sum"></dd>
        </dl>
        <?php genStandardButton("Do kasy", $is_button = false, $url = './kasa', $callback = '') ?>
        <?php genLightButton("Kontynuuj zakupy", $is_button = FALSE, $url = './last_visited_site') ?>
    </aside>
    <script src="./js/local_storage_manager.js"></script>
    <script src="./js/cart_manager.js"></script>
    <script src="./js/basket_manager.js"></script>
</main>
<?php genFooter() ?>