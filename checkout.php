<?php
require './php/layouts/head.php';

// require './php/layouts/header.php';
// require './php/layouts/footer.php';
require './php/layouts/checkout_list.php';
require './php/layouts/checkout_address_data.php';
require './php/layouts/checkout_couriers.php';

require './php/components/header_link.php';
require './php/components/log_modal.php';
require './php/components/tab_nav.php';

require './php/components/standard_button.php';
require './php/components/light_button.php';
require './php/components/wide_button.php';
require './php/components/ugly_button.php';
require './php/components/show.php';
//logging /registration
// require './php/layouts/register.php';
require './php/components/input.php';
require './php/components/select_input.php';
require './php/components/password_input.php';
require './php/components/logging.php';
require './php/components/reg_policy.php';
require './php/components/profile.php';

require './php/api/get_customer_data.php';
require './php/api/checkouting_address_data.php';
require './php/api/get_couriers_data.php';


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
//checks if user logged
$isLogged = !empty($_SESSION['user_name']);
$cart = $_SESSION['verified_cart'];
$totalSum = 0;
$totalWeight = 0;
$totalVolume = 0;
$totalQuantity = 0;


foreach ($cart as $item) {
    $totalSum += $item['total'];
    $totalWeight += ($item['weight_kg'] * $item['quantity']);
    $totalVolume += $item['volume'];
    $totalQuantity += $item['quantity'];
}
$_SESSION['totalSum'] = $totalSum;
$_SESSION['totalWeight'] = $totalWeight;
$_SESSION['totalVolume'] = $totalVolume;
$_SESSION['totalQuantity'] = $totalQuantity;
// ------------------------page---------------------------------
?>
<?php genHead('10isLife') ?>

<body>
    <h1 class="checkout_title">Złóż &nbsp zamówienie</h1>
    <main class="main_checkout">
        <div class="main_checkout-content">

            <section class="main_checkout-content-products">
                <h3 class="main_checkout-content-products-list_title">Lista produktów</h3>
                <?php genCheckoutList($cart) ?>
            </section>
            <section class="main_checkout-content-register">
                <?php
                genCheckoutForm($isLogged, $totalWeight, $totalVolume, $totalSum);

                ?>
            </section>
        </div>
        <aside class="main_checkout-summary">

            <img src="./res/icon/Logo 1.0.svg" class="main_checkout-summary-logo" alt="10islife" title="10isLife logo">
            <h2 class="main_checkout-summary-title">Kasa</h2>
            <dl class="main_checkout-summary-details">
                <dt class="main_checkout-summary-details-term">Ilość produktów: </dt>
                <dd class="main_checkout-summary-details-quantity"><strong><?= $totalQuantity ?></strong></dd>
                <dt class="main_checkout-summary-details-term">Suma: </dt>
                <dd class="main_checkout-summary-details-sum"><strong> <?= $totalSum ?></strong> zł brutto</dd>
            </dl>
            <div class="main_checkout-summary-buttons">
                <?php genStandardButton("Przejdź do płatności", true, '', '') ?>
            </div>
        </aside>
    </main>


</body>