<?php

function genCheckoutForm($isLogged)
{
    $customer = [];
    if ($isLogged) {
        $customer = getCustomerData($_SESSION['user_id']);
    }
    // print_r($customer);

?>

    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/move_input_value.js" defer></script>
    <script src="./js/components/toggle_password.js" defer></script>
    <script src="./js/components/show_hide.js" defer></script>
    <!-- <script src="./js/components/reg_validation.js" defer></script> -->
    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/geo_widget.js" defer></script>
    <script src="./js/utilities/toggle_visibility.js" defer></script>









    <section class="checkout_form-invoice_data">
        <?php genInput('Wystaw fakture *', 'checkbox', 'invoice_checkbox', 'invoice_checkbox') ?>

    <?php
}
