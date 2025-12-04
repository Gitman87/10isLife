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
    //for checking if the cartitems has 'options" property -is config or basic
    const isEmpty = (obj) => Object.keys(obj).length === 0;
    let i = 1; //for order
    // check if empty, whe user removed all the items
    if (!cartData || cartData.length < 1) {
      cartListContainer.appendChild(emptyBasketInfo);
    } else {
      cartListContainer.innerHTML = "";
      console.log("cartData is: ", cartData);
      cartData.forEach((cartItem) => {
        console.log("cart item optins are: ", isEmpty(cartItem["options"]));
        if (isEmpty(cartItem["options"])) {
          cartListContainer.innerHTML += `
          <li class="basket_content-list-row_container" data-row_id=${cartItem["id"]}>
            <p class="basket_content-list-row_container-order">${i}.</p>
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container-name">${cartItem["fullName"]}</p>
            <div class="basket_content-list-row_container-quantity"
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input"class="basket_content-list-row_container-quantity" name = 'basket_unit_quantity' min=0 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>

            <button class="basket_content-list-row_container-remove_button" onclick="removeCartItem('cart', ${cartItem["id"]})">Usuń</button>
          </li>
        `;
        } else {
          cartListContainer.innerHTML += `
          <li class="basket_content-list-row_container" data-row_id=${cartItem["id"]}>
            <p class="basket_content-list-row_container-order">${i}.</p>
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container-name">${cartItem["fullName"]}</p>
            <p class="basket_content-list-row_container-grip">Uchwyt: &#32; ${cartItem["options"]["grip_size"]}</p>
            <p class="basket_content-list-row_container-length">Długość: &#32; ${cartItem["options"]["length"]}</p>
              <div class="basket_content-list-row_container-quantity"
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input"class="basket_content-list-row_container-quantity" name = 'basket_unit_quantity' min=0 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>
            <button class="basket_content-list-row_container-remove_button" onclick="removeCartItem('cart', ${cartItem["id"]})">Usuń</button>
          </li>
        `;
        }
        i++;
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
