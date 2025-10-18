<?php
function genRegister()
{
?>

    <script src="./js/components/collapse_chain.js"></script>

    <form action="./php/api/registration.php" class="register" method='POST'>
        <div class="register-email_wrapper">

            <?php genInput('Email', 'email', 'email', 'email') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register')") ?>

        </div>
        <div class="register-password_wrapper">

            <?php genInput('Hasło', 'password', 'password', 'password') ?>
            <?php genInput('Potwierdź hasło', 'confirm_password', 'confirm_password', 'confirm_password') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register')") ?>


        </div>
        <div class="register-name_wrapper">
            <?php genInput('Imię', 'text', 'first_name', 'first_name') ?>
            <?php genInput('Nazwisko', 'text', 'last_name', 'last_name') ?>
            <?php genWideButton("Przejdź dalej", "button", "collapseChain(this, 'register')") ?>



        </div>
        <div class="register-summary">
            <h3 class="register-summary">Check your data and submit</h3>
            <ul class="register-summary-list">
                <li class="register-summary-list-item"><span class="register-summary-list-item-check">email</span></li>
                <li class="register-summary-list-item"><span class="register-summary-list-item-check">password</span></li>
                <li class="register-summary-list-item"><span class="register-summary-list-item-check">first name</span></li>
                <li class="register-summary-list-item"><span class="register-summary-list-item-check">last name</span></li>
                <li class="register-summary-list-item"><span class="register-summary-list-item-check"></span></li>

            </ul>
            <?php genInput('Płeć', 'radio', 'sex', 'sex') ?>
            <?php genInput('Twój NIP', 'text', 'first_name', 'first_name') ?>
            <!--zrób checkbpxpa do zaakceptowani regulaminu-->
            <h4>Zakceptuj regulaminy</h4>


            <?php genStandardButton("Zarejestruj", true, '', '') ?>
        </div>

    </form>



<?php
}
