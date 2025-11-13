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

function makeCartItem(prodId, prodName) {
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
    quantity: quantity,
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
  }
  cart.push(cartItem);
  cartManager.update(cartKey, cart);
}
