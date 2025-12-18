<?php
require './php/layouts/head.php';

require './php/layouts/header.php';
require './php/layouts/footer.php';

require './php/components/header_link.php';
require './php/components/log_modal.php';
require './php/components/tab_nav.php';

require './php/components/standard_button.php';
require './php/components/light_button.php';
require './php/components/wide_button.php';
require './php/components/ugly_button.php';
require './php/components/show.php';
//logging /registration
require './php/layouts/register.php';
require './php/components/input.php';
require './php/components/password_input.php';
require './php/components/logging.php';
require './php/components/reg_policy.php';
require './php/components/profile.php';

require './php/layouts/checkout_list.php';
session_start();
if (!isset($_SESSION['verified_cart'])) {
    header("Location: cart.php");
    exit;
}
if (!isset($_SESSION['verified_cart']) || empty($_SESSION['verified_cart'])) {
    //    if user went here withut passing basket validation
    header("Location: basket.php?error=not_verified");
    exit();
}
$cart = $_SESSION['verified_cart'];
$totalSum = 0;
foreach ($cart as $item) {
    $totalSum += $item['total'];
}
// ------------------------page---------------------------------
?>
<?php genHeader() ?>
<main class="main_checkout">
    <h1 class="main_checkout-title">Złóż zamówienie</h1>
    <section class="main_checkout-products">
        <h3 class="main_checkout-products-title">Lista produktów</h3>
        <?php genCheckoutList($cart) ?>
        <strong class="main_checkout-products-sum">Suma: &nbsp<?= $totalSum ?>&nbsp;zł</stron>
    </section>
</main>
<?php genFooter() ?>