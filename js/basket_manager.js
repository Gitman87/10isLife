function basketManager(cartKey) {
  const localStorageManager = new LocalStorageManager();
  const cartData = localStorageManager.read(cartKey);
  const cartListContainer = document.querySelector(".basket_content-list");
  // empty basket info
  const emptyBasketInfo = document.createElement("h2");
  emptyBasketInfo.classList.add("basket_contnet_list-empty");
  emptyBasketInfo.textContent = "Twój koszyk jest pusty";

  //cart item html
  const cartListItem = document.createElement("li");
  cartListItem.classList.add("basket_content-list");

  function updateBasket(cartData) {
    // check if empty, whe user removed all the items
    if (!cartData || cartData.length < 1) {
      cartListContainer.appendChild(emptyBasketInfo);
    } else {
      cartListContainer.innerHTML = "";
      console.log("cartData is: ", cartData);
      cartData.forEach((cartItem) => {
        cartListContainer.innerHTML += `
          <li class="basket_content-list-row_container" data-row_id=${cartItem["id"]}>
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container-name">${cartItem["fullName"]}</p>
            <p class="basket_content-list-row_container-grip">Uchwyt:${cartItem["options"]["grip_size"]}</p>
            <p class="basket_content-list-row_container-grip">Długość${cartItem["options"]["length"]}</p>
            <label>Ilość:</label>
            <input type ='number' id='basket_unit_quantity' name = 'basket_unit_quantity' min=0 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            <?php genUglyButton('Usuń', true, removeCartItem('cart', cartItem['id'])) ?>
          </li>
        `;

        // const listItem = document.createElement("li");
        // listItem.classList.add("basket_content-list-row_container");
        // const thumbnail = document.createElement("img");
        // thumbnail.classList.add("basket_content-list-row_container-thumbnail");
        // const productName = document.createElement("p");
        // productName.classList.add("basket_content-list-row_container-name");
      });
    }
  }
  updateBasket(cartData);
}
function removeBasketRow(cartKey, id) {
  const cartListContainer = document.querySelector(".basket_content-list");
  const rowToRemove = cartListContainer.querySelector(`[data-row_id= ${id}]`);
  rowToRemove.remove();

  removeCartItem(cartKey, id);
}

basketManager("cart");
