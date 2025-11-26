<?php
// require './php/components/ugly_button.vbcphp';
function genCartItem()
{
?>
    <li class="basket_item">
        <img src="product-image-1.jpg" alt="product name" class="basket_item-image">
        <div class="basket_item-details">
            <p class="basket_item-details">Product Name 1</p>
            <p class="basket_item-price">€49.99</p>
            <div class="basket_item-controls">
                <label for="basket_item-quantity" class=" basket_item-controls-label">Quantity:</label>
                <input type="number" id="basket_item-quantity" class="basket_item-controls-quantity " name="basket_item-quantity" value="1" min="1">
                <?php genUglyButton('Usuń', true,  '', 'callback') ?>
            </div>
        </div>
    </li>
<?php
}
