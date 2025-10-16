<?php
function genLogging()
{
?>

    <section class="logging">
        <h1 class="logging-header">Logowanie użytkownika</h1>

        <form action="./php/api/registration.php" method='POST'>

            <?php genInput('Email', 'email', 'email', 'email') ?>
            <?php genInput('Hasło', 'password', 'password', 'password') ?>

            <?php genStandardButton("Zaloguj się", true, '', '') ?>

        </form>

    </section>


<?php
}
