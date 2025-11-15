<?php
function genLogging()
{
?>


    <form action="./php/api/logination.php" class="logging" id="logging" method='POST'>

        <?php genInput('Email', 'email', 'email', 'email') ?>
        <?php genPasswordInput('Hasło', 'password', 'log_password', 'log_password') ?>
        <p class="logging-error_output"></p>
        <?php genStandardButton("Zaloguj się", true, '') ?>

    </form>
    <script src="js/log_validation.js"></script>
<?php
}
