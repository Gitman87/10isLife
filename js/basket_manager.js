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
          <li class="basket_content-list-row_container">
            <img
              src="${cartItem["thumbnail"]}"
              class="basket_content-list-row_container-thumbnail"
            />
            <p class="basket_content-list-row_container">${cartItem["fullName"]}</p>

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

basketManager("cart");
