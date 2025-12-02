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

  updateBasket(cartData);
}
function updateBasket(cartData) {
  const cartListContainer = document.querySelector(".basket_content-list");
  // empty basket info
  const emptyBasketInfo = document.createElement("h2");
  // check if empty, whe user removed all the items
  if (!cartData || cartData.length < 1) {
    cartListContainer.appendChild(emptyBasketInfo);
  } else {
    cartListContainer.innerHTML = "";
    console.log("cartData is: ", cartData);
    cartData.forEach((cartItem) => {
      console.log("CartItems ids are: ", cartItem);
    });
  }
}
basketManager("cart");
