<?php
function genCouriersSelect($label, $totalWeight, $couriersData)
{
?>
    <section class="select_courier">

        <!-- <input type="hidden" id="total_courier_fee" value=""> -->
        <label class="select_courier-label" for="select_courier"><?= $label ?></label>
        <select name="select_courier" id="select_courier" class="select_courier">
            <?php
            foreach ($couriersData as $courier) {
                $courierName = strtolower($courier['name']);
                $totalFee = 0;

                if ($totalWeight > (float)$courier['limit_kg']) {
                    $limit = (float)$courier['limit_kg'];
                    $numberOfExeededLimit = floor($totalWeight / $limit) * (float)$courier['limit_fee'];
                    $totalFee = round(((float)$courier['fee'] + $numberOfExeededLimit), 2);
                } else {
                    $totalFee = (float)$courier['fee'];
                }

            ?>
                <option class="select_courier-courier" value="<?= $courierName ?>" data-courier-fee='<?= $totalFee ?>'><?= $courier['name'] ?>&nbsp;+&nbsp;<span class="select_courier-courier-fee"><?= $totalFee ?></span>&nbsp;zł</option>
            <?php
            }
            ?>
        </select>


    </section>
<?php
}
