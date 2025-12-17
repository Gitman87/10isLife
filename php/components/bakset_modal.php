<?php
function genBasketModal()
{
?>
    <dialog class="basket_modal">
        <div class="basket_modal-wrapper">
            <?php genStandardButton("Zarejestruj/Zaloguj(rekomendowane)", $is_button = true, '', '') ?>
            <?php genLightButton("Kontynuuj jako gość", $is_button = true, '', '') ?>
            <?php genUglyButton("Anuluj", TRUE, '', '') ?>
        </div>
    </dialog>
<?php
}
