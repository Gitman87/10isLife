<?php
function genProfile()
{


?>
    <dialog class="profile_modal">
        <div class="profile_modal-wrapper">

            <img src="/res/img/avatar.webp" class="profile_modal-wrapper-avatar" alt="avatar">
            <p class="profile_modal-wrapper-name">
                <?= $_SESSION['user_name'] ?>
                <span class="profile_modal-wrapper-name-last_name">
                    <?= $_SESSION['user_last_name'] ?>
                </span>
            </p>
            <p class="profile_modal-wrapper-email">
                <?= $_SESSION['user_email'] ?>
            </p>
            <?php genLightButton("OK", true, '', 'closeProfile()') ?>
            <?php genUglyButton("Wyloguj", false, '/logout.php', '') ?>
        </div>
    </dialog>
    <!-- <script src="./js/components/profile.js"></script> -->

<?php
}
