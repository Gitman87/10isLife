<?php
function genLogModal()
{
    $titleArray = ["Rejestracja", "Logowanie"];
    $callbackArray = ["setActive(this)", "toggleLogReg(this)"];

?>
    <!-- <script src="./js/components/collapse_chain.js"></script> -->

    <dialog class="log_modal">
        <div class="log_modal-wrapper">
            <?php genTabNav($titleArray, TRUE, $callbackArray) ?>
            <!-- <nav class="log_modal-wrapper-nav">
                <button class="log_modal-wrapper-nav-register">Rejestracja</button>
                <button class="log_modal-wrapper-nav-log">Logowanie</button>

            </nav> -->
            <!-- <main class="log_modal-wrapper"> -->
            <!-- form -->

            <?php genLogging() ?>
            <?php genRegister() ?>



            <!-- </main> -->
            <!-- cancel button component -->
            <?php genUglyButton("Anuluj", TRUE, '', 'closeModal()') ?>
            <!-- <button class="log_modal-cancel" onclick="closeModal()">Anuluj</button> -->

        </div>




    </dialog>
<?php
}
