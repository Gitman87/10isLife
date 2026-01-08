<?php


function genCheckoutForm($isLogged, $isAddress)
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

    <form action="./php/api/checkouting_address_data.php" class="checkout_form" id="checkout_form" method='POST'>
        <?php

        ?>
        <section class="checkout_form-personal_data">
            <h4 class="checkout_form-personal_data-title">Dane personale:</h4>
            <div class="checkout_form-personal_data-email_wrapper">
                <?php
                if ($isLogged) {
                    genInput('Email *', 'email', 'e_mail', 'email', $_SESSION['user_email']);
                } else {
                    genInput('Email *', 'email', 'e_mail', 'email');
                }
                ?>
                <p class="checkout_form-personal_data-email_wrapper_error_output"></p>
            </div>
            <div class="checkout_form-personal_data-name_wrapper">
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
            <p class="checkout_form-personal_data-name_wrapper-error_output"></p>
            <?php
            ?>
        </section>
        <section class="checkout_form-address_data">
            <h4 class="checkout_form-address_data-title">Dane adresowe:</h4>

            <div class="checkout_form-address_data-street_wrapper">
                <?php
                if ($isLogged) {
                    genInput('Ulica *', 'text', 'street', 'street',  $customer['street']);
                    genInput('Numer domu *', 'text', 'house_nr', 'house_nr',  $customer['house_nr']);
                } else {
                    genInput('Ulica *', 'text', 'street', 'street');
                    genInput('Numer domu *', 'text', 'house_nr', 'house_nr');
                }

                ?>
                <p class="checkout_form-address_data-street_wrapper-error_output"></p>
            </div>
            <div class="checkout_form-address_data-postal_wrapper">
                <?php
                if ($isLogged) {
                    genInput('Kod pocztowy *', 'text', 'postal_code', 'postal_code',  $customer['postal_code']);
                    genInput('Kraj *', 'text', 'country', 'country',  $customer['country']);
                } else {
                    genInput('Kod pocztowy *', 'text', 'postal_code', 'postal_code');
                    genInput('Kraj *', 'text', 'country', 'country');
                }
                ?>
                <p class="checkout_form-address_data-postal_wrapper-error_output"></p>

            </div>

        </section>


        </section>
        <?php

        ?>




    </form>
<?php
}
