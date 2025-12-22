<?php
// passed object shoud look like:
// $verifiedCart[] = [
//             "id" => $id,
//             "name" => $product['name'],
//             "price" => (float)$product['price'],
//             "quantity" => $requestedQuantity,
//             "total" => (float)$product['price'] * $requestedQuantity
//         ];
function genCheckoutList($cart)
{
    $totalSum = 0;
    foreach ($cart as $item) {
        $totalSum += $item['total'];
    }
?>
    <div class="checkout_list_wrapper">
        <ol class="checkout_list_wrapper-checkout_list">
            <?php
            foreach ($cart as $item) {
            ?>
                <li class="checkout_list_wrapper-checkout_list-item">
                    <p class="checkout_list_wrapper-checkout_list-item-content">
                        <span class="checkout_list_wrapper-checkout_list-item-content-id">Id:&nbsp;<?= $item['id'] ?>,&nbsp;</span>
                        <span class="checkout_list_wrapper-checkout_list-item-content-name"><?= $item['name'] ?>,&nbsp;</span>
                        <span class="checkout_list_wrapper-checkout_list-item-content-name"><?= $item['quantity'] ?>&nbsp;</span>
                        <span class="checkout_list_wrapper-checkout_list-item-content-price">x &nbsp;<?= $item['price'] ?>&nbsp;zł&nbsp;</span>
                        <span class="checkout_list_wrapper-checkout_list-item-content-total">=&nbsp; <?= $item['total'] ?>&nbsp;zł</span>
                    </p>
                </li>
            <?php
            }
            ?>
            <strong class="checkout_list_wrapper-checkout_list-sum">Suma: &nbsp<?= $totalSum ?>&nbsp;zł</strong>
        </ol>
    </div>

<?php
}
