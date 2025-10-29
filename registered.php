<?php

include './php/layouts/head.php';

?>


<?php
session_start();
$userName = $_SESSION['user_name'];

?>




<?php genHead('10isLife') ?>


<body>

    <div class="registered">
        <h1 class="registered-success">Sukces!</h1>
        <img src="./res/img/djocovic_congrats.webp" class="registered-img" alt="djovovic congrats">
        <h2 class="registered-member">Gratulacje <?= $userName ?>. Jesteś teraz członkiem <span class="registered-member-ten">10is</span>Life.</h2>
        <p class="registered-para">Zostaniesz automatycznie przekierowan(a)y na strone główna za <span class="registered-para-counter"></span> sekundy.
        </p>
    </div>

    <script src="js/registered_timeout.js"></script>
</body>

</html>