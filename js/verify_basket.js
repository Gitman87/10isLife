function verifyBasket() {
  const localStorageManagerBasket = new LocalStorageManager();
  const summary = document.querySelector(".basket_summary");
  const toCheckoutButton = summary.querySelector(".standard_button");
  const toCheckoutButtonText = toCheckoutButton.querySelector(
    ".standard_button-wrapper-link"
  );

  const basketContentContainer = document.querySelector(".basket_content");
  const basketList = basketContentContainer.querySelector(
    ".basket_content-list"
  );
  const errorContainer = basketContentContainer.querySelector(
    ".basket_content-error_container"
  );
  toCheckoutButton.addEventListener("click", async (e) => {
    e.preventDefault();
    toCheckoutButton.disabled = true;
    toCheckoutButtonText.textContent = "Weryfikowanie...";
    try {
      const storedCart = localStorageManagerBasket.read("cart");
      console.log("stored cart is ", storedCart);

      const response = await fetch("./php/api/verify_basket.php", {
        method: "POST",
        body: JSON.stringify(storedCart),
      });
      if (!response.ok) {
        throw new Error("Błąd serwera.");
      }
      const result = await response.json();
      if (result["success"]) {
        console.log("stored cart data correct");
        errorContainer.innerHTML = "";
        //go to checkout page
        if (result["redirect"]) {
          if (!result["isLogged"]) {
            toggleBasketModal(toCheckoutButton);
          } else {
            window.location.href = result["redirect"];
            toCheckoutButton.disabled = false;
            toCheckoutButtonText.textContent = "Do kasy";
          }
        }
      } else {
        let errorMessages = [];
        let quantityErrorMessages = [];
        let priceErrorMessages = [];
        const errorMessagesObject = result["message"];
        const quantityErrorMessagesObject = result["quantity"];
        console.log("result[quantity is]", result["quantity"]);
        const priceErrorMessagesObject = result["price"];
        console.log("result[price]", result["price"]);
        //for general error
        for (const message in errorMessagesObject) {
          if (errorMessagesObject.hasOwnProperty(message)) {
            errorMessages.push(errorMessagesObject[message]);
            console.log(errorMessagesObject[message]);
          }
        }
        //selecting list item according to error id with dataset
        errorMessages.forEach((item) => {
          console.log(
            `Id of error is ${item["id"]} and message is ${item["errorMessage"]}`
          );
          const listItem = basketList.querySelector(
            `[data-row_id = "${item["id"]}"]`
          );
          listItem.classList.add("error_blinking");
          const errorMessageElement = document.createElement("p");
          errorMessageElement.classList.add(
            "basket_content-list-row_container-error_para"
          );
          errorMessageElement.innerHTML =
            "&#32;" + " &#9660" + "&#32;" + item["errorMessage"];
          listItem.before(errorMessageElement);
          const reloadButton = document.createElement("button");
          reloadButton.classList.add(
            "basket_content-list-row_container-error_para-reload_button"
          );
          errorMessageElement.appendChild(reloadButton);
          reloadButton.innerText = "OK";
          reloadButton.addEventListener("click", () => {
            window.location.reload();
          });
        });
        // for quantity errors
        for (const message in quantityErrorMessagesObject) {
          if (quantityErrorMessagesObject.hasOwnProperty(message)) {
            quantityErrorMessages.push(quantityErrorMessagesObject[message]);
            console.log(quantityErrorMessagesObject[message]);
          }
        }
        //selecting list item according to error id with dataset
        quantityErrorMessages.forEach((item) => {
          console.log(
            `Id of error is ${item["id"]} and message is ${item["errorMessage"]}`
          );
          const listItem = basketList.querySelector(
            `[data-row_id = "${item["id"]}"]`
          );
          listItem.classList.add("error_blinking");
          const errorMessageElement = document.createElement("p");
          errorMessageElement.classList.add(
            "basket_content-list-row_container-error_para"
          );
          errorMessageElement.innerHTML =
            "&#32;" + " &#9660" + "&#32;" + item["errorMessage"];
          listItem.before(errorMessageElement);
          const reloadButton = document.createElement("button");
          reloadButton.classList.add(
            "basket_content-list-row_container-error_para-reload_button"
          );

          errorMessageElement.appendChild(reloadButton);
          reloadButton.innerText = "OK";
          reloadButton.addEventListener("click", () => {
            //upadte cart with correct quantity
            updateCartItemStockQuantity(
              "cart",
              item["id"],
              item["correctQuantity"]
            );
            updateCartItemQuantity("cart", item["id"], item["correctQuantity"]);
            window.location.reload();
          });
        });
        // for price errors
        for (const message in priceErrorMessagesObject) {
          if (priceErrorMessagesObject.hasOwnProperty(message)) {
            priceErrorMessages.push(priceErrorMessagesObject[message]);
            console.log(priceErrorMessagesObject[message]);
          }
        }
        //selecting list item according to error id with dataset
        priceErrorMessages.forEach((item) => {
          console.log(
            `Id of error is ${item["id"]} and message is ${item["errorMessage"]}`
          );
          const listItem = basketList.querySelector(
            `[data-row_id = "${item["id"]}"]`
          );
          listItem.classList.add("error_blinking");
          const errorMessageElement = document.createElement("p");
          errorMessageElement.classList.add(
            "basket_content-list-row_container-error_para"
          );
          errorMessageElement.innerHTML =
            "&#32;" + " &#9660" + "&#32;" + item["errorMessage"];
          listItem.before(errorMessageElement);
          const reloadButton = document.createElement("button");
          reloadButton.classList.add(
            "basket_content-list-row_container-error_para-reload_button"
          );
          errorMessageElement.appendChild(reloadButton);
          reloadButton.innerText = "OK";
          reloadButton.addEventListener("click", () => {
            updateCartItemPrice("cart", item["id"], item["correctPrice"]);
            window.location.reload();
          });
        });
        console.log("quantity error array is", quantityErrorMessages);
        console.log("price error array is", priceErrorMessages);

        // errorContainer.innerHTML =
        //   errorMessages.join("<br>") +
        //   "<br>" +
        //   "<strong style='color:#b51818'>Dostosuj produkt albo go usuń.Świeże dane zobaczysz stronie kasy. Strona zostanie odświeżona za 10 sekund...</strong>";
        // setTimeout(() => {
        //   window.location.reload();
        // }, 10000);
      }
    } catch (error) {
      console.error(error);
    }
  });
}

verifyBasket();
