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

  console.log("Quantity of the product adding to cart is: ", quantity);
  const options = {};
  productDetailsContainer
    .querySelectorAll("input:checked, select")
    .forEach((input) => {
      if (input != null) {
        options[input.name] = input.value;
      }
    });
  console.log("Options of a product are: ", options);
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
  let cart = cartManager.read(cartKey);
  if (cart === null) {
    cart = [];
    console.log("New cart created");
    cart.push(cartItem);
    cartManager.update(cartKey, cart);
    console.log("cart loos: ", cart);
    return;
  }
  //need to check if already exist the same prooduct with the same config
  console.log("cartItem looks: ", cartItem);
  // const stringifiedCartItem = JSON.stringify(cartItem);
  const isTheSameId = (item) => item.id === cartItem.id;
  const indexOfTheSameItem = cart.findIndex(isTheSameId);
  console.log("Index of the same item found: ", indexOfTheSameItem);
  if (indexOfTheSameItem === -1) {
    console.log("Different product added");
    cart.push(cartItem);
    cartManager.update(cartKey, cart);
    console.log("Product added  to cart");
    console.log("Cart after adding looks like: ", cartManager.read(cartKey));
  } else {
    //need to update quantity, sum and update damnit!
    const theSameItemQunatityInt = parseInt(cart[indexOfTheSameItem].quantity);
    const newItemQuantityInt = parseInt(cartItem.quantity);
    const newQuantity = theSameItemQunatityInt + newItemQuantityInt;
    console.log("New quantity is ", newQuantity);
    cart[indexOfTheSameItem].quantity = newQuantity;
    console.log("Cart insludes the same product");
    console.log(
      `Item's with index ${indexOfTheSameItem} quantity was updated and is now: ${cart[indexOfTheSameItem].quantity} `
    );
    cartManager.update(cartKey, cart);
    console.log("cart looks: ", cart);
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
    console.log("no cart created to count items");
    return;
  }
  let totalNumberOfItems = Number(0);

  console.log("in counting cart is ", cart);
  cart.forEach((cartItem) => {
    console.log("in counting, caret item is ", cartItem);
    totalNumberOfItems += Number(cartItem.quantity);
    console.log("typeof total quantity = ", typeof totalNumberOfItems);
    // parseInt(totalNumberOfItems) + parseInt(cartItem.quantity);
  });
  basketNumberContainer.textContent = totalNumberOfItems;
  console.log("totalNumberOfItems: ", totalNumberOfItems);

  //count//
  basketNumberContainer.textContent = totalNumberOfItems;
  console.log("totalNumberOfItems: ", totalNumberOfItems);

  cart.forEach((cartItem) => {
    totalNumberOfItems += cartItem.quantity;
  });
}
updateBasketNumber("cart");
