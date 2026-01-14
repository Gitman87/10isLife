function basketManager(cartKey) {
  const localStorageManagerBasket = new LocalStorageManager();
  const cartData = localStorageManagerBasket.read(cartKey);
  console.log("cartData is: ", cartData);
  const cartListContainer = document.querySelector(".basket_content-list");
  // empty basket info
  const basketSummaryContainer = document.querySelector(".basket_summary");
  const totalNumberOfItems = basketSummaryContainer.querySelector(
    ".basket_summary-details-quantity"
  );
  const totalSumContainer = basketSummaryContainer.querySelector(
    ".basket_summary-details-sum"
  );
  const emptyBasketInfo = document.createElement("h3");
  emptyBasketInfo.classList.add("basket_content-list-empty");
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
      cartData.forEach((cartItem) => {
        const rowPrice = parseFloat(
          (cartItem["quantity"] * cartItem["price"]).toFixed(2)
        );
        if (isEmpty(cartItem["options"])) {
          cartListContainer.innerHTML += `
          <li class="basket_content-list-row_container" data-row_id=${
            cartItem["id"]
          }>
            <p class="basket_content-list-row_container-order">${i}.</p>
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container-name"><a href="./product.php?id=${
              cartItem["id"]
            }">${cartItem["fullName"]}</a></p>
            <p class="basket_content-list-row_container-price">${
              cartItem["price"]
            }&#32;zł</p>
            <div class="basket_content-list-row_container-quantity">

            ${genNumberInput(
              "Ilość:",
              "basket_unit_quantity",
              "basket_unit_quantity",
              `${cartItem["quantity"]}`,
              `${cartItem["stockQuantity"]}`
            )}
            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; <span class="basket_content-list-row_container-row_price-price">${rowPrice}</span>&#32;zł</p>
            <button class="basket_content-list-row_container-remove_button" onclick="removeBasketRow('cart', ${
              cartItem["id"]
            })">Usuń</button>
          </li>
        `;
        } else {
          cartListContainer.innerHTML += `
          <li class="basket_content-list-row_container" data-row_id=${
            cartItem["id"]
          }>
            <p class="basket_content-list-row_container-order">${i}.</p>
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container-name"><a href="./product.php?id=${
              cartItem["parentId"]
            }">${cartItem["fullName"]}</a></p>
            <p class="basket_content-list-row_container-grip">Uchwyt: &#32; ${
              cartItem["options"]["grip_size"]
            }</p>
            <p class="basket_content-list-row_container-length">Długość: &#32; ${
              cartItem["options"]["length"]
            }</p>
            <p class="basket_content-list-row_container-price">  ${
              cartItem["price"]
            }&#32;zł</p>
            <div class="basket_content-list-row_container-quantity">



             ${genNumberInput(
               "Ilość:",
               "basket_unit_quantity",
               "basket_unit_quantity",
               `${cartItem["quantity"]}`,
               `${cartItem["stockQuantity"]}`
             )}

            </div>
            <p class="basket_content-list-row_container-row_price">Suma:&#32; <span class="basket_content-list-row_container-row_price-price">${rowPrice}</span>&#32;zł</p>
            <button class="basket_content-list-row_container-remove_button" onclick="removeBasketRow('cart', ${
              cartItem["id"]
            })">Usuń</button>
          </li>
        `;
        }
        cartListContainer.addEventListener("click", (event) => {
          const inputWrapper = event.target.closest(
            ".number_input_wrapper-number_input"
          );
          // const target = event.target;

          // target.classList.contains(
          //   "basket_content-list-row_container-quantity-input"
          // )

          const quantityInput = inputWrapper.querySelector(
            ".number_input_wrapper-number_input-input"
          );
          const thisRow = quantityInput.closest("[data-row_id]");
          const itemId = thisRow.dataset.row_id;
          const newQuantity = parseInt(quantityInput.value);
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
  const rowPriceContainer = thisRow.querySelector(
    ".basket_content-list-row_container-row_price-price"
  );
  rowPriceContainer.innerText = "dupa";
  const quantityInput = thisRow.querySelector(
    ".basket_content-list-row_container-quantity-input"
  );
  quantityInput.addEventListener("change", () => {
    rowPriceContainer.textContent = "";
    const newRowPrice = parseFloat(quantityInput.value) * cartItem["price"];
    rowPriceContainer.textContent = newRowPrice.toFixed(2);
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
    totalSumContainer.innerText = sum.toFixed(2) + " " + "zł";
  } else {
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
  const inputs = cartListContainer.querySelectorAll("#basket_unit_quantity");
  let sum = 0;
  inputs.forEach((input) => {
    sum += parseInt(input.value);
  });
  totalNumberOfItems.innerText = sum + " " + "szt.";
}
//  cartItem["quantity"] = newQuantity;
//               localStorageManager.update("cart", cartItem);
function addAddressToButton(storageManager, key, button) {
  const address = storageManager.read(key);
  button.href = address;
}
function genNumberInput(label, id, name, value = 1, max = 5) {
  return `
  <div class="number_input_wrapper">
    <label class="number_input_wrapper-label" for=${id}>
      ${label}
    </label>

    <div class="number_input_wrapper-number_input">
      <input
        type="hidden"
        class="number_input_wrapper-number_input-input"
        min="1"
        max=${max}
        step="1"
        name=${name}
        id=${id}
        value=${value}
      />
      <button
        type="button"
        class="number_input_wrapper-number_input-minus_button"
      >
        -
      </button>
      <div class="number_input_wrapper-number_input-value_wrapper">
        <span class="number_input_wrapper-number_input-value_wrapper-value">
          ${value}
        </span>
      </div>
      <button
        type="button"
        class="number_input_wrapper-number_input-plus_button"
      >
        +
      </button>
    </div>
  </div>`;
}

basketManager("cart");
