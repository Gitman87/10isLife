<?php
session_start();
$userName = $_SESSION['user_name'];

?>




<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10isLife Rejestracja zakończona</title>
</head>

<body>
    <script src="js/registered_timeout.js"></script>
    <h1>Rejestracja zakończona sukcesem</h1>
    <h2>Kongratulacje, <?= $userName ?>. Jesteś teraz członkiem 10isLife for life </h2>

</body>

</html>