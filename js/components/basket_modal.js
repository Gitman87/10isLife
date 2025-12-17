function toggleBasketModal() {
  const wrapper = document.querySelector(".basket_summary");
  const basketModal = wrapper.querySelector(".basket_modal");
  const logRegButton = wrapper.querySelector(".standard_button");
  const guestButton = wrapper.querySelector(".light_button");

  basketModal.showModal();
}
