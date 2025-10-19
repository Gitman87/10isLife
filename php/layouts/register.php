<?php
function genRegister()
{
?>

    <script src="./js/components/collapse_chain.js"></script>
    <script src="./js/components/move_input_value.js"></script>
    <form action="./php/api/registration.php" class="register" id="register" method='POST'>
        <div class="register-email_wrapper">

            <?php genInput('Email', 'email', 'pre_email', 'email') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_email', 'email')") ?>

        </div>
        <div class="register-password_wrapper">

            <?php genInput('Hasło', 'password', 'pre_password', 'password') ?>
            <?php genInput('Potwierdź hasło', 'password', 'confirm_password', 'confirm_password') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_password', 'password')") ?>
        </div>
        <div class="register-name_wrapper">
            <?php genInput('Imię', 'text', 'pre_first_name', 'first_name') ?>
            <?php genInput('Nazwisko', 'text', 'pre_last_name', 'last_name') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register');inputMoveValue('register', 'pre_first_name', 'first_name');inputMoveValue('register', 'pre_last_name', 'last_name')") ?>



        </div>
        <div class="register-summary">
            <h3 class="register-summary">Sprawdź swoje dane:</h3>
            <div class="register-summary-inputs">
                <?php genInput('Imię', 'text', 'first_name', 'first_name') ?>
                <?php genInput('Nazwisko', 'text', 'last_name', 'last_name') ?>
                <?php genInput('Email', 'email', 'email', 'email') ?>
                <?php genInput('Hasło', 'password', 'password', 'password') ?>

            </div>
            <div class="register-summary-sex">
                <p class="register-summary-sex-ask">
                    Jak mamy się do Ciebie zwracać?
                </p>
                <?php genInput('Pan', 'radio', 'sex', 'sex') ?>
                <?php genInput('Pani', 'radio', 'sex', 'sex') ?>

            </div>

            <div class="register-summary-company">
                <p class="register-summary-company-ask">
                    Prowadzisz firmę?
                </p>
                <?php genInput('Twój NIP', 'text', 'tax_number', 'tax_number') ?>
            </div>
            <!--zrób checkbpxpa do zaakceptowani regulaminu-->
            <div class="register-summary-policy">
                <?php genInput('Zaakceptuj regulamin', 'checkbox', 'first_name', 'first_name') ?>
                <?php genRegPolicy() ?>

            </div>

            <?php genStandardButton("Zarejestruj", true, '', '') ?>
        </div>

    </form>



<?php
}
