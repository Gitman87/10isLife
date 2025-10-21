<?php
function genRegister()
{
?>

    <script src="./js/components/collapse_chain.js" defer></script>
    <script src="./js/components/move_input_value.js" defer></script>
    <script src="./js/components/toggle_password.js" defer></script>
    <script src="./js/components/show_hide.js" defer></script>


    <form action="./php/api/registration.php" class="register" id="register" method='POST'>
        <div class="register-email_wrapper">
            <!-- dummy button to prevent Enter from submitting the form -->
            <button type="submit" style="display: none;" disabled aria-hidden="true"></button>

            <?php genInput('Email', 'email', 'pre_email', 'pre_email') ?>
            <?php genWideButton("Przejdź dalej", "pre_email_button", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_email', 'email')") ?>

        </div>
        <div class="register-password_wrapper">
            <?php genPasswordInput('Hasło', 'password', 'pre_password', 'pre_password') ?>
            <?php genPasswordInput('Potwierdź hasło', 'password', 'pre_confirm_password', 'confirm_password') ?>
            <?php genWideButton("Przejdź dalej", "pre_password_button", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_password', 'password')") ?>
        </div>
        <div class="register-name_wrapper">
            <?php genInput('Imię', 'text', 'pre_first_name', 'pre_first_name') ?>
            <?php genInput('Nazwisko', 'text', 'pre_last_name', 'pre_last_name') ?>
            <?php genWideButton("Przejdź dalej", "pre_name_button", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_first_name', 'first_name');inputMoveValue('register', 'pre_last_name', 'last_name')") ?>
        </div>
        <div class="register-summary">
            <h3 class="register-summary">Sprawdź swoje dane:</h3>
            <div class="register-summary-inputs">
                <?php genInput('Imię', 'text', 'first_name', 'first_name') ?>
                <?php genInput('Nazwisko', 'text', 'last_name', 'last_name') ?>
                <?php genInput('Email', 'email', 'email', 'email') ?>
                <?php genPasswordInput('Hasło', 'password', 'password', 'password') ?>
            </div>
            <div class="register-summary-sex">
                <p class="register-summary-sex-ask">
                    Jak mamy się do Ciebie zwracać?
                </p>
                <?php genInput('Pan', 'radio', 'man', 'sex') ?>
                <?php genInput('Pani', 'radio', 'woman', 'sex') ?>

            </div>

            <div class="register-summary-company">
                <p class="register-summary-company-ask">
                    Prowadzisz firmę?<span><?php genShow("Tak", "showHide(this, 'Tak','Zwiń','tax_number')") ?></span>
                </p>
                <?php genInput('Twój NIP', 'text', 'tax_number', 'tax_number') ?>
            </div>
            <!--zrób checkbpxpa do zaakceptowani regulaminu-->
            <div class="register-summary-policy">
                <div class="register-summary-policy-wrapper">
                    <?php genInput('Zaakceptuj regulamin', 'checkbox', 'policy', 'policy') ?>
                    <span><?php genShow("Przeczytaj", "showHide(this, 'Przeczytaj','Zwiń','reg_policy')") ?></span>
                </div>
                <?php genRegPolicy() ?>

            </div>

            <?php genStandardButton("Zarejestruj", true, '', '') ?>
        </div>

    </form>



<?php
}
