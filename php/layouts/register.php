<?php
function genRegister()
{
?>



    <form action="./php/api/registration.php" class="register" method='POST'>
        <div class="register-email_wrapper">

            <?php genInput('Email', 'email', 'email', 'email') ?>
            <?php genStandardButton("Przejdź dalej", TRUE, '', '') ?>;

        </div>
        <div class="register-password_wrapper">

            <?php genInput('Hasło', 'password', 'password', 'password') ?>
            <?php genInput('Potwierdź hasło', 'confirm_password', 'confirm_password', 'confirm_password') ?>
            <?php genStandardButton("Przejdź dalej", TRUE, '', '') ?>;
        </div>
        <div class="register-name_wrapper">
            <?php genInput('Imię', 'text', 'first_name', 'first_name') ?>
            <?php genInput('Nazwisko', 'text', 'last_name', 'last_name') ?>
            <?php genStandardButton("Przejdź dalej", TRUE, '', '') ?>;

        </div>
        <div class="register-summary">
            <h3>Check your data and submit</h3>
            <?php genInput('Email', 'email', 'email', 'email') ?>
            <?php genInput('Hasło', 'password', 'password', 'password') ?>
            <h4>Zaakceptuj regulaminy</h4>


            <?php genStandardButton("Zarejestruj", true, '', '') ?>
        </div>

    </form>




<?php
}
