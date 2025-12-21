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
        const errorMessagesObject = result["message"];
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
          basketList.querySelector(
            `[data-row_id = "${item["id"]}"]`
          ).style.border = "solid 2rem #ff0000ff";
        });
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
