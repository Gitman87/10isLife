<?php


function genCheckoutForm($isLogged, $totalWeight, $totalVolume)
{
    $customer = [];
    if ($isLogged) {
        $customer = getCustomerData($_SESSION['user_id']);
    }
    // print_r($customer);
    $couriersData = getCouriersData();
    // print_r($couriersData);

    // echo $couriersData[1]['name'];
?>

    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/move_input_value.js" defer></script>
    <script src="./js/components/toggle_password.js" defer></script>
    <script src="./js/components/show_hide.js" defer></script>
    <!-- <script src="./js/components/reg_validation.js" defer></script> -->
    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/geo_widget.js" defer></script>
    <script src="./js/utilities/toggle_visibility.js" defer></script>
    <script src="./js/set_input_value.js"></script>





    <form action="./php/api/checkouting_address_data.php" class="checkout_address_form" id="checkout_address_form" method='POST'>
        <?php

        ?>
        <section class="checkout_address_form-personal_data">
            <h3 class="checkout_address_form-personal_data-title">Dane personale:</h3>
            <div class="checkout_address_form-personal_data-email_wrapper">
                <?php
                if ($isLogged) {
                    genInput('Email *', 'email', 'e_mail', 'email', $_SESSION['user_email']);
                } else {
                    genInput('Email *', 'email', 'e_mail', 'email');
                }
                ?>
                <p class="checkout_address_form-personal_data-email_wrapper_error_output"></p>
            </div>
            <div class="checkout_address_form-personal_data-name_wrapper">
                <?php
                if ($isLogged) {
                    genInput('Imię *', 'text', 'first_name', 'first_name', $_SESSION['user_name']);
                    genInput('Nazwisko *', 'text', 'last_name', 'last_name', $_SESSION['user_last_name']);
                } else {
                    genInput('Imię *', 'text', 'first_name', 'first_name');
                    genInput('Nazwisko *', 'text', 'last_name', 'last_name');
                }
                ?>
            </div>
            <p class="checkout_address_form-personal_data-name_wrapper-error_output"></p>

            <?php if (!$isLogged) {
                genInput('Załóż konto na te dane', 'checkbox', 'set_account', 'set_account');
            } ?>

            <div class="checkout_address_form-personal_data-password_wrapper hide_passwords ">
                <?php genPasswordInput('Hasło *', 'password', 'checkout_password', 'checkout_password') ?>
                <?php genPasswordInput('Potwierdź hasło *', 'password', 'confirm_checkout_password', 'confirm_checkout_password') ?>
                <p class="checkout_address_form-personal_data-password_wrapper-error_output"></p>

            </div>
            <?php
            ?>
        </section>
        <section class="checkout_address_form-address_data">
            <h3 class="checkout_address_form-address_data-title">Dane adresowe:</h3>

            <div class="checkout_address_form-address_data-street_wrapper">
                <?php
                //chek if customer has address in db
                if ($customer['street']) {
                    genInput('Ulica *', 'text', 'street', 'street',  $customer['street']);
                    genInput('Numer domu *', 'text', 'house_nr', 'house_nr',  $customer['house_nr']);
                } else {
                    genInput('Ulica *', 'text', 'street', 'street');
                    genInput('Numer domu *', 'text', 'house_nr', 'house_nr');
                }
                ?>
                <p class="checkout_address_form-address_data-street_wrapper-error_output"></p>
            </div>
            <div class="checkout_address_form-address_data-postal_wrapper">
                <?php
                $countries = ["Poland", "Germany", "Czech Republic", "Slovakia"];
                ?>
                <input type="hidden" id="set_address_check" name="set_address_check" value="">
                <?php
                if ($customer['street']) {
                    $customerCountry = $customer['country'];
                    array_unshift($countries, $customerCountry);
                    genInput('Kod pocztowy *', 'text', 'postal_code', 'postal_code',  $customer['postal_code']);
                    genSelectInput('select_country', 'Kraj:', $countries);
                ?>
                <?php
                } else {
                    genInput('Kod pocztowy *', 'text', 'postal_code', 'postal_code');
                    genSelectInput('select_country', 'Kraj:', $countries);
                }
                ?>
                <script>
                    setInputValue("set_address_check", "select_country");
                </script>
                <p class="checkout_address_form-address_data-postal_wrapper-error_output"></p>
                <?php genInput('Ustaw jako adres domowy ', 'checkbox', 'set_address', 'set_address') ?>
            </div>
            <div class="checkout_address_form-address_data-point_wrapper">
                <?php
                // '100 000 cm3 is the biggest volume of InPost parcel closet'
                if ($totalVolume < 100000) {
                    // echo 'volume is ' . $totalVolume;
                    genShow('Wybierz paczkomat', "openGeoWidget();toggleVisibility('parcel_point_div')");
                ?>

                    <div class="checkout_address_form-address_data-point_wrapper-input" id='parcel_point_div'>

                        <?php genInput('Podaj kod paczkomatu', 'text', 'parcel_point', 'parcel_point'); ?>
                    </div>
                    <p class="checkout_address_form-address_data-point_wrapper-error_output"></p>
                <?php
                } else {
                ?>
                    <p class="checkout_address_form-address_data-point_wrapper-volume_warning">Objętość <?= $totalVolume ?>cm3 zamówienia wyklucza paczkomat.</p>
                <?php
                } ?>

            </div>
        </section>

        <?php
        genCouriersSelect('Wybierz kuriera: ', $totalWeight, $isAbroad = false, $couriersData);
        ?>
    </form>

<?php
}
