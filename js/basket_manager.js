function basketManager(cartKey) {
  const localStorageManagerBasket = new LocalStorageManager();
  const cartData = localStorageManagerBasket.read(cartKey);
  const cartListContainer = document.querySelector(".basket_content-list");
  // empty basket info
  const basketSummaryContainer = document.querySelector(".basket_summary");
  const totalNumberOfItems = basketSummaryContainer.querySelector(
    ".basket_summary-details-quantity"
  );
  const totalSumContainer = basketSummaryContainer.querySelector(
    ".basket_summary-details-sum"
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
            <p class="basket_content-list-row_container-price">${cartItem["price"]}&#32;zł</p>
            <div class="basket_content-list-row_container-quantity">
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input"  name = 'basket_unit_quantity' min=1 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; <span class="basket_content-list-row_container-row_price-price">${rowPrice}</span>&#32;zł</p>
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
            <p class="basket_content-list-row_container-price">  ${cartItem["price"]}&#32;zł</p>
            <div class="basket_content-list-row_container-quantity">
            <label for="basket_unit_quantity" class="basket_content-list-row_container-quantity-label">Ilość:</label>
            <input type = 'number' id='basket_unit_quantity' class="basket_content-list-row_container-quantity-input" name = 'basket_unit_quantity' min=1 max=${cartItem["stockQuantity"]} value=${cartItem["quantity"]}>
            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; <span class="basket_content-list-row_container-row_price-price">${rowPrice}</span>&#32;zł</p>
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
            console.log("itemId is: ", itemId);
            const newQuantity = parseFloat(quantityInput.value);
            const cartData = localStorageManagerBasket.read(cartKey);
            const cartItem = cartData.find((item) => item.id == itemId);
            if (cartItem) {
              updateCartItemQuantity("cart", itemId, newQuantity);
              // cartItem["quantity"] = newQuantity;
              // localStorageManager.update("cart", cartItem);
              const rowPriceContainer = thisRow.querySelector(
                ".basket_content-list-row_container-row_price-price"
              );
              const newRowPrice = newQuantity * cartItem.price;
              rowPriceContainer.textContent = newRowPrice.toFixed(2);
              calcNumberOfItems(
                cartListContainer,
                totalNumberOfItems,
                totalSumContainer
              );
              calcTotalSum(cartListContainer, totalSumContainer);
            }
          }
        });
        i++;
      });
    }
  }
  updateBasket(cartData);
  calcNumberOfItems(cartListContainer, totalNumberOfItems, totalSumContainer);
  calcTotalSum(cartListContainer, totalSumContainer);
  const continueShoppingButton = basketSummaryContainer.querySelector(
    ".light_button-wrapper-link"
  );
  addAddressToButton(
    localStorageManagerBasket,
    "address",
    continueShoppingButton
  );
}
function calcRowSum(cartListContainer, totalNumberOfItems, totalSumContainer) {
  const thisRow = cartListContainer.querySelector(
    `[data-row_id='${cartItem["id"]}']`
  );
  console.log("This row id is: ", thisRow);
  const rowPriceContainer = thisRow.querySelector(
    ".basket_content-list-row_container-row_price-price"
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
    calcTotalSum(cartListContainer, totalSumContainer);
  });
}
function calcTotalSum(cartListContainer, totalSumContainer) {
  totalSumContainer.innerText = "";
  const sumContainers = cartListContainer.querySelectorAll(
    ".basket_content-list-row_container-row_price-price"
  );
  if (sumContainers) {
    let sum = 0;
    sumContainers.forEach((sumContainer) => {
      sum += parseFloat(sumContainer.textContent);
    });
    console.log("total sum is: ", sum);
    totalSumContainer.innerText = sum.toFixed(2) + " " + "zł";
  } else {
    console.log("there is no basket rows yet");
    totalSumContainer.innerText = 0;
  }
}
function removeBasketRow(cartKey, id) {
  const cartListContainer = document.querySelector(".basket_content-list");
  const rowToRemove = cartListContainer.querySelector(`[data-row_id= '${id}']`);
  const totalNumberOfItems = document.querySelector(
    ".basket_summary-details-quantity"
  );
  const basketSummaryContainer = document.querySelector(".basket_summary");
  const totalSumContainer = basketSummaryContainer.querySelector(
    ".basket_summary-details-sum"
  );
  rowToRemove.remove();
  removeCartItem(cartKey, id);
  calcNumberOfItems(cartListContainer, totalNumberOfItems);
  calcTotalSum(cartListContainer, totalSumContainer);
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
  totalNumberOfItems.innerText = sum + " " + "szt.";
  console.log("Number of all items is: ", sum);
}
//  cartItem["quantity"] = newQuantity;
//               localStorageManager.update("cart", cartItem);
function addAddressToButton(storageManager, key, button) {
  const address = storageManager.read(key);
  button.href = address;
}
basketManager("cart");
