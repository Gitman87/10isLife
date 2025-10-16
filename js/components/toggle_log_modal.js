function openModal() {
  const modal = document.querySelector(".log_modal");
  console.log("modal opened");
  modal.showModal();

  const activeTab = document.querySelector(".tab_nav-button:nth-child(2)");
  activeTab.style.borderBottom = " 0.5rem solid #002b5b";
  activeTab.style.color = "#002b5b";
}
function closeModal() {
  const modal = document.querySelector(".log_modal");

  console.log("modal closed");
  modal.close();
}
// openModal();
// closeModal();
