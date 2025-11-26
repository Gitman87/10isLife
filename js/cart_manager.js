class LocalStorageManager {
  read(key) {
    const dugUpObject = localStorage.getItem(key);
    if (dugUpObject) {
      const confirmedObject = JSON.parse(dugUpObject);
      return confirmedObject;
    } else {
      console.warn("Couldn't find in local storage any object with key: ", key);
      return null;
    }
  }
  write(key, item) {
    //check if already exist
    if (localStorage.getItem(key) === null) {
      localStorage.setItem(key, JSON.stringify(item));
    } else {
      const foundObject = localStorage.getItem(key);
      console.warn(
        `There is already an item in localStorage with the key ${key} which is  ${foundObject}`
      );
      return null;
    }
  }
  remove(key) {
    if (localStorage.getItem(key)) {
      localStorage.removeItem(key);
    } else {
      console.warn(
        "Couldn't remove in local storage any object with key: ",
        key
      );
      return null;
    }
  }
  update(key, item) {
    localStorage.setItem(key, JSON.stringify(item));
  }
}
//t he cart key used in following functions is 'cart'
function makeCartItem(prodId, prodName, prodPrice, thumbnail_url) {
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
  //need to check if already exist the same prooduct with the same config
  // const stringifiedCartItem = JSON.stringify(cartItem);
  const isTheSameId = (item) => item.id === cartItem.id;
  const indexOfTheSameItem = cart.findIndex(isTheSameId);
  if (indexOfTheSameItem === -1) {
    cart.push(cartItem);
    cartManager.update(cartKey, cart);
  } else {
    //need to update quantity, sum and update damnit!
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
