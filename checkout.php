<?php
session_start();
if (!isset($_SESSION['verified_cart'])) {
    header("Location: cart.php");
    exit;
}
if (!isset($_SESSION['verified_cart']) || empty($_SESSION['verified_cart'])) {
    //    if user went here withut passing basket validation
    header("Location: basket.php?error=not_verified");
    exit();
} else {
}

$cart = $_SESSION['verified_cart'];
