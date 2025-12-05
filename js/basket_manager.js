function basketManager(cartKey) {
  const localStorageManager = new LocalStorageManager();
  const cartData = localStorageManager.read(cartKey);
  const cartListContainer = document.querySelector(".basket_content-list");
  // empty basket info
  const basketSummaryContainer = document.querySelector(".basket_summary");
  const totalNumberOfItems = basketSummaryContainer.querySelector(
    ".basket_summary-details-term"
  );
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
        const rowPrice = cartItem["quantity"] * cartItem["price"];
        console.log("rowPrice is: ", rowPrice);
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
            <p class="basket_content-list-row_container-price">Cena:&#32;${cartItem["price"]}zł</p>
            <div class="basket_content-list-row_container-quantity"
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input"class="basket_content-list-row_container-quantity" name = 'basket_unit_quantity' min=1 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; ${rowPrice}zł</p>
            <button class="basket_content-list-row_container-remove_button" onclick="removeBasketRow('cart', ${cartItem["id"]})">Usuń</button>
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
            <p class="basket_content-list-row_container-price">Cena: &#32; ${cartItem["price"]}zł</p>
            <div class="basket_content-list-row_container-quantity"
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input"class="basket_content-list-row_container-quantity" name = 'basket_unit_quantity' min=1 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; ${rowPrice}zł</p>
            <button class="basket_content-list-row_container-remove_button" onclick="removeBasketRow('cart', ${cartItem["id"]})">Usuń</button>
          </li>
        `;
        }
        cartListContainer.addEventListener("change", (event) => {
          const target = event.target;

          if (
            target.classList.contains(
              "basket_content-list-row_container-quantity-input"
            )
          ) {
            const quantityInput = target;
            const thisRow = quantityInput.closest("[data-row_id]");

            const itemId = thisRow.dataset.row_id;
            const newQuantity = parseFloat(quantityInput.value);

            const cartData = localStorageManager.read(cartKey);
            const cartItem = cartData.find((item) => item.id == itemId);

            if (cartItem) {
              const rowPriceContainer = thisRow.querySelector(
                ".basket_content-list-row_container-row_price"
              );
              const newRowPrice = newQuantity * cartItem.price;

              rowPriceContainer.textContent = `Suma: ${newRowPrice.toFixed(
                2
              )}zł`;
              calcNumberOfItems(cartListContainer, totalNumberOfItems);
            }
          }
        });
        i++;
      });
    }
  }
  updateBasket(cartData);
  calcNumberOfItems(cartListContainer, totalNumberOfItems);
}
function calcRowSum(cartListContainer, totalNumberOfItems) {
  const thisRow = cartListContainer.querySelector(
    `[data-row_id='${cartItem["id"]}']`
  );
  console.log("This row id is: ", thisRow);
  const rowPriceContainer = thisRow.querySelector(
    ".basket_content-list-row_container-row_price"
  );
  rowPriceContainer.innerText = "dupa";
  const quantityInput = thisRow.querySelector(
    ".basket_content-list-row_container-quantity-input"
  );
  console.log("quantity input value in calsSum is: ", quantityInput.value);
  quantityInput.addEventListener("change", () => {
    rowPriceContainer.textContent = "";
    const newRowPrice = quantityInput.value * cartItem["price"];
    rowPriceContainer.textContent = newRowPrice;
    calcNumberOfItems(cartListContainer, totalNumberOfItems);
  });
}
function removeBasketRow(cartKey, id) {
  const cartListContainer = document.querySelector(".basket_content-list");
  const rowToRemove = cartListContainer.querySelector(`[data-row_id= '${id}']`);
  rowToRemove.remove();

  removeCartItem(cartKey, id);
}
function calcNumberOfItems(cartListContainer, totalNumberOfItems) {
  const inputs = cartListContainer.querySelectorAll(
    ".basket_content-list-row_container-quantity-input"
  );
  console.log("inputs are: ", inputs);
  let sum = 0;
  inputs.forEach((input) => {
    sum += parseInt(input.value);
    console.log("Input value is: ", input.value);
  });
  totalNumberOfItems.innerText = sum;
  console.log("Number of all items is: ", sum);
}
basketManager("cart");
