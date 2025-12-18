<?php
function genBasketModal()
{
?>
    <dialog class="basket_modal">
        <div class="basket_modal-wrapper">
            <?php genStandardButton("Zarejestruj/Zaloguj<br>(rekomendowane)", true, '', '') ?>
            <?php genLightButton("Kontynuuj jako gość",  true, '', '') ?>
            <?php genUglyButton("Anuluj", TRUE, '', '') ?>
        </div>
    </dialog>
<?php
}
