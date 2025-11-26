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
require './php/components/basket_item.php';
require './php/components/basket_item_list.php';

session_start();

?>
<?php genHeader() ?>

<main class="main">
    <section class="basket-items">
        <h2>Koszyk</h2>
        <div class="item-list">
            <article class="basket-item">
            </article>
        </div>
    </section>
    <aside class="basket-summary">
        <h3>Podsumowanie</h3>
        <dl class="summary-details">
            <dt>Suma:</dt>
            <dd></dd>

            <dt>Koszt Trasportu</dt>
            <dd>€5.00</dd>
            <dt class="total-label">Suma do zapłaty:</dt>
            <dd class="total-value">€154.97</dd>
        </dl>

        <button class="checkout-btn">Idź do kasy</button>

        <a href="/shop" class="continue-shopping">Kontynuuj zakupy</a>
    </aside>





    <script src="./js/cart_manager.js"></script>
    <script src="./js/basket_manager.js"></script>

</main>



<?php genFooter() ?>