<?php
function genCheckoutForm($isLogged, $isAddress)
{
?>
    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/move_input_value.js" defer></script>
    <script src="./js/components/toggle_password.js" defer></script>
    <script src="./js/components/show_hide.js" defer></script>
    <script src="./js/components/reg_validation.js" defer></script>
    <form action="./php/api/checkouting_address_data.php" class="checkout_form" id="checkout_form" method='POST'>
        <h3 class="checkout_form-personal_data_title">Dane personalne:</h3>

        <div class="register-summary">
            <div class="register-summary-inputs">
                <?php
                if ($isLogged) {

                    genInput('Imię *', 'text', 'first_name', 'first_name', $_SESSION['user_name']);
                    genInput('Nazwisko *', 'text', 'last_name', 'last_name', $_SESSION['user_last_name']);
                    genInput('Email *', 'email', 'e_mail', 'email', $_SESSION['user_email']);
                } else {
                    genInput('Imię *', 'text', 'first_name', 'first_name');
                    genInput('Nazwisko *', 'text', 'last_name', 'last_name');
                    genInput('Email *', 'email', 'e_mail', 'email');
                    genInput('Użyj danych do rejestracji', 'checkbox', 'policy', 'policy');
                    genPasswordInput('Hasło *', 'password', 'password', 'password');

                    genShow("Zaakceptuj regulamin", "showHide(this, 'Przeczytaj','Zwiń','reg_policy')");
                    genRegPolicy();
                }


                ?>


                <p class="register-summary-inputs-output error_output"></p>

            </div>

            <div class="register-summary-company">
                <p class="register-summary-company-ask">
                    Prowadzisz firmę?<span><?php genShow("Tak", "showHide(this, 'Tak','Zwiń','tax_number')") ?></span>
                </p>
                <?php genInput('Twój NIP', 'text', 'tax_number', 'tax_number') ?>
                <p class="register-summary-company-output error_output"></p>
            </div>
            <!--zrób checkbpxpa do zaakceptowani regulaminu-->
            <div class="register-summary-policy">
                <div class="register-summary-policy-wrapper">
                    <?php genInput('Zaakceptuj regulamin *', 'checkbox', 'policy', 'policy') ?>
                    <span><?php genShow("Przeczytaj", "showHide(this, 'Przeczytaj','Zwiń','reg_policy')") ?></span>
                    <p class="register-summary-policy-wrapper-output error_output"></p>

                </div>
                <?php genRegPolicy() ?>
            </div>
            <?php genStandardButton("Zarejestruj", true, '', '') ?>
        </div>

    </form>
<?php
}
