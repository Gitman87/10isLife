<?php

include './php/components/breadcrumbs.php';


function genHeader()
{
    $headerConf = array(
        array('Rakiety', './123'),
        array('Odzież', './123'),
        array('Buty', './123'),
        array('Piłki', './123'),
        array('Akcesoria', './123'),
        array('Marki', './123'),
    )
?>
    <?php genHead('10isLife') ?>

    <body>
        <script src='./js/components/toggle_log_modal.js'></script>
        <!-- <script src='./js/components/open_profile.js'></script> -->
        <script src="./js/components/profile.js"></script>
        <header class="header">
            <div class="header-content breakpoint">
                <img src="./res/icon/Logo 1.0.svg" class="header-content-logo" alt="10islife" title="10isLife logo">
                <form action='/search' method='get' class="header-content-search">
                    <label for="search" class="header-content-search-label hidden">Szukaj</label>
                    <input type="search" name="search" id="search" class="header-content-search-input" placeholder="Szukaj...">
                    <button type='submit' class="header-content-search-button">
                        <img src="./res/icon/racket.svg" class="header-content-search-button-img" alt="search icon" title="znajdź">
                    </button>
                </form>
                <img src="./res/icon/burger.svg" class="header-content-burger " alt="burger menu">
                <nav class="header-content-nav">
                    <ul class="header-content-nav-list">
                        <?php
                        foreach ($headerConf as $row) {
                            genHeaderLink($row[0], $row[1]);
                        }
                        ?>
                    </ul>
                </nav>
                <div class="header-content-account">
                    <div class="header-content-account-user">
                        <img src="./res/icon/person.svg" class="header-content-account-user-person" alt="user">
                        <?php
                        if ($_SESSION['user_name']) {
                        ?>
                            <button class="header-content-account-user-login" onclick="openProfile()"><?= $_SESSION['user_name'] ?></button>
                        <?php
                        } else {
                        ?>
                            <button class="header-content-account-user-login" onclick="openModal();setStartForm('logging')">Login</button>
                        <?php
                        }
                        ?>
                    </div>
                    <?php genProfile() ?>
                    <?php genLogModal() ?>
                    <button class="header-content-account-shopping" onclick="saveCurrentAddress('address') ">
                        <a href="cart.php" class="header-content-account-shopping-basket_link">
                            <img src="./res/icon/basket.svg" class="header-content-account-shopping-basket_link-basket" alt="basket">
                            <div class="header-content-account-shopping-basket_link-number">
                                0
                            </div>
                        </a>
                    </button>
                </div>
            </div>
        </header>
        <?php echo  genBreadcrumbs() ?>
        <script src="./js/components/breadcrumbs_move.js"></script>
        <!-- <script src="./js/local_storage_manager.js"></script> -->
        <script src="./js/save_address.js"></script>
    <?php
}
