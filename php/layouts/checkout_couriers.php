<?php
function genCouriersSelect($label, $totalWeight, $isAbroad = false, $couriersData)
{
?>
    <section class="select_courier">

        <input type="hidden" id="total_fee" value="">
        <label class="select_courier" for="select_courier"><?= $label ?></label>
        <select name="select_courier" id="select_courier" class="select_courier">
            <?php
            foreach ($couriersData as $courier) {
                // $value = str_replace(" ", "_", strtolower($courier['']));
                $totalFee = 0;
                if (!$isAbroad) {
                    $totalFee = round(($totalWeight / $courier['limit_kg']) * $courier['limit_fee'], 2);
                    echo 'totalFee is : ' . $totalFee;
                } else {
                    $totalFee = round($courier['fee'] + (($totalWeight / $courier['limit_kg']) * $courier['limit_fee']), 2);
                }

            ?>
                <option class="select_courier-courier" value="<?= $courier['courier_id'] ?>"><?= $courier['name'] ?><span class="select_courier-courier-fee">&nbsp;+&nbsp;<?= $totalFee ?>&nbsp;zł</span></option>
            <?php
            }
            ?>
        </select>
        <?php echo 'totalFee is : ' . $totalFee; ?>


    </section>
<?php
}
