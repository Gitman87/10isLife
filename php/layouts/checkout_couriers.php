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
                    if ($totalWeight > (float)$courier['limit_kg']) {
                        $limit = (float)$courier['limit_kg'];
                        $numberOfExeededLimit = floor($totalWeight / $limit) * (float)$courier['limit_fee'];
                        $totalFee = round(((float)$courier['fee'] + $numberOfExeededLimit), 2);
                    } else {
                        $totalFee = (float)$courier['fee'];
                    }
                } else {
                    if ($totalWeight > (float)$courier['limit_kg']) {
                        $limit = (float)$courier['limit_kg'];
                        $numberOfExeededLimit = floor($totalWeight / $limit) * (float)$courier['limit_fee'];
                        $totalFee = round(((float)$courier['fee'] + $numberOfExeededLimit), 2);
                    } else {
                        $totalFee = (float)$courier['fee'];
                    }
                }
            ?>
                <option class="select_courier-courier" value="<?= $courier['courier_id'] ?>"><?= $courier['name'] ?><span class="select_courier-courier-fee">&nbsp;+&nbsp;<?= $totalFee ?>&nbsp;zł</span> <?php echo $totalFee, gettype((float)$courier[$totalFee]); ?></option>
            <?php
            }
            ?>
        </select>


    </section>
<?php
}
