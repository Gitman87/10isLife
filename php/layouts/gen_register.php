

<?php 
function genRegister(){
?>

<section class="register" >
        <h1 class="register-header">Zarejestruj się</h1>

        <form action="./php/api/registration.php" method='POST'>
           <?php genInput('Imię', 'text', 'first_name', 'first_name')?>
           <?php genInput('Nazwisko', 'text', 'last_name', 'last_name')?>
           <?php genInput('Email', 'email', 'email', 'email')?>
           <?php genInput('Hasło', 'password', 'password', 'password')?>
           <?php genInput('Potwierdź hasło', 'password', 'confirm_password', 'confirm_password')?>
            <?php genStandardButton("Zarejestruj",true, '', '')?>
            
        </form>

    </section>


<?php
}
