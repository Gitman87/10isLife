function toggleBasketModal(toCheckoutButton) {
  const basketModal = document.querySelector(".basket_modal");
  const logRegButton = basketModal.querySelector(".standard_button");
  const guestButton = basketModal.querySelector(".light_button");
  const cancelButton = basketModal.querySelector(".ugly_button");

  basketModal.showModal();
  logRegButton.addEventListener("click", () => {
    openModal();
    setStartForm("logging");
  });
  guestButton.addEventListener("click", () => {
    window.location.href = "./checkout.php";
  });
  cancelButton.addEventListener("click", () => {
    basketModal.close();
    toCheckoutButton.disabled = false;
    toCheckoutButton.innerText = "Do kasy";
  });
}
