<?php
function genLogging()
{
?>



    <form action="./php/api/registration.php" class="logging" method='POST'>

        <?php genInput('Email', 'email', 'email', 'email') ?>
        <?php genInput('Hasło', 'password', 'password', 'password') ?>

        <?php genStandardButton("Zaloguj się", true, '', '') ?>

    </form>




<?php
}
