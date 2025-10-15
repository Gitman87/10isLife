<?php
function genLogModal()
{
    $titleArray = ["Rejestracja", "Logowanie"];
    $callbackArray = ["elo", "mordo"];
?>
    <dialog class="log_modal">
        <div class="log_modal-wrapper">
            <?php genTabNav($titleArray, TRUE, $callbackArray) ?>
            <!-- <nav class="log_modal-wrapper-nav">
                <button class="log_modal-wrapper-nav-register">Rejestracja</button>
                <button class="log_modal-wrapper-nav-log">Logowanie</button>

            </nav> -->
            <main class="log_modal-wrapper">
                <!-- form -->
            </main>
            <!-- cancel button component -->
            <?php genLightButton("Anuluj", TRUE, '', 'closeModal()') ?>
            <!-- <button class="log_modal-cancel" onclick="closeModal()">Anuluj</button> -->

        </div>




    </dialog>
<?php
}
