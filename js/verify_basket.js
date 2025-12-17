function verifyBasket() {
  const localStorageManagerBasket = new LocalStorageManager();
  const summary = document.querySelector(".basket_summary");
  const toCheckoutButton = summary.querySelector(".standard_button");
  const errorContainer = summary.querySelector(
    ".basket_summary-error_container"
  );

  toCheckoutButton.addEventListener("click", async (e) => {
    e.preventDefault();
    toCheckoutButton.disabled = true;
    toCheckoutButton.innerText = "Weryfikowanie...";
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
          // window.location.href = result["redirect"];
          openModal();
          setStartForm("logging");
          toCheckoutButton.disabled = false;
          toCheckoutButton.innerText = "Do kasy";
          console.log("User should be redirected now");
        }
      } else {
        let errorMessages = [];
        const errorMessagesObject = result["message"];
        for (const message in errorMessagesObject) {
          if (errorMessagesObject.hasOwnProperty(message)) {
            errorMessages.push(errorMessagesObject[message]);
          }
        }
        errorContainer.innerHTML =
          errorMessages.join("<br>") +
          "<br>" +
          "<strong style='color:#b51818'>Dostosuj produkt albo go usuń.Świeże dane zobaczysz stronie kasy. Strona zostanie odświeżona za 10 sekund...</strong>";
        setTimeout(() => {
          window.location.reload();
        }, 10000);
        // toCheckoutButton.disabled = false;
        // toCheckoutButton.innerText = "Przejdź do zamówienia";
      }
    } catch (error) {
      console.error(error);
    }
  });
}
verifyBasket();
