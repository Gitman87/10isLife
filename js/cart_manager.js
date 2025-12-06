//t he cart key used in following functions is 'cart'
function makeCartItem(
  prodId,
  prodName,
  prodPrice,
  thumbnail_url,
  stockQuantity
) {
  const productDetailsContainer = document.querySelector(".dashboard-pulpit");
  const quantity = productDetailsContainer.querySelector(
    ".dashboard-pulpit-add-amount-quantifier"
  ).value;

  const options = {};
  productDetailsContainer
    .querySelectorAll("input:checked, select")
    .forEach((input) => {
      if (input != null) {
        options[input.name] = input.value;
      }
    });
  let cartItem = {
    id: prodId,
    fullName: prodName,
    price: prodPrice,
    quantity: quantity,
    stockQuantity: stockQuantity,
    thumbnail: thumbnail_url,
    options: options,
  };
  return cartItem;
}
//this I will add to "Do koszyka" onclick
function addProductToCart(cartItem) {
  const cartManager = new LocalStorageManager();
  const cartKey = "cart";
  const addButton = document.querySelector(".standard_button");
  const stockQuantityInputValue = parseInt(
    document.querySelector(".dashboard-pulpit-add-amount-stock_quantity_input")
      .value
  );
  const messageContainer = document.querySelector(
    ".dashboard-pulpit-add-availability-message"
  );
  let cart = cartManager.read(cartKey);
  if (cart === null) {
    cart = [];
    cart.push(cartItem);
    cartManager.update(cartKey, cart);
    return;
  }
  //need to check if already exist the same product with the same config
  cart.forEach;
  const isTheSameId = (item) => item.id === cartItem.id;
  console.log("Is the same id is: ", isTheSameId);
  const indexOfTheSameItem = cart.findIndex(isTheSameId);
  if (indexOfTheSameItem === -1) {
    cart.push(cartItem);
    cartManager.update(cartKey, cart);
    console.log("Unique cart item added, cart is: ", cartManager.read(cartKey));
  } else {
    //need to update quantity, sum and update damnit!
    console.log(
      "The same cartitem added, updating quantity: ",
      cartManager.read(cartKey)
    );
    const theSameItemQunatityInt = parseInt(cart[indexOfTheSameItem].quantity);
    const newItemQuantityInt = parseInt(cartItem.quantity);
    const newQuantity = theSameItemQunatityInt + newItemQuantityInt;
    if (stockQuantityInputValue < theSameItemQunatityInt + newItemQuantityInt) {
      console.warn("Cannot add more to basket");
      messageContainer.textContent = "Nie można dodać więcej tego produktu";
      messageContainer.classList.remove("message_text_color");
      messageContainer.classList.remove("error_text_color");
      addButton.disabled = true;
      return;
    } else {
      cart[indexOfTheSameItem].quantity = newQuantity;
      cartManager.update(cartKey, cart);
      addButton.disabled = false;
    }
  }
}
function removeCartItem(cartKey, id) {
  const cartManager = new LocalStorageManager();
  let cart = cartManager.read(cartKey);
  const isTheSameId = (item) => item.id === id;
  console.log("Is the same id is: ", isTheSameId);
  const indexOfItemToRemove = cart.findIndex(isTheSameId);
  if (indexOfItemToRemove === -1) {
    console.warn("Could find item to remove in the cart");
  } else {
    cart.splice(indexOfItemToRemove, 1);
  }
  //wrtite modified cart back to storage
  cartManager.update(cartKey, cart);
  console.log("Cart after removing item is: ", cart);
}
function updateCartItemQuantity(cartKey, id, newQuantity) {
  console.log("updatequantiuty fired");
  const cartManager = new LocalStorageManager();
  let cart = cartManager.read(cartKey);
  const isTheSameId = (item) => item.id == id;
  console.log("Is the same id is: ", isTheSameId);
  const indexOfItemToUpdate = cart.findIndex(isTheSameId);
  if (indexOfItemToUpdate === -1) {
    console.warn("Could find item to update its quantity");
  } else {
    cart[indexOfItemToUpdate]["quantity"] = newQuantity;
  }
  //wrtite modified cart back to storage
  cartManager.update(cartKey, cart);
  console.log("Cart after updating quantity  item is: ", cart);
}
function updateBasketNumber(cartKey) {
  const basketNumberContainer = document.querySelector(
    ".header-content-account-shopping-basket_link-number"
  );
  const cartManager = new LocalStorageManager();
  //sum all all the quantity of the products inside the cart
  let cart = cartManager.read(cartKey);
  if (cart === null) {
    return;
  }
  let totalNumberOfItems = Number(0);
  cart.forEach((cartItem) => {
    totalNumberOfItems += Number(cartItem.quantity);
    // parseInt(totalNumberOfItems) + parseInt(cartItem.quantity);
  });
  //count//
  basketNumberContainer.textContent = totalNumberOfItems;
  cart.forEach((cartItem) => {
    totalNumberOfItems += cartItem.quantity;
  });
}
updateBasketNumber("cart");
