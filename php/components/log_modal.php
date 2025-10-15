<?php
function genLogModal()
{
?>
    <dialog class="log_modal">
        <div class="log_modal-wrapper">
            <nav class="log_modal-wrapper-nav">
                <button class="log_modal-wrapper-nav-register">Rejestracja</button>
                <button class="log_modal-wrapper-nav-log">Logowanie</button>

            </nav>
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
