<?php
function genCheckoutForm($isLogged, $isAddress)
{
?>
    <form action="./php/api/registration.php" class="checkout_form" id="register" method='POST'>
        <h3 class="checkout_form-personal_data_title">Dane personalne:</h3>
        <hr>
        <div class="checkout_form-email_wrapper">
            <?php genInput('Email *', 'email', 'checkout_email', 'checkout_email') ?>
            <p class="checkout_form-email_wrapper-error_output error_output"></p>
        </div>
        <div class="checkout_form-name_wrapper">
            <?php genInput('Imię *', 'text', 'checkout_name', 'checkout_name') ?>
            <p class="checkout_form-name_wrapper-error_output error_output"></p>
        </div>
        <div class="checkout_form-last_name_wrapper">
            <?php genInput('Nazwisko *', 'text', 'checkout_last_name', 'checkout_last_name') ?>
            <p class="checkout_form-last_name_wrapper-error_output error_output"></p>
        </div>
        <!-- //address    -->
        <h3 class="checkout_form-address_title">Adres dostawy:</h3>
        <hr>
        <div class="checkout_form-address_wrapper">
            <?php genInput('Nazwisko *', 'text', 'last_name', 'last_name') ?>




        </div>




        <div class="checkout_form-company_wrapper">
            <p class="checkout_form-company_wrapper-ask">
                Wystawić fakturę<span><?php genShow("Tak", "showHide(this, 'Tak','Zwiń','tax_number')") ?></span>
            </p>
            <?php genInput('Twój NIP', 'text', 'tax_number', 'tax_number') ?>
            <p class="checkout_form-company_wrapper-error_output error_output"></p>
        </div>
        <?php genRegPolicy() ?>





    </form>
<?php
}
