<?php
function genLogging()
{
?>



    <form action="./php/api/registration.php" class="logging" method='POST'>

        <?php genInput('Email', 'email', 'email', 'email') ?>
        <?php genPasswordInput('Hasło', 'password', 'log_password', 'log_password') ?>

        <?php genStandardButton("Zaloguj się", true, '', '') ?>

    </form>




<?php
}
