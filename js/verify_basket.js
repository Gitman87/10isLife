function varifyBasket() {
  const localStorageManagerBasket = new LocalStorageManager();
  const cartListContainer = document.querySelector(".basket_content-list");
  const summary = document.querySelector(".basket_summary");
  const toCheckoutButton = summary.querySelector(".standard_button");
  const errorContainer = summary.querySelector(
    ".basket_summary-error_container"
  );
  console.log("stored cart is ", storedCart);

  toCheckoutButton.addEventListener("click", async (e) => {
    e.preventDefault();
    try {
      const storedCart = localStorageManagerBasket.read("cart");

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

        //go to checkout page
        if (result["redirect"]) {
          form.reset();
          window.location.href = result["redirect"];
          console.log("User should be redirected now");
        }
      } else {
        errorContainer.innerHTML = result["message"];
      }
    } catch (error) {
      console.error(error);
    }
  });
}
varifyBasket();
