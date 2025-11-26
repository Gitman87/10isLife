<?php
function genCartList($cartData)
{
?>
    <ul class="cart_list">
        <?php
        foreach ($cartData as  $item) {
            genCartItem();
        }
        ?>
    </ul>
<?php
}
